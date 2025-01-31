<?php

namespace App\Controller;

use Aws\S3\S3Client;
use Aws\Sdk as Sdk;
use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials as Credentials;
use App\Entity\Pictures;
use App\Repository\PicturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Vich\UploaderBundle\Storage\StorageInterface;
use Aws\S3\Exception\S3Exception;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Cache\Simple\FilesystemCache;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

final class PicturesController extends AbstractController  
{
    private $params;
    private $storage;

    public function __construct(ParameterBagInterface $params, StorageInterface $storage)
    {
        $this->params = $params;
        $this->storage = $storage;
    }

    public function __invoke(Request $request): Pictures
    {
        $uploadedFile = $request->files->get('file');
        $mediaObject = new Pictures();

        if (!$uploadedFile) {
            throw new BadRequestHttpException('file is required');
            return new Response('file is required');
        }

        $filesystem = new Filesystem();
        $filesystem->mkdir('/tmp/images/', 0700);
        $imageFilePath = '/tmp/images/'.$uploadedFile->getClientOriginalName();

        // var_dump($imageFilePath);
        // die();

        try {
            if (!$filesystem->exists($imageFilePath)) {
                $filesystem->touch($imageFilePath);
                $filesystem->chmod($imageFilePath, 0700);
                // $filesystem->dumpFile($imageFilePath, $imageFilePath);

                $credentials = new \Aws\Credentials\Credentials($this->getParameter('AWS_ACCESS_KEY_ID'),
                $this->getParameter('AWS_SECRET_ACCESS_KEY'));

                $client = new S3Client([
                    'region'=> 'us-east-2',
                    'version'=> 'latest',
                    'credentials'=> $credentials
                ]);

                $client->putObject([
                    'Bucket' => "atypikhouse-pictures",
                    'Key' => $uploadedFile->getClientOriginalName(),
                    'Body' => fopen($uploadedFile, 'r+')
                    // 'SourceFile' => $uploadedFile,
                ]);
                $filesystem->remove('/tmp/images/');
                
                $mediaObject->setFilePath($uploadedFile->getClientOriginalName());

                $mediaObject->setUrl('https://atypikhouse-pictures.s3.us-east-2.amazonaws.com/'.$uploadedFile->getClientOriginalName());
                $mediaObject->file = $uploadedFile;
            }
        } catch (Aws\S3\Exception\S3Exception $e) {
            echo "FILE ALREADY EXIST";
        }
        

        return $mediaObject;
    }

}

<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

class UploadPicturesService {

    // public function uploadFile(string $path){
    //     try {
    //         $s3->putObject([
    //             'Bucket' => 'my-bucket',
    //             'Key'    => 'my-object',
    //             'Body'   => fopen('/path/to/file', 'r'),
    //             'ACL'    => 'public-read',
    //         ]);
    //     } catch (Aws\S3\Exception\S3Exception $e) {
    //         echo "There was an error uploading the file.\n";
    //     }
    // }

    // public function getPublicPath(string $path): string
    // {
    //     $fullPath = $this->publicAssetBaseUrl.'/'.$path;
    //     return $this->requestStackContext
    //         ->getBasePath().$fullPath;
    // }
}
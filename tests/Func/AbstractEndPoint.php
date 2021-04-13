<?php

declare(strict_types=1);

namespace App\Tests\Func;

use App\DataFixtures\UserFixtures;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEndPoint extends WebTestCase
{
    protected array $serverInformations = ['ACCEPT' => 'application/json', 'CONTENT_TYPE' => 'application/json'];
    protected string $tokenNotFound = 'JWT Token not found';
    protected string $notYourResource = 'It\'s not your resource';
    protected string $loginPayload = '{"email": "%s", "password": "%s"}';

    public function getResponseFromRequest(
        string $method,
        string $uri,
        string $payload = '',
        array $parameter = [],
        bool $withAuthentification = true
    ): Response {
        $client = $this->createAuthentificationClient($withAuthentification);

        $client->request(
            $method,
            $uri.'.json', 
            $parameter,
            [],
            $this->serverInformations,
        );

        return $client->getResponse();
    }

    protected function createAuthentificationClient(bool $withAuthentification): KernelBrowser
    {
        $client = static::createClient();

        if (!$withAuthentification) {
            return $client;
        }

        $client->request(
            Request::METHOD_POST,
            '/authentication_token',
            [],
            [],
            $this->serverInformations,
            sprintf($this->loginPayload, UserFixtures::DEFAULT_USER['email'], UserFixtures::DEFAULT_USER['password'])
        );

        $data = json_decode($client->getResponse()->getContent(), true);
        //dd($data); 
        //dd($client);
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));
       

        return $client;
    }
}

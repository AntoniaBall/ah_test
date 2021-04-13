<?php

declare(strict_types=1);

namespace App\Tests\Func;

use App\DataFixtures\UserFixtures;
use Faker\Factory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTest extends AbstractEndPoint
{
    private string $userPayload = '{"email": "%s", "password": "azerty12","fistName":"zerty","lastName":"azert","phone":"1234567890"}';


    public function testGetUsers(): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_GET,
            '/api/users',
            '',
            [],
            true
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);
        //dd($response);
        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }

    // public function testPostUser(): int
    // {
    //     $response = $this->getResponseFromRequest(
    //         Request::METHOD_POST,
    //         '/api/register',
    //         $this->getPayload(),
    //         [],
    //         false,
    //     );
    //     $responseContent = $response->getContent();
    //     $responseDecoded = json_decode($responseContent, true);
    //    dd($this->getPayload());
    //     self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    //     self::assertJson($responseContent);
    //     self::assertNotEmpty($responseDecoded);

    //     return $responseDecoded['id'];
    // }

  
    public function testGetDefaultUser(): int
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_GET,
            '/api/users',
            '',
            ['email' => UserFixtures::DEFAULT_USER['email']],
            true
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent, true);
        //dd($response);
        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);

        return $responseDecoded[0]['id'];
    }

        /**
     * @depends testGetDefaultUser
     */
    public function testPutDefaultUser(int $id): void
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_PUT,
            '/api/users/'.$id,
            $this->getPayload(),
            [],
            true
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);
        //dd($this->getPayload());
       // self::assertEquals(Response::HTTP_UNAUTHORIZED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDecoded);
    }
   
 
    private function getPayload(): string
    {
        $faker = Factory::create();

        return sprintf($this->userPayload, $faker->email, $faker->firstName);
    }
}

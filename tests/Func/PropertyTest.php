<?php

declare(strict_types=1);

namespace App\Tests\Func;

use Faker\Factory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyTest extends AbstractEndPoint
{

  
    public function testProperty(): array
    {
        $response = $this->getResponseFromRequest(
            Request::METHOD_GET,
            '/api/properties',
            '',
            [],
            false
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
       // self::assertNotEmpty($responseDecoded);

        return $responseDecoded;
    }




}
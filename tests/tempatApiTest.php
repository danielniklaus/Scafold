<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tempatApiTest extends TestCase
{
    use MaketempatTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetempat()
    {
        $tempat = $this->faketempatData();
        $this->json('POST', '/api/v1/tempats', $tempat);

        $this->assertApiResponse($tempat);
    }

    /**
     * @test
     */
    public function testReadtempat()
    {
        $tempat = $this->maketempat();
        $this->json('GET', '/api/v1/tempats/'.$tempat->id);

        $this->assertApiResponse($tempat->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetempat()
    {
        $tempat = $this->maketempat();
        $editedtempat = $this->faketempatData();

        $this->json('PUT', '/api/v1/tempats/'.$tempat->id, $editedtempat);

        $this->assertApiResponse($editedtempat);
    }

    /**
     * @test
     */
    public function testDeletetempat()
    {
        $tempat = $this->maketempat();
        $this->json('DELETE', '/api/v1/tempats/'.$tempat->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tempats/'.$tempat->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class GoustoApiTest extends TestCase
{
    use MakeGoustoTrait, ApiTestTrait, WithoutMiddleware;

    /**
     * @test
     */
    function it_can_create_goustos()
    {
        $gousto = $this->fakeGoustoData();
        $this->json('POST', "/api/v1/goustos", $gousto);

        $this->assertApiResponse($gousto);
    }

    /**
     * @test
     */
    function it_can_read_gousto()
    {
        $gousto = $this->makeGousto();
        $this->json("GET", "/api/v1/goustos/{$gousto->id}");

        $this->assertApiResponse($gousto->toArray());
    }

    /**
     * @test
     */
    function it_can_update_gousto()
    {
        $gousto = $this->makeGousto();
        $editedGousto = $this->fakeGoustoData();

        $this->json('PUT', "/api/v1/goustos/{$gousto->id}", $editedGousto);

        $this->assertApiResponse($editedGousto);
    }

    /**
     * @test
     */
    function it_can_delete_goustos()
    {
        $gousto = $this->makeGousto();
        $this->json("DELETE", "/api/v1/goustos/{$gousto->id}");

        $this->assertApiSuccess();
        $this->json("GET", "/api/v1/goustos/{$gousto->id}");

        $this->assertResponseStatus(404);
    }

}

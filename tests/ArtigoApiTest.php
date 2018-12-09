<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArtigoApiTest extends TestCase
{
    use MakeArtigoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateArtigo()
    {
        $artigo = $this->fakeArtigoData();
        $this->json('POST', '/api/v1/artigos', $artigo);

        $this->assertApiResponse($artigo);
    }

    /**
     * @test
     */
    public function testReadArtigo()
    {
        $artigo = $this->makeArtigo();
        $this->json('GET', '/api/v1/artigos/'.$artigo->id);

        $this->assertApiResponse($artigo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateArtigo()
    {
        $artigo = $this->makeArtigo();
        $editedArtigo = $this->fakeArtigoData();

        $this->json('PUT', '/api/v1/artigos/'.$artigo->id, $editedArtigo);

        $this->assertApiResponse($editedArtigo);
    }

    /**
     * @test
     */
    public function testDeleteArtigo()
    {
        $artigo = $this->makeArtigo();
        $this->json('DELETE', '/api/v1/artigos/'.$artigo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/artigos/'.$artigo->id);

        $this->assertResponseStatus(404);
    }
}

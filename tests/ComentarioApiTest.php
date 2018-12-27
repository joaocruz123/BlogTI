<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComentarioApiTest extends TestCase
{
    use MakeComentarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComentario()
    {
        $comentario = $this->fakeComentarioData();
        $this->json('POST', '/api/v1/comentarios', $comentario);

        $this->assertApiResponse($comentario);
    }

    /**
     * @test
     */
    public function testReadComentario()
    {
        $comentario = $this->makeComentario();
        $this->json('GET', '/api/v1/comentarios/'.$comentario->id);

        $this->assertApiResponse($comentario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComentario()
    {
        $comentario = $this->makeComentario();
        $editedComentario = $this->fakeComentarioData();

        $this->json('PUT', '/api/v1/comentarios/'.$comentario->id, $editedComentario);

        $this->assertApiResponse($editedComentario);
    }

    /**
     * @test
     */
    public function testDeleteComentario()
    {
        $comentario = $this->makeComentario();
        $this->json('DELETE', '/api/v1/comentarios/'.$comentario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comentarios/'.$comentario->id);

        $this->assertResponseStatus(404);
    }
}

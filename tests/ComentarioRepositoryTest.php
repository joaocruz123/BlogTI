<?php

use App\Models\Comentario;
use App\Repositories\ComentarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComentarioRepositoryTest extends TestCase
{
    use MakeComentarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComentarioRepository
     */
    protected $comentarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comentarioRepo = App::make(ComentarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComentario()
    {
        $comentario = $this->fakeComentarioData();
        $createdComentario = $this->comentarioRepo->create($comentario);
        $createdComentario = $createdComentario->toArray();
        $this->assertArrayHasKey('id', $createdComentario);
        $this->assertNotNull($createdComentario['id'], 'Created Comentario must have id specified');
        $this->assertNotNull(Comentario::find($createdComentario['id']), 'Comentario with given id must be in DB');
        $this->assertModelData($comentario, $createdComentario);
    }

    /**
     * @test read
     */
    public function testReadComentario()
    {
        $comentario = $this->makeComentario();
        $dbComentario = $this->comentarioRepo->find($comentario->id);
        $dbComentario = $dbComentario->toArray();
        $this->assertModelData($comentario->toArray(), $dbComentario);
    }

    /**
     * @test update
     */
    public function testUpdateComentario()
    {
        $comentario = $this->makeComentario();
        $fakeComentario = $this->fakeComentarioData();
        $updatedComentario = $this->comentarioRepo->update($fakeComentario, $comentario->id);
        $this->assertModelData($fakeComentario, $updatedComentario->toArray());
        $dbComentario = $this->comentarioRepo->find($comentario->id);
        $this->assertModelData($fakeComentario, $dbComentario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComentario()
    {
        $comentario = $this->makeComentario();
        $resp = $this->comentarioRepo->delete($comentario->id);
        $this->assertTrue($resp);
        $this->assertNull(Comentario::find($comentario->id), 'Comentario should not exist in DB');
    }
}

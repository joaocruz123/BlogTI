<?php

use App\Models\Artigo;
use App\Repositories\ArtigoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArtigoRepositoryTest extends TestCase
{
    use MakeArtigoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ArtigoRepository
     */
    protected $artigoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->artigoRepo = App::make(ArtigoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateArtigo()
    {
        $artigo = $this->fakeArtigoData();
        $createdArtigo = $this->artigoRepo->create($artigo);
        $createdArtigo = $createdArtigo->toArray();
        $this->assertArrayHasKey('id', $createdArtigo);
        $this->assertNotNull($createdArtigo['id'], 'Created Artigo must have id specified');
        $this->assertNotNull(Artigo::find($createdArtigo['id']), 'Artigo with given id must be in DB');
        $this->assertModelData($artigo, $createdArtigo);
    }

    /**
     * @test read
     */
    public function testReadArtigo()
    {
        $artigo = $this->makeArtigo();
        $dbArtigo = $this->artigoRepo->find($artigo->id);
        $dbArtigo = $dbArtigo->toArray();
        $this->assertModelData($artigo->toArray(), $dbArtigo);
    }

    /**
     * @test update
     */
    public function testUpdateArtigo()
    {
        $artigo = $this->makeArtigo();
        $fakeArtigo = $this->fakeArtigoData();
        $updatedArtigo = $this->artigoRepo->update($fakeArtigo, $artigo->id);
        $this->assertModelData($fakeArtigo, $updatedArtigo->toArray());
        $dbArtigo = $this->artigoRepo->find($artigo->id);
        $this->assertModelData($fakeArtigo, $dbArtigo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteArtigo()
    {
        $artigo = $this->makeArtigo();
        $resp = $this->artigoRepo->delete($artigo->id);
        $this->assertTrue($resp);
        $this->assertNull(Artigo::find($artigo->id), 'Artigo should not exist in DB');
    }
}

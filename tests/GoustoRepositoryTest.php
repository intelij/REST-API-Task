<?php

use App\Models\Gousto;
use App\Repositories\GoustoRepository;

class GoustoRepositoryTest extends TestCase
{
    use MakeGoustoTrait, ApiTestTrait;

    /**
     * @var GoustoRepository
     */
    protected $goustoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->goustoRepo = App::make(GoustoRepository::class);
    }

    /**
     * @test create
     */
    function it_creates_gousto()
    {
        $gousto = $this->fakeGoustoData();
        $createdGousto = $this->goustoRepo->create($gousto);
        $createdGousto = $createdGousto->toArray();
        $this->assertArrayHasKey('id', $createdGousto);
        $this->assertNotNull($createdGousto['id'], 'Created Gousto must have id specified');
        $this->assertNotNull(Gousto::find($createdGousto['id']), 'Gousto with given id must be in DB');
        $this->assertModelData($gousto, $createdGousto);
    }

    /**
     * @test read
     */
    function it_reads_goustos()
    {
        $gousto = $this->makeGousto();
        $dbGousto = $this->goustoRepo->find($gousto->id);
        $dbGousto = $dbGousto->toArray();
        $this->assertModelData($gousto->toArray(), $dbGousto);
    }

    /**
     * @test update
     */
    function it_updates_gousto()
    {
        $gousto = $this->makeGousto();
        $fakeGousto = $this->fakeGoustoData();
        $updatedGousto = $this->goustoRepo->update($fakeGousto, $gousto->id);
        $this->assertModelData($fakeGousto, $updatedGousto->toArray());
        $dbGousto = $this->goustoRepo->find($gousto->id);
        $this->assertModelData($fakeGousto, $dbGousto->toArray());
    }

    /**
     * @test delete
     */
    function it_deletes_gousto()
    {
        $gousto = $this->makeGousto();
        $resp = $this->goustoRepo->delete($gousto->id);
        $this->assertTrue($resp);
        $this->assertNull(Gousto::find($gousto->id), 'Gousto should not exist in DB');
    }
}
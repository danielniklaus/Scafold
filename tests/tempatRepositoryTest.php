<?php

use App\Models\tempat;
use App\Repositories\tempatRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tempatRepositoryTest extends TestCase
{
    use MaketempatTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var tempatRepository
     */
    protected $tempatRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tempatRepo = App::make(tempatRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetempat()
    {
        $tempat = $this->faketempatData();
        $createdtempat = $this->tempatRepo->create($tempat);
        $createdtempat = $createdtempat->toArray();
        $this->assertArrayHasKey('id', $createdtempat);
        $this->assertNotNull($createdtempat['id'], 'Created tempat must have id specified');
        $this->assertNotNull(tempat::find($createdtempat['id']), 'tempat with given id must be in DB');
        $this->assertModelData($tempat, $createdtempat);
    }

    /**
     * @test read
     */
    public function testReadtempat()
    {
        $tempat = $this->maketempat();
        $dbtempat = $this->tempatRepo->find($tempat->id);
        $dbtempat = $dbtempat->toArray();
        $this->assertModelData($tempat->toArray(), $dbtempat);
    }

    /**
     * @test update
     */
    public function testUpdatetempat()
    {
        $tempat = $this->maketempat();
        $faketempat = $this->faketempatData();
        $updatedtempat = $this->tempatRepo->update($faketempat, $tempat->id);
        $this->assertModelData($faketempat, $updatedtempat->toArray());
        $dbtempat = $this->tempatRepo->find($tempat->id);
        $this->assertModelData($faketempat, $dbtempat->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetempat()
    {
        $tempat = $this->maketempat();
        $resp = $this->tempatRepo->delete($tempat->id);
        $this->assertTrue($resp);
        $this->assertNull(tempat::find($tempat->id), 'tempat should not exist in DB');
    }
}

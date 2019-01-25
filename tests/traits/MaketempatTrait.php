<?php

use Faker\Factory as Faker;
use App\Models\tempat;
use App\Repositories\tempatRepository;

trait MaketempatTrait
{
    /**
     * Create fake instance of tempat and save it in database
     *
     * @param array $tempatFields
     * @return tempat
     */
    public function maketempat($tempatFields = [])
    {
        /** @var tempatRepository $tempatRepo */
        $tempatRepo = App::make(tempatRepository::class);
        $theme = $this->faketempatData($tempatFields);
        return $tempatRepo->create($theme);
    }

    /**
     * Get fake instance of tempat
     *
     * @param array $tempatFields
     * @return tempat
     */
    public function faketempat($tempatFields = [])
    {
        return new tempat($this->faketempatData($tempatFields));
    }

    /**
     * Get fake data of tempat
     *
     * @param array $postFields
     * @return array
     */
    public function faketempatData($tempatFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_tempat' => $fake->word,
            'alamat' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tempatFields);
    }
}

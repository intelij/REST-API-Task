<?php

use Faker\Factory as Faker;
use App\Models\Gousto;
use App\Repositories\GoustoRepository;

trait MakeGoustoTrait
{
    /**
     * Create fake instance of Gousto and save it in database
     *
     * @param array $goustoFields
     * @return Gousto
     */
    public function makeGousto($goustoFields = [])
    {
        /** @var GoustoRepository $goustoRepo */
        $goustoRepo = App::make(GoustoRepository::class);
        $theme = $this->fakeGoustoData($goustoFields);
        return $goustoRepo->create($theme);
    }

    /**
     * Get fake instance of Gousto
     *
     * @param array $goustoFields
     * @return Gousto
     */
    public function fakeGousto($goustoFields = [])
    {
        return new Gousto($this->fakeGoustoData($goustoFields));
    }

    /**
     * Get fake data of Gousto
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGoustoData($goustoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->randomDigitNotNull
        ], $goustoFields);
    }
}
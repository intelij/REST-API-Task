<?php

namespace App\Repositories;

use App\Models\Gousto;
use InfyOm\Generator\Common\BaseRepository;

class GoustoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gousto::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\ProfilePonpes;
use App\Repositories\BaseRepository;

/**
 * Class ProfilePonpesRepository
 * @package App\Repositories
 * @version January 25, 2021, 4:46 am UTC
*/

class ProfilePonpesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_ponpes',
        'telp_ponpes',
        'alamat_ponpes',
        'logo_ponpes',
        'foto_ponpes',
        'create_date',
        'last_update',
        'soft_delete'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProfilePonpes::class;
    }
}

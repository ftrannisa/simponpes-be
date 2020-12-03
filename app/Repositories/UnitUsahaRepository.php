<?php

namespace App\Repositories;

use App\Models\UnitUsaha;
use App\Repositories\BaseRepository;

/**
 * Class UnitUsahaRepository
 * @package App\Repositories
 * @version December 3, 2020, 9:35 am UTC
*/

class UnitUsahaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_toko',
        'id_user',
        'nama_toko',
        'nama_pemilik',
        'jenis_toko_id',
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
        return UnitUsaha::class;
    }
}

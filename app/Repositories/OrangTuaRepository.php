<?php

namespace App\Repositories;

use App\Models\OrangTua;
use App\Repositories\BaseRepository;

/**
 * Class OrangTuaRepository
 * @package App\Repositories
 * @version December 16, 2020, 7:46 am UTC
*/

class OrangTuaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_ayah',
        'alamat_ayah',
        'pekerjaan_ayah',
        'hp_ayah',
        'nama_ibu',
        'alamat_ibu',
        'pekerjaan_ibu',
        'hp_ibu',
        'nama_wali',
        'alamat_wali',
        'pekerjaan_wali',
        'hp_wali',
        'create_date',
        'last_update',
        'soft_delete',
        'nik'
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
        return OrangTua::class;
    }
}

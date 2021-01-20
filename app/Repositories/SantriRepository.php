<?php

namespace App\Repositories;

use App\Models\Santri;
use App\Repositories\BaseRepository;

/**
 * Class SantriRepository
 * @package App\Repositories
 * @version December 3, 2020, 9:05 am UTC
*/

class SantriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nis',
        'nama_lengkap',
        'nama_panggilan',
        'TTL',
        'jenis_kelamin',
        'alamat',
        'tanggal_masuk',
        'asal',
        'foto',
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
        return Santri::class;
    }
}

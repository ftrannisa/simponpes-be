<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Repositories\BaseRepository;

/**
 * Class PegawaiRepository
 * @package App\Repositories
 * @version December 3, 2020, 9:29 am UTC
*/

class PegawaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pegawai',
        'nama_pegawai',
        'nama_panggilan',
        'nik',
        'id_bidang',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'id_peran',
        'tanggal_masuk',
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
        return Pegawai::class;
    }
}

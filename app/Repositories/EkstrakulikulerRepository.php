<?php

namespace App\Repositories;

use App\Models\Ekstrakulikuler;
use App\Repositories\BaseRepository;

/**
 * Class EkstrakulikulerRepository
 * @package App\Repositories
 * @version December 3, 2020, 9:53 am UTC
*/

class EkstrakulikulerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_ekskul',
        'nama_ekskul',
        'nama_pelatih',
        'no_hp_pelatih',
        'biaya_ekskul',
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
        return Ekstrakulikuler::class;
    }
}

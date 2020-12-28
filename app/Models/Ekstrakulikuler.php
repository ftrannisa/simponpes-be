<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Str;

/**
 * Class Ekstrakulikuler
 * @package App\Models
 * @version December 3, 2020, 9:53 am UTC
 *
 * @property string $id_ekskul
 * @property string $nama_ekskul
 * @property string $nama_pelatih
 * @property string $no_hp_pelatih
 * @property number $biaya_ekskul
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class Ekstrakulikuler extends Model
{

    public $table = 'ekskul';
    
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_ekskul';
    protected $appends = ['id'];

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_ekskul' => 'uuid',
        'nama_ekskul' => 'string',
        'nama_pelatih' => 'string',
        'no_hp_pelatih' => 'string',
        'biaya_ekskul' => 'float',
        'create_date' => 'datetime',
        'last_update' => 'datetime',
        'soft_delete' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_ekskul' => 'nullable|string|max:255',
        'nama_pelatih' => 'nullable|string|max:255',
        'no_hp_pelatih' => 'nullable|string|max:16',
        'biaya_ekskul' => 'nullable|numeric',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable'
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id_ekskul'];
    }
    
}

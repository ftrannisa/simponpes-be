<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class UnitUsaha
 * @package App\Models
 * @version December 3, 2020, 9:35 am UTC
 *
 * @property string $id_toko
 * @property integer $id_user
 * @property string $nama_toko
 * @property string $nama_pemilik
 * @property integer $jenis_toko_id
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class UnitUsaha extends Model
{

    public $table = 'toko';
    
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_toko';
    protected $appends = ['id'];

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_toko' => 'string',
        'id_user' => 'integer',
        'nama_toko' => 'string',
        'nama_pemilik' => 'string',
        'jenis_toko_id' => 'string',
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
        'id_toko' => 'nullable|string',
        'id_user' => 'nullable|integer',
        'nama_toko' => 'nullable|string|max:255',
        'nama_pemilik' => 'nullable|string|max:255',
        'jenis_toko_id' => 'nullable|string',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable'
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id_toko'];
    }
}

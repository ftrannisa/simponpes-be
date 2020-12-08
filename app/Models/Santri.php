<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Santri
 * @package App\Models
 * @version December 3, 2020, 9:05 am UTC
 *
 * @property string $nis
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $TTL
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $tanggal_masuk
 * @property string $asal
 * @property string $foto
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class Santri extends Model
{

    public $table = 'santri';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_santri';
    protected $appends = ['id'];

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_santri' => 'string',
        'nis' => 'string',
        'nama_lengkap' => 'string',
        'nama_panggilan' => 'string',
        'TTL' => 'string',
        'jenis_kelamin' => 'string',
        'alamat' => 'string',
        'tanggal_masuk' => 'string',
        'asal' => 'string',
        'foto' => 'string',
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
        'nis' => 'nullable|string|max:50',
        'nama_lengkap' => 'nullable|string|max:255',
        'nama_panggilan' => 'nullable|string|max:20',
        'TTL' => 'nullable|string|max:10',
        'jenis_kelamin' => 'nullable|string|max:10',
        'alamat' => 'nullable|string',
        'tanggal_masuk' => 'nullable|string|max:255',
        'asal' => 'nullable|string|max:20',
        'foto' => 'nullable|string|max:255',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable'
    ];
    
    public function getIdAttribute()
    {
        return $this->attributes['id_santri'];
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Pegawai
 * @package App\Models
 * @version December 3, 2020, 9:29 am UTC
 *
 * @property string $id_pegawai
 * @property string $nama_pegawai
 * @property string $nama_panggilan
 * @property integer $nik
 * @property string $id_bidang
 * @property integer $no_hp
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $id_peran
 * @property string|\Carbon\Carbon $tanggal_masuk
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class Pegawai extends Model
{

    public $table = 'pegawai';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_pegawai';


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_pegawai' => 'string',
        'nama_pegawai' => 'string',
        'nama_panggilan' => 'string',
        'nik' => 'integer',
        'id_bidang' => 'string',
        'no_hp' => 'integer',
        'jenis_kelamin' => 'string',
        'alamat' => 'string',
        'id_peran' => 'string',
        'tanggal_masuk' => 'datetime',
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
        'id_pegawai' => 'nullable|string',
        'nama_pegawai' => 'nullable|string|max:100',
        'nama_panggilan' => 'nullable|string|max:20',
        'nik' => 'nullable|integer',
        'id_bidang' => 'nullable|string|max:30',
        'no_hp' => 'nullable',
        'jenis_kelamin' => 'nullable|string|max:10',
        'alamat' => 'nullable|string',
        'id_peran' => 'nullable|string|max:30',
        'tanggal_masuk' => 'nullable',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable'
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class OrangTua
 * @package App\Models
 * @version December 16, 2020, 7:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $santris
 * @property string $nama_ayah
 * @property string $alamat_ayah
 * @property string $pekerjaan_ayah
 * @property string $hp_ayah
 * @property string $nama_ibu
 * @property string $alamat_ibu
 * @property string $pekerjaan_ibu
 * @property string $hp_ibu
 * @property string $nama_wali
 * @property string $alamat_wali
 * @property string $pekerjaan_wali
 * @property string $hp_wali
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class OrangTua extends Model
{

    public $table = 'orangtua';
    
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_orangtua';
    protected $appends = ['id'];


    public $fillable = [
        'id_orangtua',
        'nama_ortu',
        'alamat_ortu',
        'pekerjaan_ortu',
        'hp_ortu',
        'tgl_lahir_ortu',
        'create_date',
        'last_update',
        'soft_delete',
        'nik'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_orangtua' => 'string',
        'nama_ortu' => 'string',
        'alamat_ortu' => 'string',
        'pekerjaan_ortu' => 'string',
        'hp_ortu' => 'string',
        'tgl_lahir_ortu' => 'string',
        'create_date' => 'datetime',
        'last_update' => 'datetime',
        'soft_delete' => 'integer',
        'nik' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_ortu' => 'nullable|string|max:255',
        'alamat_ortu' => 'nullable|string|max:255',
        'pekerjaan_ortu' => 'nullable|string|max:255',
        'hp_ortu' => 'nullable|string|max:255',
        'tgl_lahir_ortu' => 'nullable|string|max:255',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable',
        'nik' => 'nullable|string|max:16'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function santris()
    {
        return $this->hasMany(\App\Models\Santri::class, 'id_orangtua');
    }
}

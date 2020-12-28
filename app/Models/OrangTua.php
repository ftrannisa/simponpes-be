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
    
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_orangtua';
    protected $appends = ['id'];


    public $fillable = [
        'id_orangtua',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_orangtua' => 'string',
        'nama_ayah' => 'string',
        'alamat_ayah' => 'string',
        'pekerjaan_ayah' => 'string',
        'hp_ayah' => 'string',
        'nama_ibu' => 'string',
        'alamat_ibu' => 'string',
        'pekerjaan_ibu' => 'string',
        'hp_ibu' => 'string',
        'nama_wali' => 'string',
        'alamat_wali' => 'string',
        'pekerjaan_wali' => 'string',
        'hp_wali' => 'string',
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
        'nama_ayah' => 'nullable|string|max:255',
        'alamat_ayah' => 'nullable|string|max:255',
        'pekerjaan_ayah' => 'nullable|string|max:255',
        'hp_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'alamat_ibu' => 'nullable|string|max:255',
        'pekerjaan_ibu' => 'nullable|string|max:255',
        'hp_ibu' => 'nullable|string|max:255',
        'nama_wali' => 'nullable|string|max:255',
        'alamat_wali' => 'nullable|string|max:255',
        'pekerjaan_wali' => 'nullable|string|max:255',
        'hp_wali' => 'nullable|string|max:255',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class User
 * @package App\Models
 * @version December 7, 2020, 5:56 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $ref.jenisTokos
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 * @property integer $id_peran
 * @property string $id_pegawai
 */
class User extends Model
{

    public $table = 'pengguna';
    
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_user';
    protected $appends = ['id'];

    public $fillable = [
        'id_user',
        'email',
        'password',
        'nama',
        'create_data',
        'last_update',
        'soft_delete',
        'id_peran',
        'id_pegawai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_user' => 'string',
        'email' => 'string',
        'password' => 'string',
        'nama' => 'string',
        'create_data' => 'datetime',
        'last_update' => 'datetime',
        'soft_delete' => 'integer',
        'id_peran' => 'string',
        'id_pegawai' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'nullable|string|max:50',
        'password' => 'nullable|string|max:100',
        'nama' => 'nullable|string|max:20',
        'create_data' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable',
        'id_peran' => 'nullable|string',
        'id_pegawai' => 'nullable|string'
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id_user'];
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  **/
    // public function ref.jenisTokos()
    // {
    //     return $this->belongsToMany(\App\Models\Ref.jenisToko::class, 'toko');
    // }
    
}

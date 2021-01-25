<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class ProfilePonpes
 * @package App\Models
 * @version January 25, 2021, 4:46 am UTC
 *
 * @property string $nama_ponpes
 * @property integer $telp_ponpes
 * @property string $alamat_ponpes
 * @property string $logo_ponpes
 * @property string $foto_ponpes
 * @property string|\Carbon\Carbon $create_date
 * @property string|\Carbon\Carbon $last_update
 * @property integer $soft_delete
 */
class ProfilePonpes extends Model
{

    public $table = 'data_ponpes';
    
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $primaryKey = 'id_ponpes';
    protected $appends = ['id'];


    public $fillable = [
        'id_ponpes',
        'nama_ponpes',
        'telp_ponpes',
        'alamat_ponpes',
        'logo_ponpes',
        'foto_ponpes',
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
        'id_ponpes' => 'string',
        'nama_ponpes' => 'string',
        'telp_ponpes' => 'integer',
        'alamat_ponpes' => 'string',
        'logo_ponpes' => 'string',
        'foto_ponpes' => 'string',
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
        'nama_ponpes' => 'nullable|string|max:100',
        'telp_ponpes' => 'nullable',
        'alamat_ponpes' => 'nullable|string',
        'logo_ponpes' => 'nullable|string|max:255',
        'foto_ponpes' => 'nullable|string|max:255',
        'create_date' => 'nullable',
        'last_update' => 'nullable',
        'soft_delete' => 'nullable'
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id_ponpes'];
    }

}

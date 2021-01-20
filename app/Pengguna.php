<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
// use App\Scope\SoftDeleteScope;

/**
 * @property string $id_user
 * @property string $email
 * @property string $password
 * @property string $nama
 * @property string $create_data
 * @property string $last_update
 * @property integer $soft_delete
 * @property int $id_peran
 * @property string $id_pegawai
 */
class Pengguna extends Authenticatable implements JWTSubject
{
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(new SoftDeleteScope);
    // }

    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';

    protected $dateFormat = 'U';
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    public $table = 'pengguna';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'email', 'password', 'nama', 'id_peran', 'id_pegawai', 'create_data', 'last_update', 'soft_delete'];

}

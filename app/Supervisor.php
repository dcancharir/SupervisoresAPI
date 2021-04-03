<?php

namespace App;
use App\Tienda;
// use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Supervisor extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * The attributes that are from db tables
     * @var table is the name table in db
     * @var primaryKey is the name of primary key on supervisor table
     */
    protected $table = 'supervisor';
    protected $primaryKey ='supervisor_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nombres','apellidos','usuario', 'email', 'password','supervisor_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
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
    //relationship methods
    public function tiendas(){
        return $this->hasMany(Tienda::class,'supervisor_id');
    }
}

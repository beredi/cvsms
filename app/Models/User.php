<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Psy\Util\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_USER' => 'View user',
        'VIEW_ALL_USER' => 'View all users',
        'EDIT_USER' => 'Edit user',
        'DELETE_USER' => 'Delete user',
        'CREATE_USER' => 'Create user'
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'employed_from',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @param $value
     * @return mixed
     */
    public function getNameAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getLastnameAttribute($value){
        return $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }

    /**
     * @param $roleSlug
     * @return bool
     */
    public function hasRole($roleSlug){
        $result = false;

        if($this->role && $this->role->slug == $roleSlug){
            $result = true;
        }

        return $result;
    }

    /**
     * @param $permission
     * @param User $user
     * @return bool
     */
    public function hasPermission($permission){
        $result = false;
        if ($this->role->hasPermission($permission)) $result = true;

        return $result;
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return $this->hasRole(Role::ADMIN);
    }

    /**
     * @return array
     */
    public static function getPermissions(){
        return self::$permissions;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services(){
        return $this->hasMany(Service::class);
    }

    /**
     * @return string
     */
    public function fullName(){
        return $this->name . ' ' . $this->lastname;
    }
}

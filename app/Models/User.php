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
     * @param User $user
     * @return bool
     */
    public function canEdit($class, User $user){
        $result = false;
        if ($user->hasRole(Role::ADMIN)
            || $user->role->hasPermission(\Illuminate\Support\Str::upper($class.'_EDIT'))) $result = true;

        return $result;
    }
}

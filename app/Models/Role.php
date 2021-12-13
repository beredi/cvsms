<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const ADMIN = 'admin';
    public const USER = 'user';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    /**
     * @param $permissionSlug
     * @return bool
     */
    public function hasPermission($permissionSlug){
        $result = false;
        foreach ($this->permissions as $permission){
            if ($permission->slug == $permissionSlug) {
            $result = true;
            break;
            }
        }

        return $result;
    }

    /**
     * @return array
     */
    public function permissionsToArray(){
        $permissionsArray = array();
        foreach ($this->permissions as $permission){
            $permissionsArray[$permission->slug] = $permission->name;
        }

        return$permissionsArray;
    }

}

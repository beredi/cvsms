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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    public function hasPermission($permissionSlug){
        $result = false;
        foreach ($this->permissions as $permission){
            if ($permission->slug == $permissionSlug) $result = true;
        }

        return $result;
    }
}

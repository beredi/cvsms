<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_CUSTOMER' => 'View customer',
        'VIEW_ALL_CUSTOMER' => 'View all customers',
        'EDIT_CUSTOMER' => 'Edit customer',
        'DELETE_CUSTOMER' => 'Delete customer',
        'CREATE_CUSTOMER' => 'Create customer'
    );

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'address',
        'id_card',
        'owe'
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
     * @param $value
     * @return mixed
     */
    public function getPhoneAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getEmailAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getAddressAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getIdCardAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getOweAttribute($value){
        return $value;
    }

    /**
     * @return array
     */
    public static function getPermissions(){
        return self::$permissions;
    }
}

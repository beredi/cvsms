<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles(){
       return $this->hasMany(Vehicle::class);
    }

    /**
     * @return string
     */
    public function fullName(){
        return $this->name . ' ' . $this->lastname;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function services(){
        $vehicles = array();
        foreach ($this->vehicles as $vehicle){
            $vehicles[] = $vehicle->id;
        }

        return Service::whereIn('vehicle_id', $vehicles)
            ->get();

    }

    /**
     * @return array
     */
    public function vehiclesToArray(){
        $vehicles = array();
        foreach ($this->vehicles as $vehicle){
            $vehicles[$vehicle->id] = $vehicle->displayName();
        }

        return $vehicles;
    }
}

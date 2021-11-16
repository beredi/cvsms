<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

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
}

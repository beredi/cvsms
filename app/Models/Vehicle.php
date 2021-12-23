<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    const VEHICLE_MODEL = 'model';
    const VEHICLE_TYPE = 'type';
    const VEHICLE_BRAND = 'brand';


    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_VEHICLE' => 'View vehicle',
        'VIEW_ALL_VEHICLE' => 'View all vehicles',
        'EDIT_VEHICLE' => 'Edit vehicle',
        'DELETE_VEHICLE' => 'Delete vehicle',
        'CREATE_VEHICLE' => 'Create vehicle'
    );

    /**
     * @return array
     */
    public static function getPermissions(){
        return self::$permissions;
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'year',
        'chassisNum',
        'engineVolume',
        'enginePower',
        'transmission'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(){
        return $this->belongsTo(VehicleType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function model(){
        return $this->belongsTo(VehicleModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return mixed
     */
    public function brand(){
        return $this->model->brand;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getChassisNumAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getEngineVolumeAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getEnginePowerAttribute($value){
        return $value;
    }

    /**
     * @return string[]
     */
    public static function getTransmissionTypes(){
        return ['automatic', 'manual'];
    }

    /**
     * @param $value
     */
    public function setEngineVolumeAttribute($value){
        $this->attributes['engine_volume'] = $value;
    }

    /**
     * @param $value
     */
    public function setEnginePowerAttribute($value){
        $this->attributes['engine_power'] = $value;
    }

    /**
     * @param $value
     */
    public function setYearAttribute($value){
        $this->attributes['year'] = $value;
    }

    /**
     * @param $value
     */
    public function setChassisNumAttribute($value){
        $this->attributes['chassis_num'] = $value;
    }

    /**
     * @param $value
     */
    public function setTransmissionAttribute($value){
        $this->attributes['transmission'] = $value;
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
    public function displayName(){
        return '(' . $this->type->type . ') ' . $this->brand()->name . ' ' . $this->model->name . ' - ' . $this->year;
    }
}

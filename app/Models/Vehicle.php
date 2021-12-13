<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

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
     * @var string[]
     */
    protected $fillable = [
        'year',
        'chassisNum',
        'engineVolume',
        'enginePower',
        'transmission'
    ];

    private $transmissionType = ['automatic', 'manual'];

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
}

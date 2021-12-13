<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_VEHICLE_MODEL' => 'View vehicle model',
        'VIEW_ALL_VEHICLE_MODEL' => 'View all vehicle models',
        'EDIT_VEHICLE_MODEL' => 'Edit vehicle model',
        'DELETE_VEHICLE_MODEL' => 'Delete vehicle model',
        'CREATE_VEHICLE_MODEL' => 'Create vehicle model'
    );

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(){
        return $this->belongsTo(VehicleBrand::class);
    }

    /**
     * @param $name
     * @return $this
     */
    public function setNameAttribute($name){
        $this->attributes['name'] = $name;

        return $this;
    }
}

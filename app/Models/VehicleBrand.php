<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_VEHICLE_BRAND' => 'View vehicle brand',
        'VIEW_ALL_VEHICLE_BRAND' => 'View all vehicle brands',
        'EDIT_VEHICLE_BRAND' => 'Edit vehicle brand',
        'DELETE_VEHICLE_BRAND' => 'Delete vehicle brand',
        'CREATE_VEHICLE_BRAND' => 'Create vehicle brand'
    );

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];
}

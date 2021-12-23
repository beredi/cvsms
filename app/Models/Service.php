<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    /**
     * @var string[]
     */
    protected $fillable = [
        'date',
        'name',
        'description',
        'kilometers',
        'time_spent',
        'price'
    ];


    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_SERVICE' => 'View service',
        'VIEW_ALL_SERVICE' => 'View all services',
        'EDIT_SERVICE' => 'Edit service',
        'DELETE_SERVICE' => 'Delete service',
        'CREATE_SERVICE' => 'Create service'
    );

    /**
     * @return array
     */
    public static function getPermissions(){
        return self::$permissions;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){
        return $this->vehicle->customer;
    }

}
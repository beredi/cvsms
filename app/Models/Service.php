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
        "date",
        "name",
        "description",
        "kilometers",
        "time_spent",
        "paid",
        "price",
    ];

    /**
     * PERMISSIONS
     */

    private static $permissions = [
        "VIEW_SERVICE" => "View service",
        "VIEW_ALL_SERVICE" => "View all services",
        "EDIT_SERVICE" => "Edit service",
        "DELETE_SERVICE" => "Delete service",
        "CREATE_SERVICE" => "Create service",
    ];

    /**
     * @return array
     */
    public static function getPermissions(): array
    {
        return self::$permissions;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->vehicle->customer;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function stock_items(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(StockItem::class)
            ->withTimestamps()
            ->withPivot(["pieces"]);
    }

    /**
     * @return mixed
     */
    public function invoices()
    {
        return InvoiceItem::where("class_name", "Service")
            ->where("item_id", $this->id)
            ->get();
    }

    /**
     * @return bool
     */
    public function hasInvoices()
    {
        return count($this->invoices()) > 0;
    }
}

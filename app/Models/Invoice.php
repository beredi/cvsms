<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ["date_invoice", "date_paid", "paid"];

    /**
     * PERMISSIONS
     */

    private static $permissions = [
        "VIEW_INVOICE" => "View invoice",
        "VIEW_ALL_INVOICE" => "View all invoices",
        "EDIT_INVOICE" => "Edit invoice",
        "DELETE_INVOICE" => "Delete invoice",
        "CREATE_INVOICE" => "Create invoice",
    ];

    /**
     * @return array
     */
    public static function getPermissions(): array
    {
        return self::$permissions;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, "invoice_id");
    }

    /**
     * @return float|int
     */
    public function getPrice()
    {
        $price = 0;
        foreach ($this->invoiceItems as $invoiceItem) {
            $price +=
                $invoiceItem->class_name::findOrFail($invoiceItem->item_id)
                    ->price * $invoiceItem->pieces;
        }

        return $price;
    }
}

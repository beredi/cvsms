<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //Invoice Item uses permissions from Invoice
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ["invoice_id", "class_name", "item_id", "pieces"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

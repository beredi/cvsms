<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    /**
     * PERMISSIONS
     */

    private static $permissions = array(
        'VIEW_STOCKITEM' => 'View stock item',
        'VIEW_ALL_STOCKITEM' => 'View all stock items',
        'EDIT_STOCKITEM' => 'Edit stock item',
        'DELETE_STOCKITEM' => 'Delete stock item',
        'CREATE_STOCKITEM' => 'Create stock item'
    );

    /**
     * @return array
     */
    public static function getPermissions(): array
    {
        return self::$permissions;
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'on_stock',
        'price',
        'purchase_price'
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
    public function getIdAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getOnStockAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPriceAttribute($value){
        return $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getPurchasePriceAttribute($value){
        return $value;
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
    }

    /**
     * @param $value
     */
    public function setOnStockAttribute($value){
        $this->attributes['on_stock'] = $value;
    }

    /**
     * @param $value
     */
    public function setPriceAttribute($value){
        $this->attributes['price'] = $value;
    }

    /**
     * @param $value
     */
    public function setPurchasePriceAttribute($value){
        $this->attributes['purchase_price'] = $value;
    }

    /**
     * @return float|int|mixed
     */
    public function getPriceWithFee(){
        return ($this->price + ($this->price * 20 / 100));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}

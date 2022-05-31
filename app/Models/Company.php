<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * PERMISSIONS
     */

    private static $permissions = [
        "VIEW_COMPANY" => "View company",
        "VIEW_ALL_COMPANY" => "View all companies",
        "EDIT_COMPANY" => "Edit company",
        "DELETE_COMPANY" => "Delete company",
        "CREATE_COMPANY" => "Create company",
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        "name",
        "street",
        "street_number",
        "zip",
        "city",
        "email",
        "pib",
        "unique_number",
        "bank_account",
        "is_company_app_owner",
        "logo",
    ];

    /**
     * @return array
     */
    public static function getPermissions()
    {
        return self::$permissions;
    }
}

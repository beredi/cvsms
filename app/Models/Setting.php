<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public const LANGUAGE = 'language';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'value'
    ];

    /**
     * @var string[]
     */
    private static $languages = [
        'sk' => 'Slovenčina',
        'en' => 'English',
        'rs' => 'Srpski'
    ];

    /**
     * @return string[]
     */
    public static function getLanguages(){
        return self::$languages;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @param $lang
     */
    public function setLanguage($lang){
        $this->name = self::LANGUAGE;
        $this->value = $lang;
    }

}

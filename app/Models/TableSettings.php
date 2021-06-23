<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSettings extends Model
{
    use HasFactory;

    protected $table = 'table_settings';

    protected $fillable = ['element_name', 'positioning', 'font_style'];

    public static function getSettings()
    {
        return TableSettings::select('id', 'element_name', 'positioning', 'font_style')
            ->get();
    }
}

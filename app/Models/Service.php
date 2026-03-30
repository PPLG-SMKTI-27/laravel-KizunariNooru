<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'label', 'description', 'svg_path', 'sort_order'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title', 'issuer', 'category', 'date', 'progress', 'icon_svg', 'credential_url', 'sort_order', 'image'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_desktop',
        'image_tablet',
        'image_mobile',
        'description',
        'category',
        'challenge',
        'solution',
        'result',
        'features',
        'tech',
        'github',
        'demo'
    ];
}
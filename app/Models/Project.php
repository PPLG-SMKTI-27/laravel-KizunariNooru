<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description', 'category', 'challenge', 'solution', 'result', 'features'];

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

    /**
     * Get the tech stack as an array.
     */
    protected function techArray(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tech ? array_map('trim', explode(',', $this->tech)) : [],
        );
    }
}
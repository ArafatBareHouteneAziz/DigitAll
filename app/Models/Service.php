<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'features',
        'base_price',
        'category',
        'image_path',
        'is_active',
        'metadata',
    ];

    protected $casts = [
        'features' => 'array',
        'metadata' => 'array',
        'is_active' => 'boolean',
        'base_price' => 'decimal:2',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }
}

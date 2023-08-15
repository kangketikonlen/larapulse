<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnavbar extends Model
{
    use HasFactory;

    public function navbars()
    {
        return $this->belongsTo(Navbar::class, 'navbar_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->createdAt = $model->freshTimestamp();
            $model->createdBy = auth()->check() ? auth()->user()->name : "System";
        });

        static::updating(function ($model) {
            $model->updatedAt = $model->freshTimestamp();
            $model->updatedBy = auth()->check() ? auth()->user()->name : "System";
        });
    }
}
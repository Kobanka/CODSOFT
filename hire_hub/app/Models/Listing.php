<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function clicks(){
        return $this->hasMany(Click::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'uuid';
    }


    public function clicks(){
        return $this->hasMany(Click::class);
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'clicks');
    }
}

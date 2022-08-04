<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model implements  HasMedia
{
    use HasFactory,SoftDeletes ,HasMediaTrait;
    protected $appends = ["image"];

    public function getImageAttribute(){
        if ($this->hasMedia()) {
            return $this->getFirstMedia()->getFullUrl();
        }
        return null;
    }

    public function flights(){
        return $this->hasMany(Flight::class);
    }
}

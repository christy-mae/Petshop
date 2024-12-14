<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'status', 'image_url'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

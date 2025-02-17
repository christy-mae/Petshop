<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    //
    use HasFactory;

    protected $fillable = ['customer_name', 'pet_id', 'status', 'total_price'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}

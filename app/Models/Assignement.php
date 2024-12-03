<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Salarie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignement extends Model
{
    use HasFactory;

    protected $table = 'order_employees';

    /*public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function salarie() 
    { 
        return $this->belongsTo(Salarie::class); 
    }*/
}

<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salarie extends Model
{
    use HasFactory;

    public function service():BelongsTo{
        return $this->belongsTo(Services::class,'services_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_employees');
    }

    /*public function order()
    {
        return $this->belongsTo(Order::class,'orders_id');
    }*/


    //protected $fillable =['cin','nom','prenom','tel','salaire'];
}

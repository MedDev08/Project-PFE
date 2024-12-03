<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Salarie;
use App\Models\Services;
use App\Models\Assignement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }

    public function salaries() 
    { 
        return $this->belongsToMany(Salarie::class,'order_employees','salaries_id'); 
    }


    /*public function salaries():HasMany{
        return $this->hasMany(Salarie::class,'salaries_id');
    }*/

}

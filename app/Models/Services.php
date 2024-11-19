<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Salarie;
use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    public function salaries():HasMany{
        return $this->hasMany(Salarie::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class,'orders','services_id','companies_id');
    }

}

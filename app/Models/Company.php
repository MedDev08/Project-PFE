<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->belongsToMany(Services::class,'orders','companies_id','services_id');
    }

}

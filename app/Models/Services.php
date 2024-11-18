<?php

namespace App\Models;

use App\Models\Salarie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;

    public function salaries():HasMany{
        return $this->hasMany(Salarie::class);
    }
}

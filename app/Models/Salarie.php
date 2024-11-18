<?php

namespace App\Models;

use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salarie extends Model
{
    use HasFactory;

    public function service():BelongsTo{
        return $this->belongsTo(Services::class);
    }

    //protected $fillable =['cin','nom','prenom','tel','salaire'];
}

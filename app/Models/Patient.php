<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];



    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    
}

<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dates',
        'price',
        'start_date',
        'end_date'
    ];

}

<?php

namespace App\Models;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'city',
        'certification_id',
        'address',
        'post_code'

    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }
}

<?php

namespace App\Models;

use App\Models\Certification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Traits\MultitenantableUserTrait;

class Examination extends Model
{
    use HasFactory,MultitenantableUserTrait;
    protected $fillable = [
        'date',
        'time',
        'certification_id',
        'created_by'

    ];

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }
}

<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'exam_file',
    ];

    // Relationship with Prescription
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}

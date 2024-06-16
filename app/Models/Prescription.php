<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'diagnosis',
        'prescription',
    ];

    // Relationship with Exams
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject_id']; // Agregado subject_id

    // Relación con estudiantes
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students')->withPivot('commission_id');
    }

    
    // Relación con comisiones
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    // Relación con la materia
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

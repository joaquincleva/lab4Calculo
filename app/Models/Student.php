<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    /**
     * Relación con comisiones: un estudiante puede estar inscrito en muchas comisiones.
     */
    public function commissions()
    {
        return $this->belongsToMany(Commission::class, 'commission_student');
    }

    /**
     * Relación con cursos a través de las comisiones.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_students')->withPivot('commission_id');
    }


}

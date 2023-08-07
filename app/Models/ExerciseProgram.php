<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseProgram extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'exerciseprogram';
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}

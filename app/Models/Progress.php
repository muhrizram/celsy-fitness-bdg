<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $table = 'progress';
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

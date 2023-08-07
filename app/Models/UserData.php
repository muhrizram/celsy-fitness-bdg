<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $table = 'user_data';

    public function scopeSearch($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->whereHas('pengguna', function($q) use($search){
                $q->where('name', 'like', '%'.$search.'%');
            })->with('pengguna')->get();
        });
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

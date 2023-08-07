<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    
    public function scopeSearch($query, array $filters){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('name', 'like', '%'.$filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        });
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'tittle', 
        'logo', 
        'tags', 
        'company',
        'location',
        'email',
        'website', 
        'desscription'
    ];
    public function scopeFilter($query,array $filters){
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');

        }
        if($filters['search'] ?? false) {
            $query->where('tittle', 'like', '%' . request('search') . '%')
                ->orWhere('desscription', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');


        }

    }
    //Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

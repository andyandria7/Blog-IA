<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'contenue',
        'image',
        'link'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Commentaire::class);
    }

    public function rating() : HasMany
    {
        return $this->hasMany(Rating::class);
    }
}

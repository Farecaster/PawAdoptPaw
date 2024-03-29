<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'user_id',
        'img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }
    public function report(){
        return $this->hasMany(ReportedPetSocialPost::class);
    }
}

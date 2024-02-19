<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'species',
        'breed',
        'region',
        'description',
        'img',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function isAdopted()
    {
        return $this->adoptionRequests()->whereIn('status', ['accepted', 'done'])->exists();
    }
}

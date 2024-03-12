<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedPetSocialPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'user_id',
        'pet_social_id'
    ];

    public function petSocial()
    {
        return $this->belongsTo(PetSocial::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

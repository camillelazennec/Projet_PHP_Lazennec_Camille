<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'user_id',
    ];

    // Many-to-One relationship with User
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}

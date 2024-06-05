<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'states',
        'email',
        'password',
        'user_id',
        'active',
        "location",
        "certificate",
        "admin"
    ];
    protected $attributes = [
        'states' => 'New', // Default state value
    ];

    // Relationships (Optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
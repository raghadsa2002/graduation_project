<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'states',
        'email',
        'password',
        'user_id',
        'active'
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

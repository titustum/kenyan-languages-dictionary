<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // Allow mass assignment for the following fields
    protected $fillable = [
        'ip_address',
        'user_agent',
        'language_slug',
        'category',
        'referrer',
    ];
}

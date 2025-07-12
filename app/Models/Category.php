<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PSpell\Dictionary;

class Category extends Model
{
    use HasFactory; 

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'icon',
    ];

    // Relations
    public function dictionaryMainEntries()
    {
        return $this->hasMany(DictionaryMainEntry::class);
    } 
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Use slug instead of id for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function mainEntries()
    {
        return $this->hasMany(DictionaryMainEntry::class);
    } 
     
}   

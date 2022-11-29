<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['name','category','carbohydrates'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function snacks()
    {
        return $this->hasMany(Snack::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'main_id',
        'sub_id',
    ];

    //___Relation
    public function book(){
        return $this->hasMany(Book::class);
}
}
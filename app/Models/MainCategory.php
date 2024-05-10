<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_name',
        // 'sub_id',
    ];

    //_______Relation

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory', 'main_id');
    }
}

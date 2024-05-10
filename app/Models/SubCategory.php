<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_name',
        'main_id'
    ];

    //_______Relation

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_id', 'id');
    }
}

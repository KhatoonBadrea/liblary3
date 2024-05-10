<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'main_id',
        'sub_id',
        'evaluate'
    ];

    //___________ Relations

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_id', 'id');
    }

    public function favotite()
    {
        return $this->belongsTo(Favorite::class, 'fav_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user')
            ->withPivot('rating') // اضافة القيمة المقيمة من المستخدم
            ->withTimestamps();
    }
}

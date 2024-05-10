<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Resource\bookResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\MainCategory;

class VisitorController extends Controller
{
    use ApiResponseTrait;
    public function showBooksInMainCategory()
    {
        $book = Book::all();
        $book=bookResource::collection($book);
        if ($book) {
            return $this->successResponse('this is all books', $book, 200);
        }else
            return $this->errorResponse('there are not any book!',404);
    }
    public function filter(Request $request)
    {
        $category = $request->input('category');


        $books = Book::whereHas('mainCategory', function ($query) use ($category) {
            $query->where('main_name', $category);
        })
            ->orWhereHas('subCategory', function ($query) use ($category) {
                $query->where('sub_name', $category);
            })
            ->get();
            $books=bookResource::collection($books);
        if($books){

            return $this->successResponse('Filtering result', $books, 200);
        }else
        return $this->errorResponse('there are not any book!',404); 

    }
}

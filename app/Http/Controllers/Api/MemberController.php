<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Models\User;
use App\Models\Evaluate;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\Resource\bookResource;

class MemberController extends Controller
{
  use  ApiResponseTrait;
    
    public function addToFavorite(Request $request)
    {
        
        $book = Book::findOrFail($request->book_id);
        $favorite = new Favorite();
        $favorite->name = $book->name;
        $favorite->author = $book->author;
        $favorite->main_id = $book->main_id;
        $favorite->sub_id = $book->sub_id;
        $favorite->save();
      
        return $this->successResponse('successfuly add to favorite',$favorite,201);
    }



    public function addEvaluate(Request $request, $id)
    {
        
        $book = Book::findOrFail($id);

        $book->users()->syncWithoutDetaching([auth()->id() => ['rating' => $request->evaluate]]);

        return $this->successResponse('The book was successfully evaluated',$book,200);
    }

     

}

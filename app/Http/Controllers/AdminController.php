<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\SubCategory;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\MainCategoryRequest;

class AdminController extends Controller
{


    public function index()
    {
        return view('dashboard');
    }


    public function createMainCategory()
    {
        return view('pages.createMainCategory');
    }

    public function storeMainCategories(MainCategoryRequest $request)
    {
        $main_category = new MainCategory();
        $main_category->main_name = $request->main_name;
        $main_category->subCategories();
        $main_category->save();

        return redirect()->route('index');
    }

    public function createSubCategory()
    {
        $main_categories = MainCategory::all();
        return view('pages.createSubCategory', compact('main_categories'));
    }

    public function storeSubCategories(SubCategoryRequest $request)
    {

        $sub_category = new SubCategory();
        $sub_category->main_id = $request->main_id;
        $sub_category->sub_name = $request->sub_name;
        $sub_category->save();

        return redirect()->route('index');
    }


    public function createBook(Request $request)
    {
        $main_categories = MainCategory::with(['subCategories'])->get();
        $list_main = MainCategory::all();
        $sub_categories = SubCategory::all();
        return view('pages.createBook', compact('main_categories',  'list_main', 'sub_categories'));
    }

    public function getbooks($id)
    {
        $List_books = SubCategory::where("main_id", $id)->pluck("sub_name", "id");
        return  $List_books;
    }

    public function storeBook(BookRequest $request)
    {

        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->main_id = $request->main_id;
        $book->sub_id = $request->sub_id;
        $book->save();
        return redirect()->route('index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Http\Utils\Listing;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request , string $category)
    {
        return view('pages.search.mission-by-category')->with([
            'categoryName'=> $category,
            'categories'=>Listing::domain(),
            'missions'=>Mission::where('category',$category)->orderBy('created_at','desc')->paginate(9)
        ]);
    }
}
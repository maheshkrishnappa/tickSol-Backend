<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\books;

class BookController extends Controller
{
    //
    public function index(){

        $Books  = books::all();

        return response()->json($Books);

    }
}

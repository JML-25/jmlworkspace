<?php

namespace App\Http\Controllers;

use App\Models\Cooking;

class CookingGlobalController extends Controller
{
    public function create()
    {
        return view('cookings.editor', ['cooking' => null]);
    }

    public function edit(Cooking $cooking)
    {
        return view('cookings.editor', ['cooking' => $cooking]);
    }
}
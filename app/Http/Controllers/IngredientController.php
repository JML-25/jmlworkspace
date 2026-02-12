<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $ingredients = Ingredient::latest()->paginate(10);
    return view("ingredients.index", compact("ingredients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	$ingredient['title']="";
	$ingredient['description']="";
	$ingredient['ingredienttype']="";


	$isEdit = False;
	return view('ingredients.createedit', compact('ingredient','isEdit'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredienttype' => 'nullable|string',
        
          ]);
    Ingredient::create($validatedData);
    
    return redirect()->route('ingredients.index')->with('success', 'Ingrédient créé avec succès.');;
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
		return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
		$isEdit = True;
		return view('ingredients.createedit', compact('ingredient','isEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredienttype' => 'nullable|string',
        
          ]);

    $ingredient->update($validatedData);
    
    return redirect()->route('ingredients.index')->with('success', 'Ingrédient modifié avec succès.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
         $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingrédient supprimé avec succès.');
    }
}
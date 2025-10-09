<?php

namespace App\Http\Controllers;

use App\Models\Cooking;
use Illuminate\Http\Request;

class CookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $cookings = Cooking::latest()->paginate(10);
    return view("cookings.index", compact("cookings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cookings.create');
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $name = $request->input('name');
    // Validate the incoming request data
        
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'additionalinformation' => 'nullable|string',
        'recipestatus' => 'required|string|max:7',
        'typeofdish' => 'nullable|string|max:7',
        'difficultylevel' => 'nullable|string|max:7',
        'preparationtime' => 'nullable|integer',
        'cookingtime' => 'nullable|integer',
        'totaltime' => 'nullable|integer',
        'servings' => 'nullable|integer',
        'calories' => 'nullable|integer',
        'fat' => 'nullable|integer',
        'carbs' => 'nullable|integer',
        'protein' => 'nullable|integer',
        'totalcost' => 'nullable|integer',
          ]);

          // Create a new job listing with the validated data
    Cooking::create($validatedData);
    
    return redirect()->route('cookings.index')->with('success', 'Recette créée avec succès.');;
        
        
        
        
//         return view('cooking')
//    ->with('message','gestion des recettes store function');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cooking $cooking)
    {
         return view('cookings.show', compact('cooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cooking $cooking)
    {
        return view('cookings.edit', compact('cooking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cooking $cooking)
    {
        // echo "in the update";
         $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'additionalinformation' => 'nullable|string',
        'recipestatus' => 'required|string|max:7',
        'typeofdish' => 'nullable|string|max:7',
        'difficultylevel' => 'nullable|string|max:7',
        'preparationtime' => 'nullable|integer',
        'cookingtime' => 'nullable|integer',
        'totaltime' => 'nullable|integer',
        'servings' => 'nullable|integer',
        'calories' => 'nullable|integer',
        'fat' => 'nullable|integer',
        'carbs' => 'nullable|integer',
        'protein' => 'nullable|integer',
        'totalcost' => 'nullable|integer',
          ]);

        // dd($validatedData);

          // Create a new job listing with the validated data
    $cooking->update($validatedData);
    
    return redirect()->route('cookings.index')->with('success', 'Recette modifiée avec succès.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cooking $cooking)
    {
         $cooking->delete();

        return redirect()->route('cookings.index')->with('success', 'Recette supprimée avec succès.');
    }
}
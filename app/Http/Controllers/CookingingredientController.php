<?php

namespace App\Http\Controllers;

use App\Models\Cookingingredient;
use App\Models\Cooking;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CookingingredientController extends Controller
{
  public function test(Cooking $cooking){
    // $theCooking = Cooking::findOrFail($cooking);
    // $theName = $theCooking->name;
    return ("coucou bis...the cooking is: " . $cooking->name);
  }
    /**
     * Display a listing of the ingredients for a specific cooking.
	 * Input parameter : $cooking
     */
    public function index(Cooking $cooking)
    {
	
    $cookingingredients = $cooking->cookingingredients()->orderBy('sequence')->paginate(5);
	// return $cookingingredients;
    return view("cookingingredients.index", compact("cookingingredients","cooking"));
    }

    /**
     * Show the form for creating a new ingredient for a specifi cooking.
     */
    public function create(Cooking $cooking)
    {
	$cookingingredient['title']="";
	$cookingingredient['ingredientdescription']="";
	$cookingingredient['instruction']="";
	$cookingingredient['sequence']="";
	$cookingingredient['quantity']="";
	$cookingingredient['unit']="";
	$cookingingredient['cooking_id']=$cooking->id;
	$cookingingredient['ingredient_id']="";
	

	$isEdit = False;
	return view('cookingingredients.createedit', compact('cookingingredient','cooking','isEdit'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cooking $cooking)
    {
        // $name = $request->input('name');
    // Validate the incoming request data
        
    $validatedData = $request->validate([
		'title' => 'required|string|max:255',
		'ingredientdescription' => 'required|string',
		'instruction' => 'nullable|string',
		'sequence' => 'required|integer',
		'quantity' => 'nullable|integer|',
		'unit' => 'nullable|string|max:255',
		'cooking_id' => 'required|exists:cookings,id',
		'ingredient_id' => 'required|exists:ingredients,id',
          ]);

          // Create a new job listing with the validated data
    Cookingingredient::create($validatedData);
    
    return redirect()->route('cookings.cookingingredients.index', $cooking)->with('success', 'Ingrédient ajouté avec succès.');;
	//return $validatedData;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cookingingredient $cookingingredient)
    {
		$cooking = Cooking::findOrFail($cookingingredient->cooking_id);
		$ingredient = Ingredient::findOrFail($cookingingredient->ingredient_id);
		return view('cookingingredients.show', compact('cookingingredient','cooking', 'ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cookingingredient $cookingingredient)
    {
		$cooking = Cooking::findOrFail($cookingingredient->cooking_id);
		$isEdit = True;
		$cookingingredient = $cookingingredient->toArray();
		
		return view('cookingingredients.createedit', compact('cookingingredient', 'cooking','isEdit'));
		
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cookingingredient $cookingingredient)
    {
        // echo "in the update";
         $validatedData = $request->validate([
        'title' => 'required|string|max:255',
		'ingredientdescription' => 'required|string',
		'instruction' => 'nullable|string',
		'sequence' => 'required|integer',
		'quantity' => 'nullable|integer|',
		'unit' => 'nullable|string|max:255',
		'cooking_id' => 'required|exists:cookings,id',
		'ingredient_id' => 'required|exists:ingredients,id',
          ]);

        // dd($validatedData);

          // Create a new job listing with the validated data
    $cooking = Cooking::findOrFail($cookingingredient->cooking_id);
	$cookingingredient->update($validatedData);
	
    // return $cooking;
    return redirect()->route('cookings.cookingingredients.index', $cooking)->with('success', 'Recette modifiée avec succès.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cookingingredient $cookingingredient)
    {
		$cooking = Cooking::findOrFail($cookingingredient->cooking_id);
        $cookingingredient->delete();

        return redirect()->route('cookings.cookingingredients.index',$cooking )->with('success', 'Elément de recette supprimé avec succès.');
    }
}
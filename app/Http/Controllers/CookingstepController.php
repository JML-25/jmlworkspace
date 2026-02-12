<?php

namespace App\Http\Controllers;

use App\Models\Cookingstep;
use App\Models\Cooking;
use Illuminate\Http\Request;

class CookingstepController extends Controller
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
	
    $cookingsteps = $cooking->cookingsteps()->orderBy('sequence')->paginate(5);
	// return $cookingsteps;
    return view("cookingsteps.index", compact("cookingsteps","cooking"));
    }

    /**
     * Show the form for creating a new ingredient for a specifi cooking.
     */
    public function create(Cooking $cooking)
    {
	$cookingstep['title']="";
	$cookingstep['sequence']="";
	$cookingstep['tasktype']="";
	$cookingstep['instruction']="";
	$cookingstep['additionalinformation']="";
	$cookingstep['expectedtime']="";
	$cookingstep['cooking_id']=$cooking->id;
	

	$isEdit = False;
	return view('cookingsteps.createedit', compact('cookingstep','cooking','isEdit'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cooking $cooking)
    {
    // Validate the incoming request data
        
		$validatedData = $request->validate([
		'title' => 'required|string|max:255',
		'sequence' => 'required|integer',
		'tasktype' => 'required|string',
		'instruction' => 'nullable|string',
		'additionalinformation' => 'nullable|string',
		'expectedtime' => 'nullable|integer|',
		'cooking_id' => 'required|exists:cookings,id',
	]);

          // Create a new job listing with the validated data
    Cookingstep::create($validatedData);
    
    return redirect()->route('cookings.cookingsteps.index', $cooking)->with('success', 'Etape ajoutée avec succès.');;
	//return $validatedData;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cookingstep $cookingstep)
    {
		$cooking = Cooking::findOrFail($cookingstep->cooking_id);
		return view('cookingsteps.show', compact('cookingstep','cooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cookingstep $cookingstep)
    {
		$cooking = Cooking::findOrFail($cookingstep->cooking_id);
		$isEdit = True;
		$cookingstep = $cookingstep->toArray();
		$cookingstep['additionalinformation'] = $cookingstep['additionalinformation'] ? $cookingstep['additionalinformation'] : "";
		
		return view('cookingsteps.createedit', compact('cookingstep', 'cooking','isEdit'));
		
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cookingstep $cookingstep)
    {
		$validatedData = $request->validate([
        'title' => 'required|string|max:255',
		'sequence' => 'required|integer',
		'tasktype' => 'required|string',
		'instruction' => 'nullable|string',
		'additionalinformation' => 'nullable|string',
		'expectedtime' => 'nullable|integer|',
		'cooking_id' => 'required|exists:cookings,id',
          ]);

          // Update the current cookingstep with the validated data
    $cooking = Cooking::findOrFail($cookingstep->cooking_id);
	$cookingstep->update($validatedData);
	
    
    return redirect()->route('cookings.cookingsteps.index', $cooking)->with('success', 'Etape modifiée avec succès.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cookingstep $cookingstep)
    {
		$cookingstep->delete();
		$cooking = Cooking::findOrFail($cookingstep->cooking_id);
        return redirect()->route('cookings.cookingsteps.index',$cooking )->with('success', 'Etape supprimée avec succès.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Applicationcode;
use Illuminate\Http\Request;

class ApplicationcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
	$applicationcodes = Applicationcode::orderBy('table')
	->orderBy('code')->orderBy('sequence')
	->paginate(10);
    return view("applicationcodes.index", compact("applicationcodes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $applicationcode['table']="";
    $applicationcode['code']="";
    $applicationcode['sequence']="";
    $applicationcode['label']="";
    $applicationcode['internal']="";
    $isEdit = False;
        
        return view('applicationcodes.createedit',compact('applicationcode', 'isEdit'));
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $name = $request->input('name');
    // Validate the incoming request data
        
    $validatedData = $request->validate([
        'table' => 'required|string|max:255',
		'code' => 'required|string|max:255',
        'sequence' => 'required|integer',
        'label' => 'required|string|max:255',
        'internal' => 'required|string|max:255',
                  ]);
          // Create a new application code with the validated data
    Applicationcode::create($validatedData);
    return redirect()->route('applicationcodes.index')->with('success', 'Application code créée avec succès.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicationcode $applicationcode)
    {
         return view('applicationcodes.show', compact('applicationcode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicationcode $applicationcode)
    {
        $isEdit = True;
        return view('applicationcodes.createedit', compact('applicationcode', 'isEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicationcode $applicationcode)
    {
        // echo "in the update";
        $validatedData = $request->validate([
        'table' => 'required|string|max:255',
		'code' => 'required|string|max:255',
        'sequence' => 'required|integer',
        'label' => 'required|string|max:255',
        'internal' => 'required|string|max:255',
                 ]);

    $applicationcode->update($validatedData);
    
    return redirect()->route('applicationcodes.index')->with('success', 'Applicationcode modifiée avec succès.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicationcode $applicationcode)
    {
         $applicationcode->delete();

        return redirect()->route('applicationcodes.index')->with('success', 'Applicationcode  supprimée avec succès.');
    }
}
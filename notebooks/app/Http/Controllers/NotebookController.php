<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notebooks;
class NotebookController extends Controller
{
   
    public function index()
    {
        $notebooks = Notebooks::paginate(10); 
        return response()->json($notebooks);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|string|max:255',
        ]);

        $notebook = Notebooks::create($request->all());
        return response()->json($notebook, 201);
    }

    
    public function show(string $id)
    {
        $notebook = Notebooks::findOrFail($id);
        return response()->json($notebook);
    }

   
    public function update(Request $request, string $id)
    {
        $notebook = Notebooks::findOrFail($id);
        
        $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|max:255',
            'company' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|string|max:255',
        ]);

        $notebook->update($request->all());
        return response()->json($notebook);
    }

    public function destroy(string $id)
    {
        $notebook = Notebooks::findOrFail($id);
        $notebook->delete();
        return response()->json(null, 204);
    }
}

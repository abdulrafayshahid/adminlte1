<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{

public function show(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email_address' => 'required|email',
        'address' => 'required',
        'number' => 'required|numeric'
    ]);

    // Insert the data into the 'form' table
    DB::table('form')->insert([
        'name' => $validatedData['name'],
        'email_address' => $validatedData['email_address'],
        'address' => $validatedData['address'],
        'number' => $validatedData['number']
    ]);

    return response()->json(['message' => 'Data saved successfully']);
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Properties; 
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        
        $properties = Properties::all(); 
        
        return view('kost.index', compact('properties')); 
    }
}
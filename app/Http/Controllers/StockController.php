<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actions.createproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form data
        $validatedData = $request->validate([
            'product' => 'required',
            'price' => 'required|numeric',
            'service' => 'required',
            'date' => 'required|date',
            'Quantity' => 'required|numeric',
            'desc' => 'required',
        ]);
        $validatedData['created_at'] = now();
        Stock::create($validatedData);

        return to_route('admin_dashboard.stock');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Stock::destroy($id);

        return to_route('admin_dashboard.stock')->with('success', 'Product deleted successfully.');
    }


}

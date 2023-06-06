<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actions.createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'image.required' => 'The image field is required.',
            'image.image' => 'The image field must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        ]);
    
        // Store the user image in the public folder
        $imagePath = $request->file('image')->store('public/images');
        $imageName = basename($imagePath);

    
        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->image = $imageName;
        $user->role = $validatedData['role'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->email_verified_at = now(); // Set the email_verified_at field to the current timestamp
    
        // Save the user to the database
        $user->save();
    
        // Redirect to a success page or perform any additional actions
        return to_route('admin_dashboard.users');
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
        User::destroy($id);

        return to_route('admin_dashboard.users')->with('success', 'User deleted successfully.');
    }


}

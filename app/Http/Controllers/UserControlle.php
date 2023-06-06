<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;



class UserControlle extends Controller
{
  public function index(){
    $demandes = Demande::where('status', 'pending')->count();
    $accepted = Demande::where('status', 'accepted')->count();
    $refused = Demande::where('status', 'refused')->count();
    $demande = Demande::paginate(6);
    $stock = Stock::all();
    return view('user.user_dashboard', ['stock' => $stock, 'demandes'=> $demandes, 'accepted'=> $accepted, 'refused'=> $refused, 'demande'=> $demande]);
  }

  public function create(){
    $stock = Stock::all();
    return view('user.actions.createdemande', ['stock' => $stock]);
  }

  public function store(Request $request)
  {
      $validatedData = $request->validate([
          'product' => 'required',
          'Reason' => 'required',
          'service' => 'required',
          'Quantity' => 'required|integer',
      ]);

      $demande = new Demande();
      $demande->product = $request->input('product');
      $demande->username = Auth::user()->name; 
      $demande->service = $request->input('service');
      $demande->Reason = $request->input('Reason');
      $demande->status = 'pending'; 
      $demande->Quantity = $request->input('Quantity');
      $demande->save();

      return to_route('user_dashboard.create')->with('success', 'Demande created successfully.');
  }

  public function destroy($id)
    {
        User::destroy($id);

        return to_route('user_dashboard')->with('success', 'Demande deleted successfully.');
    }

    public function accepted()
    {

      $user = Auth::user()->name; 
      $accepted = Demande::where('username', $user)
                    ->where('status', 'accepted')
                    ->paginate(6);
      return view('user.accepted', ['accepted' => $accepted]);

    }

    public function refused()
    {

      $user = Auth::user()->name; 
      $refused = Demande::where('username', $user)
                    ->where('status', 'refused')
                    ->paginate(6);
      return view('user.refused', ['refused' => $refused]);

    }
    
}

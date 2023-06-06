<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Stock;
use App\Models\Demande;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {   
        $demandes = Demande::where('status', 'pending')->count();
        $accepted = Demande::where('status', 'accepted')->count();
        $refused = Demande::where('status', 'refused')->count();
        $all = User::all()->count();
        $users = User::paginate(6);
        return view('admin.admin_dashboard', ['demandes'=> $demandes, 'accepted'=> $accepted, 'refused'=> $refused, 'all'=> $all, 'users' => $users]);
    }

    public function users()
    {
        $users = User::where('role', 'user')->paginate(6);
        return view('admin.users', [ 'users' => $users]);
    }
    
    public function stock()
    {
        $stock = Stock::paginate(6);
        return view('admin.stock', [ 'stock' => $stock]);
    }

    public function demandes()
    {
        $demandes = Demande::where('status', 'pending')->paginate(6);;
        $stock = Stock::all();
        return view('admin.demandes', [ 'demandes' => $demandes, 'stock'=> $stock]);
    }
    public function accepted()
    {
        $accepted = Demande::where('status', 'accepted')->paginate(6);;
        $stock = Stock::all();
        return view('admin.accepted', [ 'accepted' => $accepted, 'stock'=> $stock]);
    }
    public function rufused()
    {
        $rufused = Demande::where('status', 'refused')->paginate(6);
        $stock = Stock::all();
        return view('admin.refused', [ 'rufused' => $rufused, 'stock'=> $stock]);
    }

    public function deletedemande($id)
    {
        Demande::destroy($id);

        return to_route('admin_dashboard')->with('success', 'User deleted successfully.');
    }

    public function accept($id)
    {
        $demande = Demande::find($id);
        if ($demande) {
            $demande->status = 'accepted';
            $demande->save();
            return redirect()->route('admin_dashboard.demandes')->with('success', 'Demande accepted successfully.');
        } else {
            return redirect()->route('admin_dashboard.demandes')->with('error', 'Demande not found.');
        }
    }
    

    public function refuse($id)
    {
        $demande = Demande::find($id);
        if ($demande) {
            $demande->status = 'refused';
            $demande->save();
            return redirect()->route('admin_dashboard.demandes')->with('success', 'Demande refused successfully.');
        } else {
            return redirect()->route('admin_dashboard.demandes')->with('error', 'Demande not found.');
        }
    }
    
}

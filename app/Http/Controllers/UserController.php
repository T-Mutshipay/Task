<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nom = $request->nom;
        $postnom = $request->postnom;
        $prenom = $request->prenom;
        $sexe = $request->sexe;
        $email = $request->email;
        $role = $request->role;
    
        $b = " ";
        $nom_complet = $prenom . $b . $nom . $b . $postnom;
    
        $exist = User::where('nom', $nom_complet)->first();
    
        if ($exist) {
            return response()->json(['message' => 'L\'utilisateur existe déjà.'], 409);
        } else {
            $user = new User();
            $user->name = $nom_complet;
            $user->prenom = $prenom;
            $user->postnom = $postnom;
            $user->sexe = $sexe;
            $user->email = $email;
            $user->role = $role;
            $user->save();
    
            return response()->json(['message' => 'Utilisateur créé avec succès.'], 201);
        }
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
    public function edit($id)
    {
        $user = User::findOrFail($id); // Récupérer un utilisateur par ID
        $roles = Role::all(); // Récupérer tous les rôles
    
        return view('users.index', compact('user', 'roles'));
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
    public function destroy(string $id)
    {
        //
    }
    public function updateRole(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'role' => 'required|string',
        ]);

        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Rôle mis à jour avec succès.');
    }
}

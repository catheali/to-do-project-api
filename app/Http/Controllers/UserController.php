<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAllUsers( )
    {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if($request->image){
            $user->image = $request->image->store('users','public');
        }

        $user->save();

        return response()->json([

            "message" => "User criado com sucesso"
        ], 201);

    }
    public function getUser($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        }else {
            return response()->json([
                "message" => "User não encontrado"
            ],404);
        }
    }
    public function updateUser(Request $request, $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
           // $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->role =  is_null($request->role) ? $user->role : $request->role;

            if($request->image){
             if($user->image !== null){
              if(Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete([$user->image]);
              }
            }
              $user->image = is_null($request->image) ? $user->image : $request->image->store('users','public');
            }

            $user->save();
            return response()->json([
                "message" => "User atualizado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message"=> "User não encontrado"
            ], 404);
        }
    }
    public function deleteUser($id)
    {
        if(User::where('id', $id)){
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message"=> "User excluido com sucesso"
            ], 202);
        } else {
            return response()->json([
                "message" => "User não encontrado"
            ], 404);
        }
    }

    public function resetPassword( Request $request, $id)
    {
        if(!auth()->user()){
            return  response()->json(['error' => 'Não autorizado.']);
        }else{
            return response()->json(['success'=> 'uepa, deu certo']);
        }
    }

}

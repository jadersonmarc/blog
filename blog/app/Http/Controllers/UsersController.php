<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->Json([
            'users' => $users,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $users = User::create($dados);                          
            if ($users) {
                return response()->Json([
                    'res'=>'O recurso informado foi criado com sucesso.'
                ], 201);
            }
        return response()->Json([
            'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
        ], 422);
    }

    public function update(Request $request, $id)
    {
        if ($id) {           
            $users = User::findOrFail($id);

            if($users){
                 
                $data = $request->all();           
                $users->update($data);
                return response()->Json([
                    'users'=> $users,
                    'res'=>'O recurso informado foi alterado com sucesso.'
                ], 201);   
            } 
            return response()->Json([
                'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
            ], 422); 
        }
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);        
        if($users->delete()){
            return response()->Json([
                'users'=> $users,
                'res'=>'O recurso informado foi deletado com sucesso.'
            ], 201);;  
        }
        return response()->Json([
            'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
        ], 422);
    }
}

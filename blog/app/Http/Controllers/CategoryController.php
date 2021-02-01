<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->Json([
            'categories' => $categories,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    public function show($id)
    {
        if($id){
            $categories = Category::find($id);
        } else {
            $categories = Category::first($id);
        }
        return response()->Json([
            'categories' => $categories,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    public function store(Request $request)
    {
        $dados = $request->all();         
        $category = Category::create($dados);                          
            if ($category) {
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
            $category = Category::findOrFail($id);

            if($category){
                 
                $data = $request->all();           
                $category->update($data);
                return response()->Json([
                    'category'=> $category,
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
        $category = Category::findOrFail($id);        
        if($category->delete()){
            return response()->Json([
                'category'=> $category,
                'res'=>'O recurso informado foi deletado com sucesso.'
            ], 201);;  
        }
        return response()->Json([
            'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
        ], 422);
    }
}

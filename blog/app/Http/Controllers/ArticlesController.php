<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $page = $page >= 1 ? $page : 1;

        $articles =  Article::select('id', 'autor', 'title', 'sub_title', 'content', 'category','created_at');
        $itens = $articles->orderBy('created_at', 'desc')->paginate( $page);
        return response()->Json([
            'articles' => $itens,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = [              

            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'sub_title' => $request->sub_title,
            'imageUrl' => $request->imageUrl,
            'autor' => $request->autor,

        ];
        $article = new Article($dados);                          
            if ($article) {
                $article->save();
                return response()->Json([
                    'res'=>'O recurso informado foi criado com sucesso.'
                ], 201);
            }
        return response()->Json([
            'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
        ], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return response()->Json([
            'article' => $article,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id) {           
            $article = Article::findOrFail($id);

            if($article){
                 
                $data = $request->all();           
                $article->update($data);
                return response()->Json([
                    'article'=> $article,
                    'res'=>'O recurso informado foi alterado com sucesso.'
                ], 201);   
            } 
            return response()->Json([
                'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
            ], 422); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::findOrFail($id);        
        if($articles->delete()){
            return response()->Json([
                'articles'=> $articles,
                'res'=>'O recurso informado foi deletado com sucesso.'
            ], 201);;  
        }
        return response()->Json([
            'res'=>'A requisição foi recebida com sucesso, porém contém parâmetros inválidos.'
        ], 422);
    }

    public function getByCategoy(Request $request, $id)
    {
        $page = $request->input('page', 1);
        $articles = new Article();
        $notices = $articles->getByCategory($page, $id);
        return response()->Json([
            'articles' => $notices,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }

    public function getByText($content)
    {
        $articles = new Article();
        $notice = $articles->getByText($content);
        return response()->Json([
            'articles' => $notice,
            'res' => ' O recurso solicitado foi processado e retornado com sucesso.'
        ], 200);
    }
}

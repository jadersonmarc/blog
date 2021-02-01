<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\App\Models\Category;

class Article extends Model
{

    protected $table = 'articles';
    protected $fillable = [
        'autor', 'title', 'sub_title', 'content', 'imageUrl', 'category'
    ];

    
    public function getByCategory($page, $id)

    {
        // $articles = Article::where('type', $type)->get();
        $articles = DB::table('articles')
            ->join('categories', 'articles.category', '=', 'categories.id')
            ->join('users', 'articles.autor', '=', 'users.id')
            ->where('categories.id', '=', $id)
            ->select('articles.*', 'categories.name', 'users.name','categories.id')
            ->paginate( $page);
        return $articles;
    }

    public function getByText($content)
    {
       $itens = Article::where('content', 'like', '%' . $content . '%')->orderBy('created_at', 'desc')->get();
       return  $itens;
    } 

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'id'
    ];

    public function getByCategory($name)
    {
        $categories = Category::where('name', $name);
        return $categories;
    }
}

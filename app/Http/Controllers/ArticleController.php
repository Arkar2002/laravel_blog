<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', [
            "articles" => $articles,
        ]);
    }

    public function detail($id)
    {
        $article = Article::find($id);
        return view('articles.detail', [
            "article" => $article,
        ]);
    }

    public function add()
    {
        $categories = [
            ['id' => 1, 'name' => "Tech"],
            ['id' => 2, 'name' => "News"],
            ['id' => 3, 'name' => "Business"],
            ['id' => 4, 'name' => "Travel"],
            ['id' => 5, 'name' => "Food"],
        ];
        return view('articles.add', [
            "categories" => $categories,
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "categoryID" => "required",
        ]);

        if ($validator->fails()) return back()->withErrors($validator);

        $data = [
            "title" => request()->title,
            "body" => request()->body,
            "category_id" => request()->categoryID,
        ];

        Article::create($data);

        return redirect("/articles")->with('info', "New Blog is added");
    }

    public function delete($id)
    {
        Article::find($id)->delete();
        return redirect("/articles")->with("deleted", "Deleted Successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        // return $articles->toJson();
        return response($articles)->withHeaders(['Content-Type' => "application/json"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $project = Article::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        $msg = [
            'success' => true,
            'message' => "article success created",
        ];

        return response($msg)->withHeaders(['Content-Type' => "application/json"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        return response($article)->withHeaders(['Content-Type' => "application/json"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        return response($article)->withHeaders(['Content-Type' => "application/json"]);
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
        //
        $validatedData = $request->validate([
            'title' => "required",
            'content' => "required",
        ]);

        $article = Article::find($id);
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->save();

        $msg = array(
            'success' => true,
            'message' => "Article updated successfully"
        );

        return response($msg)->withHeaders(['Content-Type' => 'application/json']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        if (!empty($article)) {
            $article->delete();
            $msg = array(
                'success' => true,
                "message" => "Article deleted success fullsy",
            );
            return response($msg)->withHeaders(['Content-Type' => 'application/json']);
        } else {
            $msg = [
                'success' => false,
                'message' => "article delete failed",
            ];
            return response($msg)->withHeaders(['Content-Type' => 'application/json']);
        }
    }
}

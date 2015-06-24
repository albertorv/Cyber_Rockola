<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Recuperar todos los articulos
        $articles = Article::latest('published_at')
        ->unpublished()->get();

        return view('articles.index',compact('articles')); //compact hace un arreglo
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {


        Article::create($request->all());
        return redirect('articles');
    }

    public function storeOld(Request $request)
    {

    $rules =
        [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
        ];

        $this->validate($request,$rules);

       /** $article = new $Article();
        $article = $request->request('nombre');

        $article->save();**/

        Article::create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

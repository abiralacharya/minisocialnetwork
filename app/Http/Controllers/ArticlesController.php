<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);

        //$articles=DB::table('articles')->get();

        //$articles = Article ::whereLive(1)->get();
        //$article=DB::table('articles')->whereLive(1)->first();
        //dd($article);

        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        $article->live = $request->live;
        $article->post_on = $request->post_on;

        $article->save();


      //Article::create($request->all());
    //  DB::table('articles')->insert($request->except('_token'));
      /*  Article::create([
          'user_id'=>Auth::user()->id,
          'content'=> $request->content,
          'live'=> $request->live,
          'post_on'=> $request->post_on
        ]);
        */
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.edit',compact('article'));
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

        $article =Article::findOrFail($id);

        if (!isset($request->live))
          $article->update(array_merge($request->all(),['live'=> false]));
        else
          $article ->update($request->all());

          return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $article =Article::findOrFail($id);
         $article->forceDelete();

      //  Article::destroy($id);
          return redirect('/articles');
    }


}

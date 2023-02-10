<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPost::all();
        //return $blogs[0]->title;
        return view('blog.index', ['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = new Categorie;
        $categorie = $categorie->selectCategorie();
        //si methode static donc pas de instanciation de la classe, on ferait $categorie = Categorie::selectCategorie();
        return view('blog.create', ['categories'=>$categorie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::user()->id,
            'categories_id'=>$request->categories_id
        ]);

        return redirect(route('blog.show', $newPost));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        return view('blog.detail', ['blogPost'=>$blogPost, 'test'=>'blabla']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        // fait un changeement dans model pour avoir la function pour avoir les categorie au lieu de la recopier encore une fois
        $categorie = new Categorie;
        $categorie = $categorie->selectCategorie();
        
        return view('blog.edit', ['blogPost'=>$blogPost, 'categories'=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([ //pas de nouvelle instanciation car le post existe deja :: ca ca instantie lol
            'title'=> $request->title,
            'body'=> $request->body
        ]);

        return redirect(route('blog.show', $blogPost->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        
        return redirect(route('blog.index'));
    }

    public function query()
    {//select * from blog_posts;
       //$query = BlogPost::all();

       //meme chose mais plus flexible peux selectionner certaine chose
       //$query = BlogPost::select('title')->get();

       //WHERE
    //    $query = BlogPost::select()
    //    ->where('user_id', 90)
    //    ->get();
        //si on ne met rien il comprend que cest egal a .
        //sinon comme ci dessous
    //     $query = BlogPost::select()
    //    ->where('user_id','>', 90)
    //    ->get();

    //select * from blog_posts where id = ?
    // $query = BlogPost::find(1);

    //deux where equivaut a un and
    // $query = BlogPost::select()
    // ->where('user_id', 81)
    // ->where('id', 1)
    // ->get();

    // OR
    // $query = BlogPost::select()
    // ->where('user_id', 90)
    // ->orWhere('id', 1)
    // ->get();

    //ORDER BY
    // $query = BlogPost::select()
    // ->orderBy('title', 'desc')
    // ->get();

    //INNERJOIN
    // $query = BlogPost::select()
    //  ->join('users', 'users.id', '=', 'user_id')
    //  ->get();

    //RIGHT OUTER JOIN me donne aussi les user qui nont pas ecrit de post
    // $query = BlogPost::select()
    // ->rightjoin('users', 'users.id', '=', 'user_id')
    // ->get();

    //aggregation
    // $query = BlogPost::max('id');
    // $query = BlogPost::select()//combien de post
    // ->count();

    $query = BlogPost::select(DB::raw('count(*) as blogs, user_id'))
    ->groupBy('user_id')
    ->get();

        return $query;
    }

    public function page(){
        $blogPosts = BlogPost::select()
        ->paginate(5);
        
        return view('blog.page',['blogPosts'=>$blogPosts]);
    }
}


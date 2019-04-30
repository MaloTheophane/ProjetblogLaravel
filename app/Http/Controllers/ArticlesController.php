<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment; 
use App\Post;
use App\User;
use App\Http\Requests\CommentRequest ;
use App\Http\Requests\PostRequest ;
use Illuminate\Support\Facades\Auth; 
use App\Policies; 


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        // permet d'avoir accès au CRUD des articles. On y a accès si on est connecté et on est administrateur. 
          if(!is_null(Auth::user()) &&Auth::user()->can('estAdmin', User::class))
      {

        $posts = \App\Post::orderBy('post_date','desc')->get();
    	return view('Articles',array( 
       'posts' => $posts));
   }else{


    return view('Message')->with('Ok'," Désolé , cette partie est réservé seulement au administrateur 
             ");
   }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
     $this->authorize('create',new Post());
       return view ('article/create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    { 
         $post= new Post();  

         $this->authorize('restore', $post);
         $post->post_author= Auth::user()->id; 
         $post->post_content= $request->input('post_content'); 
         $post->post_title= $request->input('post_title'); 
         $post->post_type= $request->input('post_type'); 
         $post->post_name= $request->input('post_name'); 


   
 
        if($request->hasFile('image') && $request->file('image')->isValid())
        {// verification si la requête contient un fichier et qu'il est valide
            $image = $request->file('image'); 
            $chemin = config('images.path'); //configuration dans le fichier config/images créer pour indiquer le chemin du possier des photos qui est public/articleimages
            $extension = $image->getClientOriginalExtension();
            // construction du nom du fichier dans le repertoire
            do {
                $nom = $request->input('post_name').str_random(10) . '.' . $extension;
            } while(file_exists($chemin . '/' . $nom));

            if($image->move($chemin, $nom)) {
                $post->post_image ="/".$chemin . '/' . $nom; 
            }

            }
        

         $post->save(); 

       return view('/posts/single',array( 
       'post' => $post));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
         $post = \App\Post::where('id',$id)->first();
       
         return view('/posts/single',array('post' => $post ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = \App\Post::where('id',$id)->first();
       return view('article/edit',array('post' => $post)); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $Request, $id)
    {
    	
        $post = \App\Post::where('id',$id)->first(); 
      
        $this->authorize('update', $post); //un controle est fait avant l'enregistrement
         
        // Le créateur de l'article ne change pas même si c'est l'admin qui le modifie
         $post->post_content= $Request->input('post_content'); 
         $post->post_title= $Request->input('post_title'); 
         $post->post_type= $Request->input('post_type'); 
         $post->post_name= $Request->input('post_name'); 
         
         


        if($Request->hasFile('image') && $Request->file('image')->isValid())
        {
            $image = $Request->file('image');
            $chemin = config('images.path');
            $extension = $image->getClientOriginalExtension();

            do {
                $nom = $Request->input('post_name').str_random(10) . '.' . $extension;
            } while(file_exists($chemin . '/' . $nom));

            if($image->move($chemin, $nom)) {
                $post->post_image ="/".$chemin . '/' . $nom; 
            }
        }

         $post->save();
        
          return view('/posts/single', array('post' => $post));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    	 $post= new Post(); 
        $post->destroy($id);

		return redirect()->back();
    }
}

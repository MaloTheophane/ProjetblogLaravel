<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment; 
use App\Post;
use App\Http\Requests\CommentRequest ;
use App\Http\Requests\PostRequest ;
use Illuminate\Support\Facades\Auth; 
use App\Policies; 


class PostsController extends Controller
{
    // ce controller gère l'enregistrement des commentaires créer pour chaque article, le renvoie des articles de l'utilisateur connecté 

 public function index()
    {
      // renvoie tout les articles dans la section Articles

        $posts = \App\Post::orderBy('post_date','desc')->get();
      return view('All_articles',array( 
       'posts' => $posts));


    }

 public function shows()
    {
      // montre les articles de l'utilisateur connecté 
      $user=Auth::user(); 
      return view('Mes_Articles',array( 
       'posts' => $user->posts));


    }

function comment(CommentRequest $Request, $id){
  // Gère la création de commentaire par post 
     $post = \App\Post::where('id',$id)->first();
         $comment= new Comment(); 
         $comment->post_id= $id;  
         $comment->comment_name= $Request->input('comment_name'); 
         $comment->comment_email= $Request->input('comment_email'); 
         $comment->comment_content= $Request->input('comment_content'); 
         $comment->save(); 
         
       
         return view('/posts/single',array('post' => $post ));
         
    }

function commentairesDePost($id){
  
       $post = \App\Post::where('id',$id)->first();
         return view('/comment/postcomment',array('post' => $post ));
         
    }



}

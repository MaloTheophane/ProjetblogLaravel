<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment; 
use App\Post;
use App\User;
use App\Http\Requests\CommentRequest ;
use App\Http\Requests\PostRequest ;

class CommentController extends Controller
{

// ce controlleur gère la modificatio, l'autorisation et la suppression d'un commentaire

  public function edit($id)
    {
       $comment = \App\Comment::where('id',$id)->first();

       return view('/comment/edit', array('comment' => $comment));
    }




     public function update(CommentRequest $Request, $id)
    {
          
         $comment = \App\Comment::where('id',$id)->first(); 
         $comment->comment_name= $Request->input('comment_name'); 
         $comment->comment_email= $Request->input('comment_email'); 
         $comment->comment_content= $Request->input('comment_content'); 
         $comment->save(); 
  
      
           return view('/posts/single', array('post' => $comment->post)); 

    }

    public function autoriser($id)
    {
       // autoriser consiste à remplacer le  du style css display avec la valeur none par une chaine vide

       $comment = \App\Comment::where('id',$id)->first();
        $comment->comment_statut="";
         $comment->save(); 

     return redirect()->back();
    }
     


     public function bloquer($id)
    {
       // bloquer consiste à remplacer à mettre dans le style css display:none qui cache le commentaire
       $comment = \App\Comment::where('id',$id)->first();
       $comment->comment_statut="display:none";
         $comment->save(); 
       return redirect()->back();
    }

    
     public function delete($id)
    {
       
    
    	  $comment= new Comment(); 
           $comment->destroy($id);
 
       return redirect()->back();
    }





}

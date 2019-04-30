<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class UsersController extends Controller
{
  // permet d'avoir accès à la section utilisateur. On y a accès si on est connecté et on est administrateur. 
    public function index()
    { 
      if(!is_null(Auth::user()) && Auth::user()->can('estAdmin', User::class))
      {
        $users = \App\User::orderBy('id','desc')->get();
      
       return view('User',array( 
       'users' => $users ));
       }else {

        return view('Message')->with('Ok'," Désolé , cette partie est réservé seulement au administrateur 
             ");
       }


    }
public function faireadministrer($id){
     
     // mettre à jour le rôle de l'utilisateur
         $user = \App\User::where('id',$id)->first();
        $user->role="admin"; 
        $user->save(); 
       
        return redirect()->back();
   


    }
    public function delete($id)
    {

// Pour supprimer un utilisateur on supprime tout ces posts
       $user = \App\User::where('id',$id)->first();
       $posts=\App\Post::where('post_author',$id)->get();
       foreach ($posts as $post ) {
         $post->destroy($post->id); 
       }
        $user->destroy($id);

		return redirect()->back();
         

    }
}

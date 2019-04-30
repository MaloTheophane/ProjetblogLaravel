<?php

namespace App\Http\Controllers;
use App\Contact; 
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest ; 

class ContactsController extends Controller
{
    //
     function create(){
     	$contacts = \App\Contact::all(); 

    	return view('Contact',array('contacts'=>$contacts )); 
    }

     //
     function store(ContactRequest $Request){

     	$user= new Contact; 
     	$user->contact_name= $Request->input('contact_name'); 
     	$user->contact_email= $Request->input('contact_email'); 
        $user->contact_message= $Request->input('contact_message'); 
     	
     	$user->save(); 
       
//
    	return view('Message')->with('Ok',"Vos informations ont été bien enrégistré , vous allez recevoir bientôt un message 
de l'administrateur"); 
    	//return view('Contact'); 
    }

 function affiche($id){
     
 $contact= \App\Contact::where('id',$id)->first();
return view('Contact_unique',array('contact'=>$contact ));
}

}

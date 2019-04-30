@extends('layouts/main')

@section('content')
<?php $i=1;  ?>
@foreach($post->comments as $comment)
<p>........................Commentaire {{$i}} ....................</p>
<ul>  
 <li ><a href="/articles/{{ $post->post_name }}">Auteur  : </a>{{ $comment->comment_name }}</li>
 <li ><a href="/articles/{{ $post->post_name }}">Email   : </a>{{ $comment->comment_email }}</li>
 <li ><a href="/articles/{{ $post->post_name }}">Contenu: </a>{{ $comment->comment_content }}</li>
</ul>
@can('update', $post)
<td> <a href="/comment/edit/{{ $comment->id }}">modifier</a></td>
 @endcan
 @can('delete', $post)
<td><a href="/comment/delete/{{ $comment->id }}">supprimer</a></td>
 @endcan

@can('estAdmin',$post->author)
<td><a href="/comment/autoriser/{{ $comment->id }}">Autoriser</a></td>
<td><a href="/comment/bloquer/{{ $comment->id }}">Bloquer</a></td>
 @endcan
<?php $i= $i+1;  ?>
@endforeach
@endsection

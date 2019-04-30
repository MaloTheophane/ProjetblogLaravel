@extends('layouts/main')
@section('content')
<!-- details du commentaire -->
<div class="row medium-8 large-7 columns">
<div class="blog-post">
<h3>{{ $post->post_title }}<small> {{ $post->post_date }}</small></h3>
<img class="" src="{{ $post->post_image }}">
<p>{{ $post->post_content }}</p>
<div class="callout">
<ul class="menu simple">
<li><a href="#">Author: {{ $post->author->name }}</a></li>
<li><a href="#">Comments: commentaire </a></li>
</ul>
</div>
</div>
</div>

<!-- affichage des commentaires , la variable i est utilisé juste pour compter -->
<?php $i= 1?>
@foreach($post->comments as $comment)
<div style="{{$comment->comment_statut}}">
<p>........................Commentaire {{$i}} ....................</p>
<ul>  
 <li ><a href="/articles/{{ $post->post_name }}">Auteur  : </a>{{ $comment->comment_name }}</li>
 <li ><a href="/articles/{{ $post->post_name }}">Email   : </a>{{ $comment->comment_email }}</li>
 <li ><a href="/articles/{{ $post->post_name }}">Contenu: </a>{{ $comment->comment_content }}</li>
</ul>

<?php if($comment->comment_statut!="dipslay:none"){$i= $i+1;}  ?>
</div>

@endforeach



<!-- formulaire commentaire -->
<form action="/articles/{{$post->id}}/comment" method="POST">

                        {{ csrf_field() }}
                         
                        <div class="form-group">

                         <p>Votre nom </p>
                            <input type="text" id="comment_name" name="comment_name" class="form-control {{ $errors->has('comment_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
                                value="{{ old('comment_name') }}"> {!! $errors->first('comment_name', '
                            <div class="invalid-feedback">:message</div>') !!}

                  
                        <p>Votre email </p>
                            <input type="email" id="comment_email" name="comment_email" class="form-control {{ $errors->has('comment_email') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre Email"
                                value="{{ old('comment_email') }}"> {!! $errors->first('comment_email', '
                            <div class="invalid-feedback">:message</div>') !!}

                        
                         <p>Votre commentaire </p>
                       
                            <input type="text" id="comment_content" name="comment_content" class="form-control {{ $errors->has('comment_content') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre commentaire"
                                value="{{ old('comment_content') }}"> {!! $errors->first('comment_content', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>

                        

                        <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>
@can('gererComment', $post)
<!-- seul l'administrateur peut gerer les commentaire, politique dans articlePolicy -->
<td><a href="/comment/gerer/{{ $post->id }}">Gérer commentaires</a></td>
 @endcan
@endsection

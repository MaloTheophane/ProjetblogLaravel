@extends('layouts/main')

@section('content')

	<form action="/comment/edit/{{$comment->id}}" method="POST">

                        {{ csrf_field() }}
                        
                         
                        <div class="form-group">

                         <p>Votre nom </p>
                            <input type="text" id="comment_name" name="comment_name" class="form-control {{ $errors->has('comment_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
                                value="{{ $comment->comment_name }}"> {!! $errors->first('comment_name', '
                            <div class="invalid-feedback">:message</div>') !!}

                  
                        <p>Votre email </p>
                            <input type="email" id="comment_email" name="comment_email" class="form-control {{ $errors->has('comment_email') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre Email"
                                value="{{ $comment->comment_email }}"> {!! $errors->first('comment_email', '
                            <div class="invalid-feedback">:message</div>') !!}

                        
                         <p>Votre commentaire </p>
                       
                            <input type="text" id="comment_content" name="comment_content" class="form-control {{ $errors->has('comment_content') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre commentaire"
                                value="{{ $comment->comment_content }}"> {!! $errors->first('comment_content', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>

                        

                        <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>
@endsection

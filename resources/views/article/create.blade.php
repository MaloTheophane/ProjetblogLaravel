@extends('layouts/main')

@section('content')

<form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">

     
                        {{ csrf_field() }}
                        <div class="form-group">


                            <input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" name="post_title" id="post_title" placeholder="Titre de l'article"
                                value="{{ old('post_title') }}"> {!! $errors->first('post_title', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>

                            <div class="form-group">
                            <textarea class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}" name="post_content" id="post_content" placeholder="Contenue de l'article">{{ old('post_content') }}</textarea>                            {!! $errors->first('post_content', '
                            <div class="invalid-feedback">:message</div>') !!}


                    
                            <input type="text" class="form-control {{ $errors->has('post_name') ? 'is-invalid' : '' }}" name="post_name" id="post_name" placeholder="Nom de l'article"
                                value="{{ old('post_name') }}"> {!! $errors->first('post_name', '
                            <div class="invalid-feedback">:message</div>') !!}
                            

            
                            <input type="text" class="form-control {{ $errors->has('post_type') ? 'is-invalid' : '' }}" name="post_type" id="post_type" placeholder="Type de post"
                                value="{{ old('post_type') }}"> {!! $errors->first('post_type', '
                            <div class="invalid-feedback">:message</div>') !!}

                          <div > Une image pour votre article
                             <input style="border: 1px #77b5fe solid;  color:#77b5fe; "type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="image" placeholder="choissisez une image"
                                value="{{ old('image') }}">
                         {!! $errors->first('image', '
                            <div class="invalid-feedback">:message</div>') !!}
                        </div>

                      </div>
                        
                  </br>
                  

                        <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>

@endsection

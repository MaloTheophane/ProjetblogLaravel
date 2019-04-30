@extends('layouts/main')

@section('content')

<?php $visible ="";  ?>
@foreach ( $posts as $post )
  <div class="row medium-8 large-7 columns">
<div class="blog-post">
  <a href="/articles/{{ $post->id }}">{{ $post->post_title }}</a>
  <div style=<?php echo $visible ?>><img  src="{{ $post->post_image }}"></div>
  <div>{{$post->post_content}}</div>
</div>
</div>
<?php $visible="display:none" ?>

@endforeach

@endsection

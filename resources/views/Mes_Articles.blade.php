@extends('layouts/main')

@section('content')

  <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Titre Article</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>

         <!--  je bouble sur les posts et je les affiches en vérifiant les droits définis dans ArticlesPolicy--> 
          <?php $i=0 ; ?>
@foreach ( $posts as $post )
<tr>

  <td><?php echo ++$i; ?></td>
 
  <td><a href="/articles/{{ $post->id }}">{{ $post->post_title }}</a></td>

 @can('view', $post)
  <!-- Tout le monde peut voir ce Post -->
   <form method="get" action="{{ route('articles.show',$post->id) }}"><td> 
  <input type="submit" name="bouton" value="Voir" /></a></td></form>
 @endcan


  
@can('update', $post)
 <!-- L'itulisateur courant peut modifier ce Post -->
     <form method="get" action="{{ route('articles.edit',$post->id) }}"><td>
      <input type="submit" value="Modifiez" /></td></form>

 @endcan

@can('delete', $post)
<!-- L'itulisateur courant peut supprimer ce Post -->
     <form method="POST" action="{{ route('articles.destroy',$post->id) }}">
      {{ csrf_field() }}
         {{ method_field('DELETE') }}
      <td>
       <input type="submit" value="Supprimer" /></td>

  </form>
@endcan 
</tr>
@endforeach
</tbody>
</table>


<?php if($i==0){

  echo "<h2 style=\"text-align: center\"> vous n'avez pas encore crée d'article </h2>"; 
 } 
  ?>
<form method="get" action="{{ route('articles.create') }}">
    <p style="text-align: center ;"> <input type="submit" value="Ajoutez un article" /> <P>
</form>

@endsection

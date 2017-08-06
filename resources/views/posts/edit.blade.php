

@extends("layouts.app")
@section("content")
<div class="container">
  <h2>New Post</h2>
  
  <form action="{{route('post.update', $post->id)}}" method="post">
    <div class="form-group">
                            {{ csrf_field() }}

      <label for="comment">Title:</label>
      <input class="form-control input-sm" id="title" type="text" name="title" value="{{$post->title}}">
      <input type="hidden" name="post_id" value="{{$post->id}}">
      {{ method_field('patch') }}


            

      <label for="textarea">Text box:</label>
      <textarea class="form-control" rows="20" id="text" name="text" >

      {{$post->text}}
      </textarea>
      <br>
          <input class="btn btn-primary"  type="submit" value="Update">


    </div>
  </form>

<form action="{{route('post.destroy', $post->id)}}" method="post">

 {{ csrf_field() }}

       <input type="hidden" name="post_id" value="{{$post->id}}">
      {{ method_field('delete') }}

            <input class="btn btn-primary"  type="submit" value="Delete">


</form>
</div>
@endsection
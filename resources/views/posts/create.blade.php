
@extends("layouts.app")
@section("content")
<div class="container">
 <h2>New Post</h2>
	 <form action="/posts" method="post">
	   <div class="form-group" >
	  {{csrf_field()}}

	 <label for="comment">Title:</label>
	 <input class="form-control input-sm" id="title" type="Text" name="title">
	 <br>
	 <label for="textarea">Text Box:</label>
	 <textarea class="form-control"  rows="20" id="text" name="text"></textarea>
	 <br>
	<!-- checkbox -->
       <form>
    
   
   @foreach ($tags as $tag)
		<div class="checkbox">
      	<label><input type="checkbox" value="{{$tag->id}}" name="tags[]"> 
      	{{$tag->content}}
      	
     	 </label>

   	    </div>
   @endforeach
  </form>
	<!-- checkbox -->
	 <br>
	 <br>
	 <input class="btn btn-primary" type="submit" name="Publish">
	   </div>
	</form>
</div>
@endsection
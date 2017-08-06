@extends("layouts.app")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			@foreach ($posts as $post)
			<h3><a href="{{route('posts.show', $post ->id)}}">{{$post->title, $post->created_at}}</a></h3>
			<hr>
			@endforeach
		

			</div>
		
		</div>
	</div>

</div>
@endsection
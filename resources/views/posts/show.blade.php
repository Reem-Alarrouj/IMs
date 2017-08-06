
@extends("layouts.app")
@section("content")
<div class="container">
  
                

            <h1 class="lead">  {{ $post->title }} </h1>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                <hr> 
                  
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <h2 class="lead">  {{ $post->text }} </h2>
                @foreach ($tags as $tag)
                   {{ $tag->content }}
                @endforeach
                <h4 class="lead"> by {{$post->user->name}} </h4>
                
                <hr>
   
                <p> <span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at}} </p>

                <hr>

                <div class="well">
                    <h4>Leave a Comment:</h4>

                    <form action="{{ route('comments.store')}}" method="post">

                        <div class="form-group">
                        {{ csrf_field() }}
                            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                              <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                        </div>
                        <button type="submit" id="add-comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>


                             
                <div class="media">
                    
                    <div id="comments" class="media-body">
                            
                      @foreach ($post->comments as $comment)
                                <div>
                                    
                                  <h3> {{ $comment->content }} <h6> by {{$comment->user->name}} </h6></h3>
                                  <h6>at {{ $comment->created_at}}</h6>
                                  <hr>
                                </div>
                             @endforeach

                    </div>
                </div>



  

</div>
@endsection

@section('after-script')

<script>
    $(document).ready(function(){
        
        console.log('i was in');

        $("#add-comment").on('click',function (e) {

            console.log('i was clicked');
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
               })

               e.preventDefault(); 

               var formData = {
                   _token: $('[name="_token"]').val(),
                   content: $('#content').val(),
                   post_id: $('#post_id').val(),
               }

               var type = "POST"; 
               var my_url = '{{ route('comments.store')}}';

               $.ajax({

                   type: type,
                   url: my_url,
                   data: formData,
                   dataType: 'json',

                   success: function (data) {
                    var singleComment = '<div><h3>'+ data.content +'<h6> by '+ data.user_id  +' </h6></h3>';
                        singleComment += '<h6>at' +  data.created_at + '</h6>';
                        singleComment += '</div><hr>';
                    $('#comments').after(singleComment).show('slow');
                       console.log(singleComment);
                   },
                   error: function (data) {
                       console.log('Error:', data);
                   }
               });

           });

        });


</script>
@endsection
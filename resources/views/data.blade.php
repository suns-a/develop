@foreach ($new_posts as $new_post)
    <div class="card" style="margin-bottom:20px;">
        <div class="card-header">
            <h3><a href="#">{{$new_post->title}}</a></h3>
        </div>
   
        <div class="card-body">
            <p>{{$new_post->body}}</p>
            <div class="text-center">
                <button type="button" class="btn btn-success">Read More</button>
            </div>
        </div>
    </div>

@endforeach
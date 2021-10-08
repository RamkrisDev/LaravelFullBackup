@foreach ($posts as $post)
    <div class="card" style="margin-bottom: 20px">
        <div class="card-header">
            <h3>
                <a href="#">{{$post->title}}</a>
            </h3>
        </div>
        <div class="card-body">
            <p>{{$post->body}}</p>
            <div class="text">
                <button type="button" class="btn btn-success">ReadMore</button>
            </div>
        </div>
    </div>
@endforeach
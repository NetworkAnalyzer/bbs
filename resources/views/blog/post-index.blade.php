@extends('blog.default')

@section('h1')
  Thread Name
@endsection

@section('subheading')
    Thread Status
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">
                                {{ $post->user->name }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->content }}
                            </h3>
                        </a>
                        <div>
                            @foreach($post->tags as $tag)
                                {{ link_to('/tag/'.$tag->id,$tag->name,['tag' => $tag,'class' => 'label label-default']) }}
                            @endforeach
                        </div>
                        <p class="post-meta">Posted on {{ $post->created_at }}</p>
                    </div>
                    <hr>
                @endforeach

            <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <hr>

@endsection

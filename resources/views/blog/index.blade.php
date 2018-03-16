@extends('blog.default')

@section('h1')
  Thread List
@endsection

@section('subheading')
  A Blog Theme by Start Bootstrap
@endsection

@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($threads as $thread)
          <div class="post-preview">
            <a href="post.html">
              <h2 class="post-title">
                {{ $thread->name }}
              </h2>
              <h3 class="post-subtitle">
                Thread Description
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Username</a>
              on {{ $thread->created_at }}</p>
          </div>
          <hr>
      @endforeach

      <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          {{ $threads->links() }}
        </div>
      </div>
    </div>
  </div>

  <hr>
@endsection

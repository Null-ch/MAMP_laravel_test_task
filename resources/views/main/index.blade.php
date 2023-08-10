@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Статьи</h1>
            @if (isset($posts))
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ url('storage/') . "/" . $post->preview_image }}" alt="preview_image">
                                </div>
                                <p class="blog-post-category">{{ $post->category }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="mx-auto" style="margin-top: -100px">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </section>
            @endif
        </div>
        </div>
    </main>
@endsection

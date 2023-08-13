@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container justify-content-center">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Пост создан
                {{ date('Y-m-d', strtotime($post->created_at)) }} в {{ date('H:i:s', strtotime($post->created_at)) }}
            </p>

            <section class="post-content">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-4 mb-3" data-aos="fade-up">
                        <img src="{{ url('storage/' . $post->preview_image) }}" alt="blog post" class="img-fluid">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection

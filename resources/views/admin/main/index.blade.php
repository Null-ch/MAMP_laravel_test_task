@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Панель администратора</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Карточка Пользователей -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Пользователи</p>
                                <h3>{{ $users->count() }}</h3>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">Перейти к пользователям<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    <!-- Карточка Постов -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Статьи</p>
                                <h3>{{ $posts->count() }}</h3>
                            </div>
                            <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Перейти к статьям<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                    {{-- Карточка категорий --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner" style="text-align: center">
                                <p>Категории</p>
                                <h3>{{ $category->count() }}</h3>
                            </div>
                            {{-- <div class="icon">
                                <i class="fa-thin fa-list"></i>
                            </div> --}}
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">Перейти к категориям<i
                                    class="fas fa-arrow-circle-right" style="margin-left: 5px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

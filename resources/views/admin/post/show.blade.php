@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h3 class="m-0 mr-2">{{ $post->title }}</h3>
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-15">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Заголовок</th>
                                            <th>Слаг</th>
                                            <th>Содержание</th>
                                            <th>Категория</th>
                                            <th>Изображение</th>
                                            <th>Дата создания</th>
                                            <th>Дата изменения</th>
                                            <th>Активность</th>
                                            <th colspan="2" class="text-center">Действие</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td><img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image"
                                                    height="real_height" width="real_width"
                                                    onload="resizeImg(this, 60, 100);"></td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at }}</td>
                                            <td>
                                                <div class="md-form">
                                                    <div class="material-switch">
                                                        <input id="switch-primary-{{ $post->id }}"
                                                            value="{{ $post->id }}" name="toggle" type="checkbox"
                                                            {{ $post->isActive === 1 ? 'checked' : '' }}>
                                                        <label for="switch-primary-{{ $post->id }}"
                                                            class="btn-success"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}"
                                                    class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            var productObj = {};
            productObj.mode = $(this).prop('checked');
            productObj.postId = $(this).val();
            productObj._token = '{{ csrf_token() }}';
            console.log(productObj)
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ url('admin/posts/activity') }}",
                data: productObj,
                success: function() {
                    location.reload();
                }
            });
        });
    </script>
    <script type="text/javascript">
        function resizeImg(img, height, width) {
            img.height = height;
            img.width = width;
        }
    </script>
    <style type="text/css">
        .sorticon {
            visibility: hidden;
            color: darkgray;
        }

        .sort:hover .sorticon {
            visibility: visible;
        }

        .sort:hover {
            cursor: pointer;
        }

        .material-switch>input[type="checkbox"] {
            display: none;
        }

        .material-switch>input[type="checkbox"] {
            display: none;
        }

        .material-switch>label {
            cursor: pointer;
            height: 0px;
            position: relative;
            top: 2px;
            width: 40px;
        }

        .material-switch>label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position: absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }

        .material-switch>label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }

        .material-switch>input[type="checkbox"]:checked+label::before {
            background: inherit;
            opacity: 0.5;
        }

        .material-switch>input[type="checkbox"]:checked+label::after {
            background: inherit;
            left: 20px;
        }
    </style>
@endsection

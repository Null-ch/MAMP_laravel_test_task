@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
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
                <div class="row">
                    <div class="col-12">
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
                                        </tr>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            {{-- Данный способ позволяет реализовать вставку  и отображение изображений в тело статьи, но в ущерб безопасности. Такой вариант нельзя применять на рабочих проектах --}}
                                            <td style="width: 150px">{!! $post->content !!}</td>
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
@endsection

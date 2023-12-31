@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ml-2">
                    <div>
                        <h3>Статьи</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mb-3 mt-3 ml-2">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary mb 3">Добавить </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="row" id="row">
                <div class="col-11 p-2 ml-4">
                    <div class="card">
                        <div class="card-body table-responsive p-3">
                            <table id="table" class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Заголовок</th>
                                        <th>Слаг</th>
                                        <th>Содержание статьи</th>
                                        <th>Категория</th>
                                        <th>Превью</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Активность</th>
                                        <th>Просмотр</th>
                                        <th>Редактировать</th>
                                    </tr>
                                </thead>
                                <tbody id="tablecontents">
                                    @foreach ($posts as $post)
                                        <tr class="row1" data-id="{{ $post->id }}">
                                            <td class="pl-3">{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            {{-- Данный способ позволяет реализовать вставку  и отображение изображений в тело статьи, но в ущерб безопасности. Такой вариант нельзя применять на рабочих проектах --}}
                                            <td>{!! Str::limit($post->content, 20) !!}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td class="col-2"><img id="yourImgId"
                                                    src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image"
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function resizeImg(img, height, width) {
            img.height = height;
            img.width = width;
        }
    </script>
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
        $(function() {
            $("#table").DataTable({
                "columnDefs": [{
                    "targets": [8, 9, 10],
                    "orderable": false
                }],
                "order": [
                    [0, 'asc']
                ],
                "paging": true,
                "searching": true,
                "info": true
            });

            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = '{{ csrf_token() }}';
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                console.log(order);
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: "{{ url('admin/posts/updateOrder') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });
    </script>
@endsection

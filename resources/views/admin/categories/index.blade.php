@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 ml-2">
                    <div>
                        <h3>Категории</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mb-3 mt-3 ml-2">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary mb 3">Добавить </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div>
                <div class="row">
                    <div class="col-11 ml-3">
                        <div class="card">
                            <div class="card-body table-responsive p-3">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Дата создания</th>
                                            <th>Дата изменения</th>
                                            <th>Активность</th>
                                            <th>Просмотр</th>
                                            <th>Редактировать</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablecontents">
                                        @foreach ($categories as $category)
                                            <tr class="row1" data-id="{{ $category->id }}">
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td>
                                                    <div class="md-form">
                                                        <div class="material-switch">
                                                            <input id="switch-primary-{{ $category->id }}"
                                                                value="{{ $category->id }}" name="toggle" type="checkbox"
                                                                {{ $category->isActive === 1 ? 'checked' : '' }}>
                                                            <label for="switch-primary-{{ $category->id }}"
                                                                class="btn-success"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.category.show', $category->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.category.edit', $category->id) }}"
                                                        class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            </tr>
                                        @endforeach
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
            productObj.categoryId = $(this).val();
            productObj._token = '{{ csrf_token() }}';
            console.log(productObj)
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ url('admin/categories/activity') }}",
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
    <script type="text/javascript">
        $(function() {
            $("#table").DataTable({
                "columnDefs": [{
                    "targets": [4, 5, 6],
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
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('updateOrder') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection

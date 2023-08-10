@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Пользователи</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mb-3 mt-3">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary mb 3">Добавить </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div>
                <div class="row">
                    <div class="col-15">
                        <div class="card">
                            <div class="card-body p-3">
                                <table id="table" class="table-responsive fixed-table-body table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя</th>
                                            <th>Email</th>
                                            <th>Роль</th>
                                            <th>Дата создания</th>
                                            <th>Дата изменения</th>
                                            <th>Активность</th>
                                            <th>Просмотр</th>
                                            <th>Редактировать</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablecontents">
                                        @foreach ($users as $user)
                                            <tr class="row1" data-id="{{ $user->id }}">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role == 0 ? 'Администратор' : 'Пользователь' }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>
                                                    <div class="md-form">
                                                        <div class="material-switch">
                                                            <input id="switch-primary-{{ $user->id }}" value="{{ $user->id }}"
                                                                name="toggle" type="checkbox"
                                                                {{ $user->isActive === 1 ? 'checked' : '' }}>
                                                            <label for="switch-primary-{{ $user->id }}"
                                                                class="btn-success"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><a href="{{ route('admin.user.show', $user->id) }}"><i
                                                            class="far fa-eye"></i></a></td>
                                                <td class="text-center"><a href="{{ route('admin.user.edit', $user->id) }}"
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
            productObj.user_id = $(this).val();
            productObj._token = '{{ csrf_token() }}';
            console.log(productObj)
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "{{ url('admin/users/activity') }}",
                data: productObj,
                success: function() {
                    location.reload();
                }
            });
        });
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
        function resizeImg(img, height, width) {
            img.height = height;
            img.width = width;
        }
    </script>
    <script type="text/javascript">
        $(function() {
            $("#table").DataTable();

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

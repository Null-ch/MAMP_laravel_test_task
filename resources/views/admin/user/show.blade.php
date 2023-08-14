@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h3 class="m-0 mr-2">{{ $user->name }}</h3>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя</th>
                                            <th>Почта</th>
                                            <th>Роль</th>
                                            <th>Дата создания</th>
                                            <th>Дата обновления</th>
                                            <th>Активность</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role == 0 ? 'Администратор' : 'Пользователь' }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <div class="md-form">
                                                    <div class="material-switch">
                                                        <input id="switch-primary-{{ $user->id }}"
                                                            value="{{ $user->id }}" name="toggle" type="checkbox"
                                                            {{ $user->isActive === 1 ? 'checked' : '' }}>
                                                        <label for="switch-primary-{{ $user->id }}"
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
@endsection

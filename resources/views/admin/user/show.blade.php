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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
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
                                                    <input id="switch-primary-{{ $user->id }}" value="{{ $user->id }}" name="toggle"
                                                        type="checkbox" {{ $user->isActive === 1 ? 'checked' : '' }}>
                                                    <label for="switch-primary-{{ $user->id }}" class="btn-success"></label>
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

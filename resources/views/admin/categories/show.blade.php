@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h3 class="m-0 mr-2">{{ $category->title }}</h3>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1 mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th> id </th>
                                            <th> Название </th>
                                            <th> Дата создания </th>
                                            <th> Дата изменения </th>
                                            <th> Активность</th>
                                            <th colspan="2" class="text-center"> Действие </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                                    </tbody>
                                </table>
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
            });
        });
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

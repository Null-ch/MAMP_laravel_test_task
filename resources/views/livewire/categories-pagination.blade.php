<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="sort" wire:click="sortOrder('id')"> id {!! $sortLink !!}</th>
                                <th class="sort" wire:click="sortOrder('title')"> Название {!! $sortLink !!}</th>
                                <th class="sort" wire:click="sortOrder('created_at')"> Дата создания
                                    {!! $sortLink !!}
                                <th class="sort" wire:click="sortOrder('updated_at')"> Дата изменения
                                    {!! $sortLink !!}
                                <th class="sort" wire:click="sortOrder('isActive')"> Активность
                                    {!! $sortLink !!}
                                </th>
                                <th colspan="2" class="text-center">Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count())
                                @foreach ($categories as $category)
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
                                @endforeach
                            @else
                                <tr>
                                    <td>No record found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
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

@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Статьи</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mb-3 mt-3">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary mb 3">Добавить </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div>
                @livewire('posts-pagination')
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

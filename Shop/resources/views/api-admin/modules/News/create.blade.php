@extends('api-admin.master')
@section('title','Thêm tin tức')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm bài tin</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.news.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tiêu đề <span class="text-danger">(*)</label>
                    <input type="text" name="title" class="form-control"   placeholder="Tiêu đề...">
                    @if ($errors->has('title'))
                        <div class="text-danger">
                            {{$errors->first('title')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" name="content" rows="3" placeholder="Nội dung..."></textarea>
                    <script>
                        CKEDITOR.replace( 'content' );
                    </script>
                </div>
                <div class="form-group">
                    <label>Ảnh <span class="text-danger">(*)</label>
                    <input type="file" class="form-control-file"   name="image">
                    @if ($errors->has('image'))
                        <div class="text-danger">
                            {{$errors->first('image')}}
                        </div>
                    @endif
                </div>
                
                <hr>
                <a href="{{route('admin.news.index')}}" class="btn btn-warning">Quay Lại</a>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
</div>

@endsection
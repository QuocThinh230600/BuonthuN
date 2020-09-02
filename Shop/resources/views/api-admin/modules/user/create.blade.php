@extends('api-admin.master')
@section('title','Thêm User')
@section('content')
<!-- Default box -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm User</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên<span class="text-danger">(*)</label>
                <input type="text" name="name" class="form-control" placeholder="Tên...">
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">(*)</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                <div class="text-danger">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Mật khẩu <span class="text-danger">(*)</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                @if ($errors->has('password'))
                        <div class="text-danger">
                            {{$errors->first('password')}}
                        </div>
                @endif
            </div>

            <div class="form-group">
                <label>Số điện thoại<span class="text-danger">(*)</label>
                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                @if ($errors->has('phone'))
                        <div class="text-danger">
                            {{$errors->first('phone')}}
                        </div>
                @endif
            </div>

            <div class="form-group">
                <label>Địa chỉ<span class="text-danger">(*)</label>
                <select name="provinces">
                    <option value="">Chọn Tỉnh, Thành</option>
                    @foreach ($provinces as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
                <select name="districts">
                    <option value="">Chọn Quận, Huyện</option>
                </select>
                <select name="wards">
                    <option value="">Chọn Phường, Xã</option>
                </select>
                <input type="text" class="form-control" name="address" placeholder="Nhập Địa Chỉ">

                <script src="{{asset('jquery-3.5.1.min.js')}}"></script>
            <script src="{{asset('datatables.min.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $("select [name='provinces']").change(function(){
                        var provinces_id = $(this).val();

                        $.ajax({
                            url:'{{route('admin.user.loadprovinces')}}',
                            method:'POST',
                            data: {provinces: provinces_id},
                            dataType:'html',
                            success: function(result){
                                alert(result);
                            }
                        })
                    });
                });
            </script>
            </div>



            <div class="form-group">
                @foreach($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="roles[]" value="{{$role->id}}">
                    <label class="form-check-label" for="gridCheck1">{{ $role->display_name }}</label>
                </div>
                @endforeach
            </div>
            <hr>
            <a href="{{route('admin.user.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>


@endsection




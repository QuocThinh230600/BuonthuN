@extends('api-admin.master')
@section('title','Thêm Lô Hàng Mới')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm Lô Hàng</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.shipment.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label>Chọn nhà cung cấp<span class="text-danger">(*)</label>
                    <select name="supplier_id" class="form-control">
                        <option >----Chọn Nhà Cung Cấp----</option>
                            @foreach ($supplier as $sup)
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('total'))
                        <div class="text-danger">
                            {{$errors->first('total')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tổng Cộng<span class="text-danger">(*)</label>
                    <input type="text" name="total" class="form-control"   placeholder="Nhập tổng lô hàng">
                    @if ($errors->has('total'))
                        <div class="text-danger">
                            {{$errors->first('total')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Số Lượng<span class="text-danger">(*)</label>
                    <input type="text" name="quantity" class="form-control"   placeholder="Nhập số lượng">
                    @if ($errors->has('quantity'))
                        <div class="text-danger">
                            {{$errors->first('quantity')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Ghi Chú</label>
                    <textarea class="form-control" name="note" rows="3" placeholder="Mô tả"></textarea>
                    <script>
                        CKEDITOR.replace( 'note' );
                    </script>
                </div>
                <hr>
                <a href="{{route('admin.shipment.index')}}" class="btn btn-warning">Quay Lại</a>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
</div>

@endsection

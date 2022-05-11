@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="row">
        
        <div class="col-md-6">
      <div class="form-group" >
        <label>Tiêu đề</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group" >
        <label>Đường dẫn</label>
        <input type="text" class="form-control" name="url" value="{{ old('url') }}">
      </div>
    </div>
    </div>



  <div class="form-group">
    <label for="menu">Ảnh Sản Phẩm</label>
    <input type="file"  class="form-control" id="upload">
    <div id="image_show">

    </div>
    <input type="hidden" name="thumb"  id="thumb">
  </div>

    <div class="form-group">
        <label for="menu">Sắp xếp</label>
        <input type="number" name="sort_by" value="{{ old('sort_by') }}"  class="form-control" >
    </div>

      <div class="form-group">
          <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="active" value="0" name="active" checked="">
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="no_active" value="1" name="active" >
          <label for="no_active" class="custom-control-label">Không</label>
        </div>

    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm slider</button>
    </div>
    @csrf
  </form>
@endsection

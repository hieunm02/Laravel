@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div>
      <div class="form-group" >
        <label>Tiêu đề</label>
        <input type="text" class="form-control" name="name" value="{{ $slider->name }}" placeholder="Nhập tên sản phẩm">
      </div>


  <div class="form-group">
    <label>Đường dẫn</label>
    <textarea name="url" class="form-control">{{ $slider->url }}</textarea>
  </div>

  <div class="form-group">
    <label for="menu">Ảnh Slide</label>
    <input type="file"  class="form-control" id="upload">
    <div id="image_show">
      <a href="{{ $slider->thumb }}" target="_blank">
        <img src="{{ $slider->thumb }}" width="100px" alt="">
      </a>
    </div>
    <input type="hidden" name="thumb" value=" {{ $slider->thumb }}" id="thumb">
  </div>

      <div class="form-group">
          <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="active" value="0" name="active" 
          {{ $slider->active == 0 ? 'checked="" ' : '' }}>
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="no_active" value="1" name="active" 
          {{ $slider->active == 1 ? 'checked="" ' : '' }}>
          <label for="no_active" class="custom-control-label">Không</label>
        </div>

    </div>
    </div>
    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập nhật slider</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
<script>

    CKEDITOR.replace( 'content' );
</script>
@endsection
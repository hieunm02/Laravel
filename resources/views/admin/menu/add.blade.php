@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
      </div>

      <div class="form-group">
        <label>Danh mục</label>
        <select name="parent_id" name="parent_cate" class="form-control" id="">
            <option value="0">Danh mục cha</option>
        </select>
      </div>

      <div class="form-group">
        <label>Mô tả</label>
        <textarea  class="form-control" name="description"></textarea>
      </div>
      
      <div class="form-group">
        <label>Mô tả chi tiết</label>
        <textarea  class="form-control" id="content" name="content"></textarea>
      </div>

      <div class="form-group">
          <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="active" name="active" checked="">
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="no_active" name="active" >
          <label for="no_active" class="custom-control-label">Không</label>
        </div>

    </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
<script>

    CKEDITOR.replace( 'content' );
</script>
@endsection
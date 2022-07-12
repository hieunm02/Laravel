@extends('main')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810460527!2d105.74459305068878!3d21.038127785924544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1657526429530!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <hr>
    <div class="form-contact mb-5">
        
    @include('alert')

        <form action="" method="post">
            <div class="row">
            <div class="mb-3 col-md-6">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Xin mời nhập email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
              <label for="phone" class="form-label">Số điện thoại</label>
              <input type="number" class="form-control" name="phone" placeholder="Xin mời nhập số điện thoại">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control" name="address" placeholder="Xin mời nhập địa chỉ">
            </div>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Nội dung</label>
          <textarea class="form-control" name="content"></textarea>
        </div>
        @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>


@endsection
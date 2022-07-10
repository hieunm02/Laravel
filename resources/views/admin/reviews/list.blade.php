@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tên người dùng</th>    
                <th>Mã sản phẩm</th>    
                <th>Nội dung</th>    
                <th>Thời gian</th>    
                <th>Thao tác</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($reviews as $key => $review)
                
            <tr>
                <td>{{ $review->id }}</td>    
                <td>{{ $review->user_name }}</td>    
                <td>{{ $review->product_id }}</td>    
                <td>{{ $review->content }}</td>    
                <td>{{ $review->created_at }}</td>    
                
                @if ($review->active == 0)
                    
                <td>
                    <form action="{{ route('lock-review') }}" method="POST">
                        <input type="hidden" name="active" value="1">
                        <input type="hidden" name="review_id" value="{{ $review->id }}">

                        @csrf
                        <a onclick="return confirm('Bạn có chắc muốn khóa bình luận này?')">
                        <button class="btn btn-primary btn-sm"><i class="fas fa-unlock"></i></button>
                        </a>
                    </form>
                </td>

                @else

                <td>
                    <form action="{{ route('unlock-review') }}" method="POST">
                        <input type="hidden" name="active" value="0">
                        <input type="hidden" name="review_id" value="{{ $review->id }}">

                        @csrf
                        <a onclick="return confirm('Bạn có chắc muốn mở khóa bình luận này?')">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-lock"></i></button>
                        </a>
                    </form>
                </td>
                @endif

                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $reviews->links() !!}

@endsection
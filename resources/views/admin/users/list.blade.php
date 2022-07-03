@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tên người dùng</th>    
                <th>Email</th>    
                <th>Loại tài khoản</th>    
                {{-- <th>Active</th>     --}}
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($users as $key => $user)
                
            <tr>
                <td>{{ $user->id }}</td>    
                <td>{{ $user->name }}</td>    
                <td>{{ $user->email }}</td>    
                <td>{{ $user->auth_type }}</td>    
                {{-- <td>{!! \App\Helpers\Helper::active( $user->active ) !!}</td>     --}}
                
                @if ($user->active == 0)
                    
                <td>
                    <form action="{{ route('lock-account') }}" method="POST">
                        <input type="hidden" name="active" value="1">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        @csrf
                        <a onclick="return confirm('Bạn có chắc muốn khóa tài khoản này?')">
                        <button class="btn btn-primary btn-sm"><i class="fas fa-unlock"></i></button>
                        </a>
                    </form>
                </td>

                @else

                <td>
                    <form action="{{ route('unlock-account') }}" method="POST">
                        <input type="hidden" name="active" value="0">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        @csrf
                        <a onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này?')">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-lock"></i></button>
                        </a>
                    </form>
                </td>
                @endif

                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $users->links() !!}

@endsection
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Email</th>    
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>    
                <th>Nội dung</th>    
                <th>Thời gian</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($contacts as $key => $contact)
                
            <tr>
                <td>{{ $contact->id }}</td>    
                <td>{{ $contact->email }}</td>    
                <td>{{ $contact->phone }}</td>    
                <td>{{ $contact->address }}</td>    
                <td>{{ $contact->content }}</td>    
                <td>{{ $contact->created_at }}</td>    
                
                {{-- @if ($contact->active == 0)
                    
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
                @endif --}}

                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $contacts->links() !!}

@endsection
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tên khách hàng</th>    
                <th>Số điện thoại</th>    
                <th>Email</th>    
                <th>Ngày đặt hàng</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($customers as $key => $customer)
                
            <tr>
                <td>{{ $customer->id }}</td>    
                <td>{{ $customer->name }}</td>    
                <td>{{ $customer->phone }}</td>    
                <td>{{ $customer->email }}</td>    
                <td>{{ $customer->created_at }}</td>    
            
                <td>
                    <a href="/admin/customers/view/{{ $customer->id }}" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')"><i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $customers->links() !!}

@endsection
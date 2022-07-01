@extends('admin.main')

@section('content')

@if (count($customers) != 0)
    
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tên khách hàng</th>    
                <th>Số điện thoại</th>    
                <th>Email</th>    
                <th>Ngày đặt hàng</th> 
                <th>Trạng thái</th>   
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
                <td><strong>
                    @if ($customer->status == 0)
                            {!! "<p style='text-transform: uppercase; color: blue'>Chờ xác nhận</p>" !!}
                        @elseif ($customer->status == 1)
                            {!! "<p style='text-transform: uppercase; color: rgb(21, 209, 212)'>Chờ lấy hàng</p>" !!}
                        @elseif ($customer->status == 2)
                            {!! "<p style='text-transform: uppercase; color: rgb(239, 239, 10)'>Đang giao</p>" !!}
                        @elseif ($customer->status == 3)
                            {!! "<p style='text-transform: uppercase; color: rgb(10, 227, 24)'>Đã giao</p>" !!}
                        @elseif ($customer->status == 4)
                            {!! "<p style='text-transform: uppercase; color: rgb(212, 37, 6)'>Đã hủy</p>" !!}
                    @endif   
                    </strong>
                </td>  
            
                <td>
                    <a href="/admin/customers/view/{{ $customer->id }}" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')"><i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
          
                @endforeach

            </tbody>
    </table>
    
@else
<div class="text-center p-b-80">
    <img src="template/images/gio-hang-trong.jpg" alt="">
    <h2>Đơn hàng trống !</h2>
</div>
@endif


    {!! $customers->links() !!}

@endsection
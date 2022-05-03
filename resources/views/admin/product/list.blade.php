@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tên sản phẩm</th>    
                <th>Danh mục</th>    
                <th>Giá gốc</th>    
                <th>Giá khuyến mãi</th>    
                <th>Active</th>    
                <th>Update</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($products as $key => $product)
                
            <tr>
                <td>{{ $product->id }}</td>    
                <td>{{ $product->name }}</td>    
                <td>{{ $product->menu->name }}</td>    
                <td>{{ $product->price }}</td>    
                <td>{{ $product->price_sale }}</td>    
                <td>{!! \App\Helpers\Helper::active( $product->active ) !!}</td>    
                <td>{{ $product->updated_at }}</td>    
                
            
                <td>
                    <a href="/admin/products/edit/{{ $product->id }}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow({{ $product->id }}, '/admin/products/destroy')"><i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $products->links() !!}

@endsection
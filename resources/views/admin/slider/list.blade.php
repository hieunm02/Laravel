@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Tiêu đề</th>    
                <th>Đường dẫn</th>    
                <th>Ảnh</th>    
                <th>Trạng thái </th>    
                <th>Cập nhật</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            @foreach ($sliders as $key => $slider)
                
            <tr>
                <td>{{ $slider->id }}</td>    
                <td>{{ $slider->name }}</td>    
                <td>
                    <a href="{{ $slider->url }}">
                        {{ $slider->url }}
                    </a>
                </td>    
                <td>
                   <a href="{{ $slider->thumb }}"> 
                        <img src="{{ $slider->thumb }}" width="100px" alt=""> 
                    </a>
                </td>    
                <td>{!! \App\Helpers\Helper::active( $slider->active ) !!}</td>    
                <td>{{ $slider->updated_at }}</td>    
                
            
                <td>
                    <a href="/admin/slider/edit/{{ $slider->id }}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow({{ $slider->id }}, '/admin/slider/destroy')"><i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
          
                @endforeach

            </tbody>
    </table>

    {!! $sliders->links() !!}

@endsection
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>    
                <th>Name</th>    
                <th>Active</th>    
                <th>Update</th>    
                <th></th>    
            </tr>    
        </thead>    
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>

@endsection
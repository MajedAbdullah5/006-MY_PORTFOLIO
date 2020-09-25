@extends('Layout.app')
@section('content')
    <div class="main-div">
    <div class="visitorTable">
        <table id="myTable" class="table-bordered">

            <thead>
            <tr>
                <th>ID</th>
                <th>USER IP</th>
                <th>USER VISITED</th>
            </tr>
            </thead>
            <tbody>
            @foreach($key as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->ip_Address}}</td>
                    <td>{{$data->visit_time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

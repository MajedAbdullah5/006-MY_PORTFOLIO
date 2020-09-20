@extends('Layout.app')
@section('content')
<div id="mainDiv" class="row d-none">
    <div class="col-md-12">
        <table id="myTable" class="table-bordered">
            <a href="/addCourse" class="btn btn btn-primary mt-3">ADD COURSE +</a>
            <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody id="service_table">
            </tbody>
        </table>
    </div>
</div>

    <div id="loaderDiv" class="row text-center d-none">
        <div class="col col-md-12">
         <img src="{{asset('/image/loader/loader.svg')}}">
        </div>
    </div><div id="wrongDiv" class="row text-center d-none">
        <div class="col col-md-12">
        <h4 style="color: red; margin-top: 300px;">SOMETHING WENT WRONG!</h4>
        </div>
    </div>
@endsection
@section('script')
    <script>
        getServicesData();
    </script>
@endsection

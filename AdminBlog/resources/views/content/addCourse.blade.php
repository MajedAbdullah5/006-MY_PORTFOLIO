@extends('Layout.app')
@section('content')
    <div class="container">
   <div class="form-group mt-5">
       <label for="fileId">IMAGE</label>
       <input id="fileId" type="file" class="form-control" >

       <label for="name">NAME</label>
       <input id="name" type="text" class="form-control" >

       <label for="des">DESCRIPTION</label>
       <textarea id="des" type="text" class="form-control"></textarea>

       <button class="btn btn-primary d-block form-control mt-3" type="submit" onclick="saveFile()">ADD ITEM</button>

   </div>
    </div>
@endsection


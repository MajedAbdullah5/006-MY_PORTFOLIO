@extends('Layout.app')
@section('content')
    <div id="mainDiv" class="row d-none">
        <div class="col-md-12">
            <table id="myTable" class="table-bordered">
                <a id ="addNew" class="btn btn btn-primary mt-3">ADD COURSE +</a>
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
    </div>
    <div id="wrongDiv" class="row text-center d-none">
        <div class="col col-md-12">
            <h4 style="color: red; margin-top: 300px;">SOMETHING WENT WRONG!</h4>
        </div>
    </div>

    <div id="toast" class="d-none">
       Successfully deleted!
    </div>


    <!-- Edit Modal -->


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="status"></h1>
                <div class="modal-body">
                    <h1 id="status" class="p-3"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="nameId" class="form-control mb-4" placeholder="Name">
                    <textarea id="desId" class="form-control mb-4" placeholder="Desc"></textarea>
                    <input type="text" id="imageLinkId" class="form-control mb-4" placeholder="Image link">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="updateButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>



{{--    Add modal--}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="status"></h1>
                <div class="modal-body">
                    <h1 id="status" class="p-3"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="addName" class="form-control mb-4" placeholder="Name">
                    <textarea id="addDes" class="form-control mb-4" placeholder="Desc"></textarea>
                    <input type="text" id="addImg" class="form-control mb-4" placeholder="Image link">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addButton" type="button" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Side Modal Top Right -->
    <div class="modal fade right" id="sideWarningModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-side modal-top-right" role="document">
            <div class="modal-content">
                <div class="modal-body modalbody">
                    <h2 id="icon" style="display: inline-block; color: white;padding: 10px;"></h2>&nbsp;<h5 style="display:inline-block;" id="statusToaster" class="p-3"></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Side Modal Top Right -->


    <!--Edit Confirm Modal -->

    <div class="modal fade" id="editConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="confirmChange" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Delete Confirm Modal -->

    <div class="modal fade" id="deleteConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="confirmDeleteChange" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!--add Confirm Modal -->

    <div class="modal fade" id="addConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button id="confirmDeleteChange" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        getServicesData();
    </script>
@endsection

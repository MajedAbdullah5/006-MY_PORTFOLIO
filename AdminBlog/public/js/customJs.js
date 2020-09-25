function getServicesData() {
    axios.get('/dataService')
        .then(function (response) {
            $('#loaderDiv').removeClass('d-none');
            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                // $('#loaderDiv').addClass('d-none');
                var dataJSON = response.data;
                $.each(dataJSON, function (i) {
                    $("<tr>").
                    html(
                        "<td>" + dataJSON[i].id + "</td>"+
                        "<td>" + " <img style='width: 120px; height: 80px;' src=" + dataJSON[i].service_image + "></td>"+
                        "<td>" + dataJSON[i].service_name + " </td> "+
                        "<td>" + dataJSON[i].service_des + "</td>"+
                        "<td>" + " <a id=' edit '   data-id=" + dataJSON[i].id + " class='btn btn-primary btn-sm editBtn'>"+
                        "<i class='far fa-edit'>     </i> " + " &nbsp;Edit</a> " +  " </td> "+
                        "<td>" + " <a id=' delete ' data-id=" + dataJSON[i].id + " class='btn btn-danger btn-sm deleteBtn'>"+
                        "<i class='far fa-trash-alt'></i> " + " &nbsp;Delete</a></td>"+
                        "</tr>")
                        .appendTo('#service_table');

                });

                $('.deleteBtn').click(function () {
                    $('#deleteConfrimModal').modal('show');
                    setInterval(function (){
                        $('#deleteConfrimModal').modal('hide');
                    },5000);

                });

                $('.editBtn').click(function (){
                    let id = $(this).data('id');
                    $('#editModal').modal('show');
                    editServiceData(id);
                });

            } else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }

        }).catch(function (error) {
        $('#loaderDiv').addClass('d-none');
        $('#wrongDiv').removeClass('d-none');
    });
}

$('#updateButton').click(function (){
    $('#editConfrimModal').modal('show');
    setInterval(function (){
        $('#editConfrimModal').modal('hide');
    },5000);
});


$('#confirmChange').click(function (){
    var id = $('#header').html();
    var name = $('#nameId').val();
    var des = $('#desId').val();
    var img = $('#imageLinkId').val();
    updateData(id, name, des, img);
});

$('#confirmDeleteChange').click(function (){
    var id = $('.deleteBtn').data('id');
    deleteService(id);
});

$('#addNew').click(function (){
    setInterval(function (){
        $('#addModal').modal('hide');
    },15000);
    $('#addModal').modal('show');
});
$('#addButton').click(function (){
    var name = $('#addName').val();
    var des = $('#addDes').val();
    var img = $('#addImg').val();
    addNew(name, des, img);
});


function deleteService(deleteId) {
    axios.post('/delete', {
        id: deleteId
    }).then(function (response) {
        if (response.data == 1) {
            $('#sideWarningModalTR').modal('show');
            $("#icon").html("<i class='fas fa-check'></i>");
            $(".modalbody").css('background-color','#22bb33');
            $('.excl').css('color','white');
            $('#statusToaster').html("Succesfully Deleted!").css('color','White');
            setInterval(function (){
                $('#sideWarningModalTR').modal('hide');
                getServicesData();
            },3000);
        } else {
            $('#sideWarningModalTR').modal('show');
            $("#icon").html("<i class='fas fa-times'></i>");
            $(".modalbody").css('background-color','#bb2124');
            $('.excl').css('color','white');
            $('#statusToaster').html("Failed to Delete!").css('color','White');
            setInterval(function (){
                $('#sideWarningModalTR').modal('hide');
            },3000);
        }
    }).catch(function (error) {


    })
}

function addNew(newName,newDes,newImg){
    axios.post('/add',{
        name:newName,
        des:newDes,
        img:newImg,
    })
        .then(function (response){
            if(response.data == 1){
                $('#sideWarningModalTR').modal('show');
                $("#icon").html("<i class='fas fa-check'></i>");
                $(".modalbody").css('background-color','#22bb33');
                $('.excl').css('color','white');
                $('#statusToaster').html("Succesfully Added!").css('color','White');
                setInterval(function (){
                    $('#sideWarningModalTR').modal('hide');
                },3000);
            }
            else{
                $('#sideWarningModalTR').modal('show');
                $("#icon").html("<i class='fas fa-times'></i>");
                $(".modalbody").css('background-color','#bb2124');
                $('.excl').css('color','white');
                $('#statusToaster').html("Failed to Add!").css('color','White');
                setInterval(function (){
                    $('#sideWarningModalTR').modal('hide');
                },3000);
            }

    }).catch(function (error){
        $('#sideWarningModalTR').modal('show');
        $("#icon").html("<i class='fas fa-times'></i>");
        $(".modalbody").css('background-color','#bb2124');
        $('.excl').css('color','white');
        $('#statusToaster').html("Something went wrong!").css('color','White');
        setInterval(function (){
            $('#sideWarningModalTR').modal('hide');
        },3000);

    });
}

function editServiceData(editId) {
    axios.post('/edit', {
        id: editId
    })
        .then(function (response) {
            var data = response.data;
            if (response.status == 200) {
                $('#header').html(data[0].id);
                $('#imageLinkId').val(data[0].service_image);
                $('#nameId').val(data[0].service_name);
                $('#desId').val(data[0].service_des);
            } else {
                $('#sideWarningModalTR').modal('show');
                $("#icon").html("<i class='fas fa-times'></i>");
                $(".modalbody").css('background-color','#bb2124');
                $('.excl').css('color','white');
                $('#statusToaster').html("Something went wrong!").css('color','White');
                setInterval(function (){
                    $('#sideWarningModalTR').modal('hide');
                },3000);
            }
        }).catch(function (error) {

    })
}


function updateData(editId, editName, editdes, editImg) {

    if (editName.length == 0) {
       $('#sideWarningModalTR').modal('show');
        $("#icon").html("<i class='fas fa-exclamation-triangle'></i>");
       $(".modalbody").css('background-color','orange');
       $('.excl').css('color','white');
       $('#statusToaster').html("Name can't be empty").css('color','White');
       setInterval(function (){
           $('#sideWarningModalTR').modal('hide');
       },3000);

    } else if (editdes.length == 0) {
        $('#sideWarningModalTR').modal('show');
        $(".modalbody").css('background-color','orange');
        $('.excl').css('color','white');
        $('#statusToaster').html("Please give some information").css('color','White');
        setInterval(function (){
            $('#sideWarningModalTR').modal('hide');
        },3000);
    } else if (editImg.length == 0) {
        $('#sideWarningModalTR').modal('show');
        $(".modalbody").css('background-color','orange');
        $('.excl').css('color','white');
        $('#statusToaster').html("Please insert an image!").css('color','White');
        setInterval(function (){
            $('#sideWarningModalTR').modal('hide');
        },3000);
    } else {

        axios.post('/update', {
            id: editId,
            name: editName,
            des: editdes,
            img: editImg,
        }).then(function (response) {
            if (response.data == 1) {
                $('#sideWarningModalTR').modal('show');
                $("#icon").html("<i class='fas fa-check'></i>");
                $(".modalbody").css('background-color','#22bb33');
                $('.excl').css('color','white');
                $('#statusToaster').html("Succesfully Updated!").css('color','White');
                setInterval(function (){
                    $('#sideWarningModalTR').modal('hide');
                },3000);
                getServicesData();
            } else {
                $('#sideWarningModalTR').modal('show');
                $("#icon").html("<i class='fas fa-times'></i>");
                $(".modalbody").css('background-color','#bb2124');
                $('.excl').css('color','white');
                $('#statusToaster').html("Failed to Update!").css('color','White');
                setInterval(function (){
                    $('#sideWarningModalTR').modal('hide');
                },3000);
            }

        }).catch(function (error) {
        })


    }
}

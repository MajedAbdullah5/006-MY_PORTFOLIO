function  getServicesData(){
    let confirm = "if(!confirm('Do you want to delete?')) return  false";

axios.get('/dataService')
    .then(function (response){
        $('#loaderDiv').removeClass('d-none');
        if(response.status == 200){
            $('#mainDiv').removeClass('d-none');
            $('#loaderDiv').addClass('d-none');
            let dataJSON = response.data;
            $.each(dataJSON,function (i){
                $('<tr>').html("<td>"+dataJSON[i].id+ "</td><td>" + "<img style='width: 120px; height: 80px;' src="+dataJSON[i].service_image+ "></td><td>"+dataJSON[i].service_name+"</td><td>"+dataJSON[i].service_des+"</td><td>"+
                    "<a class='btn btn-primary btn-sm'><i class='far fa-edit'></i>&nbsp;Edit</a>"+
                    "</td><td><a data-id="+dataJSON[i].id+" class='btn btn-danger btn-sm deleteBtn'><i class='far fa-trash-alt'></i>&nbsp;Delete</a></td>").appendTo('#service_table');
            });
            $('.deleteBtn').click(function (){
                $id = $(this).data('id');
                deleteService($id);
            });
        }
        else{
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        }

    }).catch(function (error){
    $('#loaderDiv').addClass('d-none');
    $('#wrongDiv').removeClass('d-none');
});
}
function saveFile(){
    let pic = document.getElementById('fileId').files[0];
    let name = document.getElementById('name').value;
    let des = document.getElementById('des').value;
    let fileData = new FormData();
    fileData.append('picKey',pic);
    fileData.append('nameKey',name);
    fileData.append('desKey',des);
    let url = "/save";
    let config = {headers:{'content-type':'multipart/form-data'}}
    axios.post(url,fileData,config)
        .then(function (response){
            alert(response.data);
        let result = response.status;
        if(result == 200){
            alert('Files are ok');
        }
        else{
            alert('Something went wrong');
        }
    }).catch(function (error){
        alert(error);
    });
}
function deleteService(deleteId){
    axios.post('/delete',{id:deleteId}).then(function (response){
            if(response.data == 1){
                alert('File Deleted');
            }
            else{
                alert('Failed to delete');
            }
    }).catch(function (error){

    })
}

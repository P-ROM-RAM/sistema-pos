$(".newPhoto").change(function () { //When the photo changes, the function is executed

    var imagePhoto = this.files[0];

    if (imagePhoto["type"] != "image/jpeg" && imagePhoto["type"] != "image/png") {
        $(".newPhoto").val("");
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Image is not valid!"
        });
    }else if (imagePhoto["size"]>2000000) {
        $(".newPhoto").val("");
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "The image exceeds 2mb!",
          confirmButtonText: "Close",
        });
    }else{
        var datImage = new FileReader;
        datImage.readAsDataURL(imagePhoto);

        $(datImage).on("load", function(event){
            var urlImage = event.target.result;
            $(".previewImage").attr("src",urlImage);
        })
    }
})

// edit user
$(".btnEditUser").click(function(){
    var idUser = $(this).attr("idUser");

    console.log(idUser);

    var data = new FormData();
    data.append("idUser",idUser);

    $.ajax({
        url:"ajax/user.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){
            console.log("res",answer);
            $("#editName").val(answer["nombre"]);
            $("#editUser").val(answer["usuario"]);
            $("#editProfile").html(answer["perfil"]);
            $("#editProfile").val(answer["perfil"]);
            $("#currentPhoto").val(answer["foto"]);
            $("#currentPassword").val(answer["password"]);
            if(answer["foto"] != ""){
                $(".previewImage").attr("src",answer["foto"]);
            }
        }
    });
})

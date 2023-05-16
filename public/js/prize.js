$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function rest(){
        $("#name").val('')
        $("#address").val('')
        $("#phone").val('')
        $("#email").val('')
}

function create(id){
    $("#id_product").val(id)
   // e.preventDefault();
    rest()

    $("#staticBackdropLabe2").css("display", "none");
    $("#update").css("display", "none");
    $("#staticBackdropLabe1").css("display", "block");
    $("#create").css("display", "block");


    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    var modalToggle = document.getElementById('toggleMyModal')
    myModal.show(modalToggle)
}

$(".UpdateProduct").click(function(e){
    e.preventDefault();

    if(validate()){

        const data={
            'name': $("#name").val(),
            'address': $("#address").val(),
            'phone':$("#phone").val(),
            'id_product':$("#id_product").val(),
            'email':$("#email").val(),
            'id':$("#id").val()
        };
        $.ajax({
            type:'POST',
            url:'update/prize',
            data:data,
            success:function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'OK',
                    text: 'Registro actualizado',
                })
                location.reload();
            },
            error:function(data){

                if (data.status == 403) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.responseJSON.message,
                    })
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'servidor sin conexion !',
                    })
                }
            }
        });
    }



});


function edit(id){

    $.ajax({
        type:'POST',
        url:'/edit/prize',
        data:{'id':id},
        success:function(data){
            $("#id").val(data.data.id)
                $("#name").val(data.data.name)
                $("#address").val(data.data.address)
                $("#phone").val(data.data.phone)
                $("#email").val(data.data.email)
                $("#id_product").val(data.data.id_product)

            $("#staticBackdropLabe2").css("display", "block");
            $("#update").css("display", "block");
            $("#staticBackdropLabel1").css("display", "none");
            $("#create").css("display", "none");

            var myModal = new bootstrap.Modal(document.getElementById('myModal'))
            var modalToggle = document.getElementById('toggleMyModal')
            myModal.show(modalToggle)


        },
        error:function(data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'servidor sin conexion !',
            })
        }
    });


}

function validate(){

    if($("#name").val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'el nombre es oligatorio!',
        })
        return false

    }
    if($("#address").val()==''){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'la direeccion es oligatoria !',
        })
        return false
    }

    if($("#phone").val()==''){

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'el telefono es oligatorio!',
        })
        return false
    }

    if($("#email").val()==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'el email  es oligatorio!',
        })
        return false
    }

    var email = $("#email").val();
    var pattern = new RegExp(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/);
    if(pattern.test(email) == false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'el email  no es valido!',
        })
        return false
    }


    return true;
}

$(".createProduct").click(function(e){
    e.preventDefault();

    if(validate()){

        const data={
            'name': $("#name").val(),
            'address': $("#address").val(),
            'phone':$("#phone").val(),
            'id_product':$("#id_product").val(),
            'email':$("#email").val()
        };
        $.ajax({
            type:'POST',
            url:'/create/prize',
            data:data,
            success:function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'OK',
                    text: 'Registro Creado',
                })
                location.reload();
            },
            error:function(data){

                if (data.status == 403) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.responseJSON.message,
                    })
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'servidor sin conexion !',
                    })
                }
            }
        });
    }



});

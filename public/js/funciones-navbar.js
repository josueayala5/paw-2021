$(document).ready(function(){
    $(".user").click(function(event){
        $("#contenido").load("usuarios/save_user.php");
        event.preventDefault();
    })

    /*btn salir */
    $(".exit-sys").click(function(){
        if(confirm("seguro/a en cerrar sesion"))
        {
            location.href = "../../index.php";
        } else {
            alert("cierre de secsion cancelado...");
        }
    })
});
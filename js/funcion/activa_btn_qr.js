$(document).ready(function () {

    $('#btnQR').attr("disabled", true);
    
    $('#cedula, #nombres, #apellidos, #correo, #telef, #repre, #obs').keyup(function () {
        var buttonDisabled = $('#cedula').val().length == 0 || $('#nombres').val().length == 0 || $('#apellidos').val().length == 0 || $('#correo').val().length == 0 || $('#telef').val().length == 0 || $('#repre').val().length == 0 || $('#obs').val().length == 0 ;
        $('#btnQR').attr("disabled", buttonDisabled);
    });
    });
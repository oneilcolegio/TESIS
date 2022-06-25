/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);


//.......................................................
// Add Record
function addRecord() {
    // get values
    var idalumno = $("#idalumno").val();
    var codalumno = $("#codalumno").val();
    var codreg = $("#codreg").val();
    var nombres = $("#nombres").val();
    var correo = $("#correo").val();
    var telef = $("#telef").val();
    var repre = $("#repre").val();
    var obs = $("#obs").val();

    // Add record
    $.post("ajax/addRecord.php", {
        idalumno: idalumno,
        codalumno: codalumno,
        codreg: codreg,
        nombres: nombres,
        correo: correo,
        telef: telef,
        repre: repre,
		obs: obs
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#idalumno").val("");
        $("#codalumno").val("");
        $("#codreg").val("");
        $("#nombres").val("");
        $("#correo").val("");
        $("#telef").val("");
        $("#repre").val("");
        $("#obs").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_idalumno").val(user.idalumno);
            $("#update_codalumno").val(user.codalumno);
            $("#update_nombres").val(user.nombres);
            $("#update_correo").val(user.correo);
            $("#update_telef").val(user.telef);
            $("#update_repre").val(user.repre);
            $("#update_obs").val(user.obs);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var idalumno = $("#update_idalumno").val();
    var codalumno = $("#update_codalumno").val();
    var nombres = $("#update_nombres").val();
    var correo = $("#update_correo").val();
    var telef = $("#update_telef").val();
    var repre = $("#update_repre").val();
    var obs = $("#update_obs").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            idalumno: idalumno,
            codalumno: codalumno,
            nombres: nombres,
            correo: correo,
            telef: telef,
            repre: repre,
            obs: obs
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});

// Add Record
function addRecord() {
    // get values
    var codalumno = $("#codalumno").val();
    var idalumno = $("#idalumno").val();
    var nombres = $("#nombres").val();
    var correo = $("#correo").val();
    var telef = $("#telef").val();
    var repre = $("#repre").val();
    var fecha = $("#fecha").val();
    var obs = $("#obs").val();

    // Add record
    $.post("ajax/addRecord.php", {
        codalumno: codalumno,
        idalumno: idalumno,
        nombres: nombres,
        cooreo: correo,
        telef: telef,
        repre: repre,
        fecha: fecha,
		obs: obs
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#codalumno").val("");
        $("#idalumno").val("");
        $("#nombres").val("");
        $("#correo").val("");
        $("#telef").val("");
        $("#repre").val("");
        $("#fecha").val("");
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
            $("#update_codalumno").val(user.codalumno);
            $("#update_idalumno").val(user.idalumno);
            $("#update_obs").val(user.obs);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var codalumno = $("#update_codalumno").val();
    var idalumno = $("#update_idalumno").val();
    var obs = $("#update_obs").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
            id: id,
            codalumno: codalumno,
            id_alumno: idalumno,
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
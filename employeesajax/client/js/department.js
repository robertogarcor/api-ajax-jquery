// dto Departments  

/*
 * Request JQuery Ajax for departments
 * @returns data departments
 */
const getDepartments = function(e) {
    e.preventDefault();
    $.ajax({url: 'http://localhost/employeesajax/server/departments/departmentView.php',
        type: 'GET',
        dataType: 'json',
        contentType: 'application/json; charset=UTF-8',
        statusCode: {
            200 : function(data){
                    var th = ['id','name','company'];
                    var departments = data['response'];
                    var table = '<table class="table"><tr>';
                    for (var cb = 0; cb < th.length; cb++){
                        table += '<th>' + th[cb] + '</th>';
                    }
                    table += '</tr>';
                    for (var d in departments) {
                        table += '<td>' + departments[d].id + '</td>';
                        table += '<td>' + departments[d].name + '</td>';
                        table += '<td>' + departments[d].company + '</td>';
                        table += '</tr>'
                    };
                    table += '</table>';
                    $('#content-departments').append(table);
                    $('.btn-departments').prop("disabled",true);
                    $('.btn-del-departments').prop("disabled",false);
                },
            204 : function(xhr, statustext) {
                $('#content-departments').append('<p>' + statustext + ' departments!!</p>');
            }
        },
        success : function(){
            //alert('Request complete!');
        },
        error : function(xhr, statustext) {
            $('#content-departments').append('<p>' + 'Error request!: ' + xhr.status + " - " + statustext + ' departments!!</p>');
            //alert('Error request!: ' + xhr.status + " - " + statustext);
        }       
    });
}

// Hide table departments
const deleteDepartments = function(e) {
    e.preventDefault();
    $("#content-departments").empty();
    $(".btn-departments").prop("disabled", false);
    $('.btn-del-departments').prop("disabled", true);
}

// Show Form Departments
const showFormDepartment = function(e) {
    e.preventDefault();
    $("#form-new-department").css("visibility", "visible");
}

// New Department

const validateFields = (e) => {
    //e.preventDefault();
    var name = $("#name").val();
    if (name == "") {
        $(".error-name").addClass("d-block");
        return false;
    } else {
        $(".error-name").removeClass("d-block");
    }
    var company = $("#select-companies").val();
    if (company == "" || parseInt(company) <= 0) {
        $(".error-company").addClass("d-block");
        return false;
    } else {
        $(".error-company").removeClass("d-block");
    }
    return true;
}

const newDepartment = (e) => {
    e.preventDefault();
    if (validateFields()) {
        var dataForm = $("#form-new-department").serialize();
        var object = { "name" : $('#name').val() , "company" : $('#select-companies').val()};
        var dataJSON = JSON.stringify(object);  
        console.log(object);
            $.ajax({url: 'http://localhost/employeesajax/server/departments/departmentView.php',
            data : dataJSON,
            type: 'POST',
            contentType: 'application/json; charset=UTF-8',
            success : function(data){
                //console.log(data);
                $('#name').val('');
                $('#select-companies').val('0');
                deleteDepartments(e);
                getDepartments(e);   
            },
            error : function(xhr, statustext) {
                alert('Error request!: ' + xhr.status + " - " + statustext);
            }      
            });
    } else {
        console.log("Fields incorrects!!");
    }
}


$(".btn-departments").on("click", getDepartments);
$(".btn-del-departments").on("click", deleteDepartments);
$(".btn-new-department").on("click", newDepartment);
$(".btn-show-form-department").on("click", showFormDepartment);
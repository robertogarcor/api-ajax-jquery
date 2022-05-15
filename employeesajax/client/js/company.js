// dto Companies  

$(document).ready(function() {
    getCompanies();
});

/*
 * Request JQuery Ajax for companies
 * @returns data companies
 */
const getCompanies = function(e) {
    $.ajax({url: 'http://localhost/employeesajax/server/companies/companyView.php',
        type: 'GET',
        dataType: 'json',
        contentType: 'application/json; charset=UTF-8',
        statusCode: {
            200 : function(data){
                console.log(data['response']);
                const companies = data['response'];
                for(let c in companies){
                    $('#select-companies').append('<option value="' + companies[c].id + '">' + companies[c].name + '</option>');   
                }
            },
            204 : function(xhr, statustext) {
                $('.list-companies').append('<span>' + statustext + ' companies!!</span>');
            }
        },
        success : function(){
            console.log('Request companies complete!');
        },
        error : function(xhr, statustext) {
            $(".error-companies").addClass("d-block");
            $('.list-companies').append('<span>' + 'Error request!: ' + xhr.status + " - " + statustext + ' companies!!</span>');
        }       
    });
}


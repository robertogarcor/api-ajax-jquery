

$(document).ready(function(){
    loadData();
});

/*
 * Request JQuery Ajax for employees
 * @returns data employees
 */
var loadData = function(){
    $.ajax({url: 'http://localhost/employeesajax/server/employeesview.php',
           type: 'GET',
           dataType: 'json',
           contentType: 'application/json; charset=UTF-8',
           statusCode: {
                200 : function(data){
                    
                        var th = ['id','dni','firstname','username','role','department','company'];
                        var employees = data['response'];
                        
                        var table = '<table><tr>';
                        for (var cb = 0; cb < th.length; cb++){
                            table += '<th>' + th[cb] + '</th>';
                        }
                        table += '</tr>';
                        for (var e in employees){
                            table += '<td>' + employees[e].id + '</td>';
                            table += '<td>' + employees[e].dni + '</td>';
                            table += '<td>' + employees[e].firstname + '</td>';
                            table += '<td>' + employees[e].username + '</td>';
                            table += '<td>' + employees[e].role + '</td>';
                            table += '<td>' + employees[e].department + '</td>';
                            table += '<td>' + employees[e].company + '</td></tr>'; 
                        };
                        table += '</table>';
                        $('#content').append(table); 
                    },
                204 : function(xhr, statustext) {
                    $('#content').append('<p>' + statustext + '!!</p>');
                }
            },
            success : function(){
                //alert('Request complete!');
            },
            error : function(xhr, statustext) {
                $('#content').append('<p>' + 'Error request!: ' + xhr.status + " - " + statustext + '!!</p>');
                //alert('Error request!: ' + xhr.status + " - " + statustext);
            }       
    });
               
};


        
        
        



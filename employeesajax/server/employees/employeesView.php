<?php

/**
 * View Employees
 * @author Roberto García Córcoles
 * @version 2018/10/13
 */

require_once('./EmployeesController.php');

$employees = EmployeesController::get();
http_response_code($employees['status']);
header('Content-Type: application/json; charset=utf-8'); 
echo json_encode($employees); 
    
?>
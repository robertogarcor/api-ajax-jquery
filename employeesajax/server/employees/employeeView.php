<?php

/**
 * View Employees
 * @author Roberto García
 * @version 2018/10/13
 */

require_once('./EmployeeController.php');


switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $employees = EmployeeController::get();
        http_response_code($employees['status']);
        header('Content-Type: application/json; charset=utf-8'); 
        echo json_encode($employees); 
        break; 
    case "POST":
        break;
}

    
?>
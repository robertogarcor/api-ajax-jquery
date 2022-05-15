<?php

/**
 * View Departments
 * @author Roberto García
 * @version 2021/12/1
 */

require_once('./DepartmentController.php');

header('Content-Type: application/json; charset=utf-8');

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $response = DepartmentController::get();
        break; 
    case "POST":
        $response = DepartmentController::post();
        break;
    }

http_response_code($response['status']);
echo json_encode($response);    




 

    
?>
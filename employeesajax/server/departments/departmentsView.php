<?php

/**
 * View Departments
 * @author Roberto García Córcoles
 * @version 2021/12/1
 */

require_once('./DepartmentsController.php');

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $departments = DepartmentsController::get();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($departments['status']);
        echo json_encode($departments);
        break; 
    case "POST":
        DepartmentsController::post();
        $response = ['success' => 'ok'];
        echo json_encode($response);
        break;
}




 

    
?>
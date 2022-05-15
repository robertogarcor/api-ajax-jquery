<?php

/**
 * View Companies
 * @author Roberto García
 * @version 2022/05/14
 */

require_once('./CompanyController.php');

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $companies = CompanyController::get();
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($companies['status']);
        echo json_encode($companies);
        break; 
    case "POST":
        break;
}

    
?>
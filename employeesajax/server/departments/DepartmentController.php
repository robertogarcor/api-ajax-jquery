<?php

require_once ('./DepartmentService.php');

interface IDepartmentController {
    public function getDepartments();
    public function saveDepartment($department);
}

class DepartmentController implements IDepartmentController {

private static $instance;
private static $departments;

/**
 * Construct Departments object
 */
private function __construct() {
    try {
        self::$departments = new DepartmentService(new DepartmentDAO());
    } catch(Exception $ex) {
        $ex->getMessage();
    }
}

/**
 * Pattern Singleton
 * @return object departments controller instance
 */
public static function getInstance(){
    if (self::$instance == null) {
        self::$instance = new self();
    }
    return self::$instance;
}

/**
 * Get records departments data
 * @return type array/json
 */
public static function get() {
    return self::getInstance()->getDepartments();
}

public static function post(){
    $department = json_decode(file_get_contents('php://input'), TRUE);
    return self::getInstance()->saveDepartment($department);
}


public function getDepartments() {
    $response = self::$departments->getDepartments(); 
    if (empty($response)) {
        return [
            'status' => 204,
            'response' => 'No Found Departments!.'
            ];
    } else {
        return [
            'status' => 200,
            'response' => $response
            ];
    }
}

public function saveDepartment($department) {
    $response = self::$departments->saveDepartment($department);
    if($response) {
        return [
            'status' => 201,
            'response' => 'Create Department ok!.'
           ];
    } else {
        return [
            'status' => 500,
            'response' => 'Error Server!'
        ];
    }
}


/**
 * Prevent the object from being cloned
 */
public function __clone() {}


}

?>


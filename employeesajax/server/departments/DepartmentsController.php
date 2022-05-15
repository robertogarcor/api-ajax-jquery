<?php

require_once ('./DepartmentsService.php');

interface IDepartmentController {
    public function getDepartments();
    public function saveDepartment($department);
}

class DepartmentsController implements IDepartmentController {

private static $instance;
private static $departments;

/**
 * Construct Departments object
 */
private function __construct() {
    try {
        self::$departments = new DepartmentsService(new DepartmentsDAO());
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
    self::getInstance()->saveDepartment($department);
}


public function getDepartments() {
    $response = self::$departments->getDepartments(); 
    if (empty($response)) {
        return [
                'status' => 204,
                'response' => 'No Found Departments !.'
               ];
    } else {
        return [
                'status' => 200,
                'response' => $response
               ];
    }
}

public function saveDepartment($department) {
    self::$departments->saveDepartment($department);
}


/**
 * Prevent the object from being cloned
 */
public function __clone() {}


}

?>


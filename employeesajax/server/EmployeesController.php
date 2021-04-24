
<?php

require_once('./EmployeesDAO.php');
require_once('./EmployeesService.php');

/**
 * Class of EmployeesController
 * @author Roberto García Córcoles
 * @version 2018/10/13
 */
class EmployeesController {

    private static $instance;
    private static $employees;
    
    /**
     * Construct Employees object
     */
    private function __construct() {
        try {
            self::$employees = new EmployeesService(new EmployeesDAO());
        } catch(Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * Pattern Singleton
     * @return object employees controller instance
     */
    public static function getInstance(){
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Get records employees data
     * @return type array/json
     */
    public static function get() {
        return self::getInstance()->getEmployees();
    }


    public function getEmployees() {
        $response = self::$employees->getEmployees(); 
        if (empty($response)) {
            return [
                    'status' => 204,
                    'response' => 'No Found Employees!.'
                   ];
        } else {
            return [
                    'status' => 200,
                    'response' => $response
                   ];
        }
    }


    /**
     * Prevent the object from being cloned
     */
    public function __clone() {}


}
       
?>
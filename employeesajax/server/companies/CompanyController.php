<?php

require_once ('./CompanyService.php');

interface ICompanyController {
    public function getCompanies();
}

class CompanyController implements ICompanyController {

    private static $instance;
    private static $companies;

    /**
     * Construct Departments object
     */
    private function __construct() {
        try {
            self::$companies = new CompanyService(new CompanyDAO());
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
        return self::getInstance()->getCompanies();
    }

    
    public function getCompanies() {
        $response = self::$companies->getCompanies(); 
        if (empty($response)) {
            return [
                    'status' => 204,
                    'response' => 'No Found Companies !.'
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


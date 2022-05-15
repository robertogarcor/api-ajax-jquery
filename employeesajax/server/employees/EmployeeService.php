<?php

require_once('./EmployeeDAO.php');

/**
 * Class of EmployeeService
 * @author Roberto García 
 * @version 2018/10/13
 */
class EmployeeService {

    private $dao = null;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getEmployees(){
        return $this->dao->getEmployees();
    }




}


?>
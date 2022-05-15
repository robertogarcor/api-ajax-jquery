<?php

require_once('./EmployeesDAO.php');

/**
 * Class of EmployeesService
 * @author Roberto García Córcoles
 * @version 2018/10/13
 */
class EmployeesService {

    private $dao = null;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getEmployees(){
        return $this->dao->getEmployees();
    }




}


?>
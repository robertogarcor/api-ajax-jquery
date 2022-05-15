<?php 

require_once ('./DepartmentDAO.php');

interface IDepartmentService {
    public function getDepartments();
    public function saveDepartment($department);

}

class DepartmentService implements IDepartmentService {

    private $dao = null;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getDepartments() {
        return $this->dao->getDepartments();
    }

    public function saveDepartment($department) {
        return $this->dao->saveDepartment($department);
    }


}







?>
<?php 

require_once ('./DepartmentsDAO.php');

interface IDepartmentService {
    public function getDepartments();
    public function saveDepartment($department);

}

class DepartmentsService implements IDepartmentService {

    private $dao = null;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getDepartments() {
        return $this->dao->getDepartments();
    }

    public function saveDepartment($department) {
        $this->dao->saveDepartment($department);
    }


}







?>
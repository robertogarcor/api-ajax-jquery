<?php 

require_once ('./CompanyDAO.php');

interface ICompanyService {
    public function getCompanies();   
}

class CompanyService implements ICompanyService {

    private $dao = null;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    public function getCompanies() {
        return $this->dao->getCompanies();
    }

    


}







?>
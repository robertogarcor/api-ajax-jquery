<?php

require_once ('../Database.php');

interface ICompanyDAO {
    public function getCompanies();
}

class CompanyDAO implements ICompanyDAO {

    function getCompanies() {

        $sql = sprintf('SELECT * FROM companies');

        try {

            $prst = Database::getInstance()->getDb()->prepare($sql);

            $prst->execute();

            return $prst->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (Exception $ex) {
            $ex->getMessage(); 
        } finally {
            Database::closeDb();
        }
    }   

}

?>

 


<?php

require_once ('../Database.php');

interface IDepartmentDAO {
    public function getDepartments();
    public function saveDepartment($department);

}

class DepartmentsDAO implements IDepartmentDAO {

    function getDepartments() {

        $sql = sprintf('SELECT d.id, d.name, c.name as company FROM departments as d
            LEFT JOIN companies as c
            ON d.company_id = c.id;');

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

    function saveDepartment($department) {
        $sql = 'INSERT INTO departments (name, company_id) VALUES (?,?)';

        try {

            $prst = Database::getInstance()->getDb()->prepare($sql);
            $prst->bindParam(1, $department["name"]);
            $prst->bindParam(2, $department["company"]); 
            $prst->execute();

        } catch (Exception $ex) {
            $ex->getMessage(); 
        } finally {
            Database::closeDb();
        }
    }

}

?>

 


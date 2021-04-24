<?php

require_once ('./Database.php');

/**
 * Class of EmployeesDAO
 * @author Roberto García Córcoles
 * @version 2018/10/12
 */
class EmployeesDAO {

    /**
     * Get Employees
     * @return array records employees data
     */
    public function getEmployees() {

        $sql = sprintf('SELECT e.id as id, '.
                               'e.dni as dni, '.
                               'e.firstname as firstname, '.
                               'u.username as username, '.
                               'r.name as role, '.
                               'dp.name as department, '.
                               'c.name as company '.
                        'FROM employees e '.
                        'INNER JOIN departments dp '.
                        'ON e.department_id=dp.id '.
                        'INNER JOIN companies c '.
                        'ON c.id=dp.company_id '.
                        'INNER JOIN users u '.
                        'ON u.id = e.id '.
                        'INNER JOIN roles r '.
                        'ON u.role_id=r.id;');

        try {
            // Get connection and prepareStament and execute from SQL query
            $prst = Database::getInstance()->getDb()->prepare($sql);
            
            // Execute sent
            $prst->execute();            

            $data = $prst->fetchAll(PDO::FETCH_ASSOC);

            // Return the rows or null
            return $data != false ? $data : null;

        } catch (PDOException $ex) {
            $ex->getMessage();
        } finally {
            Database::closeDb();
        }
        
    }

   
    




}

?>



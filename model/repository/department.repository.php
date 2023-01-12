<?php
require_once(__DIR__ . "/../dto/user.dto.php");
require_once(__DIR__ . "/../dto/department.dto.php");
require_once(__DIR__ . "/../dto/city.dto.php");
require_once(__DIR__ . "/../dto/desire.dto.php");
class DepartmentRepository
{

    public static function findByCode($code)
    {
        global $bdd;
        $sql = 'SELECT departement_code, departement_nom
                FROM departement as department
                WHERE department.departement_code = :department_code LIMIT 1';
        $req = $bdd->prepare($sql);
        $req->bindParam(":department_code", $code, PDO::PARAM_INT);
        $req->execute();
        $department = $req->fetch(PDO::FETCH_ASSOC);

        return !$department ? null : self::getDto($department);
    }

    private static function getDto($department)
    {
        return new DepartmentDto($department['departement_code'], $department['departement_nom']);
    }

    private static function getDtos($departments)
    {
        $return = array();
        foreach ($departments as $department) {
            $return[] = self::getDto($department);
        }
        return $return;
    }
}

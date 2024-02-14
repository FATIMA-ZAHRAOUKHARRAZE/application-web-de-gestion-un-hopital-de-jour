<?php

use function PHPSTORM_META\sql_injection_subst;

    require_once 'model.php';
    class patientModel extends Model
    {   
        public function __construct()
        {
            parent::__construct();
        }
        public function getPatientById($id)
        {
            $sql = "SELECT * FROM ". $this->table ." WHERE id=?" ;
            $query = $this->requete( $sql, [$id]);
            return $this->getOne($query);
        }
   
    }
?>
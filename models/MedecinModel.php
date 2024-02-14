<?php
    require_once 'model.php';

    class MedecinModel extends Model
    {     
        public function __construct()
        {
            parent::__construct();
        }

        public function cherchermedecin($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE id=? OR nom_medecin=? OR prenom_medecin=? OR tel_medecin=? OR email_medecin=?";
            $query = $this->requete( $sql, [$param,$param,$param,$param,$param]);
            return $this->getAll($query);
        }
        public function insertmedecin($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(nom_medecin,prenom_medecin,tel_medecin,email_medecin) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function modifiermedecin($values){
            $sql="UPDATE ".$this->table." SET nom_medecin=?,prenom_medecin=?,tel_medecin=?,email_medecin=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }

    }
?>
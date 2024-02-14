<?php

use function PHPSTORM_META\sql_injection_subst;

    require_once 'model.php';
    class UserModel extends Model
    {   
        
        
        public function __construct()
        {
            parent::__construct();
        }
        public function InsertInfirmier($values)
        {
            $sql = "INSERT INTO  infirmiers";
            $sql .='(id,nom_infirmier,prenom_infirmier,tel_infirmier,email_infirmier) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function InsertPatient($values)
        {
            $sql = "INSERT INTO patients";
            $sql .='(id,nom_patient,prenom_patient,tel_patient,email_patient) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function InsertMedecin($values)
        {
            $sql = "INSERT INTO  medecins";
            $sql .='(id,nom_medecin,prenom_medecin,tel_medecin,email_medecin) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function InsertMedecinPharmacie($values)
        {
            $sql = "INSERT INTO  medecin_pharmacies";
            $sql .='(id,nom_pharmacie,prenom_pharmacie,tel_pharmacie,email_pharmacie) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function InsertResponsableStock($values)
        {
            $sql = "INSERT INTO  resposable_stocks";
            $sql .='(id,nom_rs,prenom_rs,tel_rs,email_rs) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function InsertMedecinChef($values)
        {
            $sql = "INSERT INTO  medecin_chefs";
            $sql .='(id,nom_medecinchef,prenom_medecinchef,tel_medecinchef,email_medecinchef) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        public function insertuser($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(username,password,role,valide) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        public function updatepass($username,$password)
        {
            $sql = "update users SET password=? Where username=?";
            $this->requete($sql,[$password,$username]);
           
        }
        public function updateuser($values){
            $sql="UPDATE ".$this->table." SET username=?,role=?,valide=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }
        public function updatevalide($id)
        {
            $sql = "update users SET valide=1 Where id=?";
            $this->requete($sql,[$id]);
           
        }
        public function updateinvalide($id)
        {
            $sql = "update users SET valide=0 Where id=?";
            $this->requete($sql,[$id]);
           
        }

        public function chercheruser($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE username=? OR role=?";
            $query = $this->requete( $sql, [$param,$param]);
            return $this->getAll($query);
        }
    }
?>
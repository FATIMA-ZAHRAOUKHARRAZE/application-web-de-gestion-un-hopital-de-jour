<?php
    require_once 'model.php';

    class PlaningModel extends Model
    {     
        public function __construct()
        {
            parent::__construct();
        }

        public function chercherplaning($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE id=? OR intitule_planing=? OR datedebut_planing=? OR datefin_planing=? OR id_medecin=?";
            $query = $this->requete( $sql, [$param,$param,$param,$param,$param]);
            return $this->getAll($query);
        }
        public function InsertPlaning($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(id,intitule_planing,datedebut_planing,datefin_planing,id_medecin,id_medecinchef) values(?,?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }
        
        
        public function modifierplaning($values){
            $sql="UPDATE ".$this->table." SET intitule_planing=?,datedebut_planing=?,datefin_planing=? WHERE id= ? ";
            $query =$this->requete( $sql, $values);
        }
        public function planingmedecin($id)
        {
            $sql = "SELECT * FROM planings where id_medecin=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }
    }
?>
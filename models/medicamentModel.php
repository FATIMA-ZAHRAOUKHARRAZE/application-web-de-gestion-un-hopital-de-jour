<?php
    require_once 'model.php';
    require_once 'database.php';

    class medicamentModel extends Model
    {   
         
        public function __construct()
        {
            parent::__construct();
        }

        public function findByNom(int $id,$tel,string $nom ,$prenom,$email)
        {
            $sql= "SELECT * FROM {$this->table} WHERE nom= '$nom'or  prenom='$prenom'or id=$id or email='$email' or tel=$tel ";
            $query = $this->requete($sql);
            $classe = get_class($this);
            $query->setFetchMode( PDO::FETCH_CLASS, $classe );

            return $this->getAll($query);
        }

        public function cherchermedicament($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE  id=? OR nom_medicament=? OR type_medicament=? OR description_medicament=?";
            $query = $this->requete( $sql,[$param,$param,$param,$param]);
            return $this->getAll($query);
        }
        public function insertmedicament($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='( id,nom_medicament,type_medicament,description_medicament) values(?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }

        public function Updatemedicament($values)
        {
            $sql="UPDATE ".$this->table." SET nom_medicament=?,type_medicament=?,description_medicament=?WHERE id = ? ";
            $query =$this->requete( $sql, $values);
        }
        
    }

?>
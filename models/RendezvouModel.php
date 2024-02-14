<?php
    require_once 'model.php';
    require_once 'database.php';

    class RendezvouModel extends Model
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

        public function chercherrendezvous($param)
        {
            $sql = "SELECT * FROM ". $this->table;
            $sql .= " WHERE id=? OR intitule_rv=? OR date_rv=? OR heure_rv=?";
            $query = $this->requete( $sql,[$param,$param,$param,$param]);
            return $this->getAll($query);
        }
        

        public function insertrendezvous($values)
        {
            $sql = "INSERT INTO ".$this->table;
            $sql .='(intitule_rv,date_rv,heure_rv,id_patient,id_infermiere) values(?,?,?,?,?)';
            $query =$this->requete( $sql, $values);
        }

        public function Updaterendezvous($values)
        {
            $sql="UPDATE ".$this->table." SET intitule_rv = ?,date_rv = ?,heure_rv = ?WHERE id = ? ";
            $query =$this->requete( $sql, $values);
           
        }
        public function rendezvoupatient($id)
        {
            $sql = "SELECT * FROM rendezvous where id_patient=?";
            $query = $this->requete( $sql, [$id]);
            return $this->getAll($query);
        }


        
    }

?>
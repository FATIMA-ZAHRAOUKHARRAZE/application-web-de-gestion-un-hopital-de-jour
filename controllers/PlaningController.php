<?php
    require_once  "Controller.php";

    
    class PlaningController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $planing = $this->model->find($id);
            
            $this->render('show',["planing"=>$planing]);
            
        }


        public function ajouterplaningmedecin()
        {
           
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouterplaningmedecin',['liste'=>$liste]);
           
       }
       public function ajouterplaningmedecinchef()
        {
           
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouterplaningmedecinchef',['liste'=>$liste]);
           
       } 
        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $planing = $this->model->find($id);
            if($planing){
                //$this->render('delete',["planing"=>$planing]);
                $m=new PlaningModel();
                $m->delete($id);
                header('location:index.php?page=planing/index');
            }
            else
             echo"planing introvable";
        }

        public function chercherplaning()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->chercherplaning($param);
            $this->render('chercherplaning',['liste'=>$liste]);

        }
        
      
        public function ajouter()
        {
            $liste = $this->model->findAll();
            //envoiler la fonction a le view pour afficher
            $this->render('ajouter',['liste'=>$liste]);
            
        }

        public function medecin()
        {
           
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $medecin = $this->model->find($id);
            $planing=$this->model->planingmedecin($id);
            
            $this->render('medecin',["planing"=>$planing,"medecin"=>$medecin]);

        }
        
    }
?>
<?php
    require_once  "Controller.php";

    
    class MedecinController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $user = $this->model->find($id);
            
            $this->render('show',["medecin"=>$medecin]);
            
        }

        
        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $medecin = $this->model->find($id);
            if($medecin){
                //$this->render('delete',["medecin"=>$medecin]);
                $m=new MedecinModel();
                $m->delete($id);
                header('location:index.php?page=medecin/index');
            }
            else
             echo" medecin introvable";
        }

        public function cherchermedecin()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->cherchermedecin($param);
            $this->render('cherchermedecin',['liste'=>$liste]);

        }
        
      
        public function ajouter()
        {
            $liste = $this->model->findAll();
            //envoiler la fonction a le view pour afficher
            $this->render('ajouter',['liste'=>$liste]);
            
        }
        
    }
?>
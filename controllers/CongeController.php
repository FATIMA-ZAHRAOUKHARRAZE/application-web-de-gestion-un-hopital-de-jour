<?php
    require_once  "Controller.php";

    
    class CongeController extends Controller
    {
        
        public function __construct( $view )
        {
            parent::__construct();
        }

        public function show()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $conge = $this->model->find($id);
            
            $this->render('show',["conge"=>$conge]);
            
        }

        public function ajoutercongemedecin()
        {
           
                $liste = $this->model->findAll();
                
                //envoiler la fonction a le view pour afficher
                $this->render('ajoutercongemedecin',['liste'=>$liste]);
                
       } 
       
       public function ajoutercongemedecinchef()
        {
           
                $liste = $this->model->findAll();
                
                //envoiler la fonction a le view pour afficher
                $this->render('ajoutercongemedecinchef',['liste'=>$liste]);
                
       } 
        public function delete()
        {
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $conge = $this->model->find($id);
            if($conge){
                //$this->render('delete',["conge"=>$conge]);
                $m=new CongeModel();
                $m->delete($id);
                header('location:index.php?page=conge/index');
            }
            else
             echo" conge introvable";
        }

        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            $liste = $this->model->chercherconge($param);
            $this->render('chercher',['liste'=>$liste]);

        }
        
      
        public function ajouter()
        {
            $liste = $this->model->findAll();
            //envoiler la fonction a le view pour afficher
            $this->render('ajouter',['liste'=>$liste]);
            
        }
        
    }
?>
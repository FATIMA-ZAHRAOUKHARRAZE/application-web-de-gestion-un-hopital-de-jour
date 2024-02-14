<?php
    require_once  "Controller.php";
    
    class medicamentController extends Controller
    {
       
        
        public function __construct( $view )
        {
           parent::__construct();
           $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
           
        }
        
        public function show()
        {

            $id = (isset($_GET['id']) ? $_GET['id']:1);
            
            $medicament = $this->model->find($id);
        
            
            $this->render('show',["medicament"=>$medicament]);
        }
        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->cherchermedicament($param);
            
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
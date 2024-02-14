<?php
    require_once  "Controller.php";
   
    class RendezvouController extends Controller
    {
       
        
        public function __construct( $view )
        {
           parent::__construct();
           $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
           
        }
        
        public function show()
        {

            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $rendezvous = $this->model->find($id);
            
            $this->render('show',["rendezvous"=>$rendezvous]);
        }
        public function chercher()
        {
            $param = (isset($_GET['param']) ? $_GET['param'] : '' );
            
            $liste = $this->model->chercherrendezvous($param);
            
            $this->render('chercher',['liste'=>$liste]);
        }
        public function delete()
        {
            $num=$_SESSION['username'];
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            $rendezvous = $this->model->find($id);
            if($rendezvous){
                //$this->render('delete',["diplome"=>$diplome]);
                $m=new RendezvouModel();
                $m->delete($id);
                if(isset($_SESSION['logged']) && $_SESSION['role']=='infirmier')
                {
                                    
                header('location:index.php?page=rendezvou/index');
               
                                                }
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='patient')
                {
                                                header('location:index.php?page=rendezvou/patient&id='.$num);
                }
            }
            else
             echo"le rendez vous introvable";
        }

        public function ajouter()
        {
            
                $liste = $this->model->findAll();
                //envoiler la fonction a le view pour afficher
                $this->render('ajouter',['liste'=>$liste]);
           
        }

        public function patient()
        {
           
            $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
            
            $patient = $this->model->find($id);
            $rendezvous=$this->model->rendezvoupatient($id);
            
            $this->render('patient',["rendezvous"=>$rendezvous,"patient"=>$patient]);

        }
       
    }
?>
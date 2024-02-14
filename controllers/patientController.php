<?php
    require_once  "Controller.php";
    
    class patientController extends Controller
    {
       
        
        public function __construct( $view )
        {
           parent::__construct();
           $id = (isset($_GET['id']) ? $_GET['id'] : 1 );
           
        }
    }
?>
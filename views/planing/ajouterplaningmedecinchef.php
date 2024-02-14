<?php
$id="";
$intitule="";
$description="";
$datedebut="";
$datefin="";
$idmedecin="";
$idmedecinchef="";

if( !empty($_POST))
    {
        if(isset($_POST['ajouterplaningmedecinchef']))
        {
            $nm=$_POST['txtnum'];
            $num=$_SESSION['username'];
                $intitule=$_POST['txtintitule'];
                $datedebut=$_POST['TXTdatedebut'];
                $datefin=$_POST['datefin'];

        $values=[$intitule,$description,$datedebut, $datefin,$nm,$num];
        
        $m=new PlaningModel();
        
        $m->InsertPlaning($values);
        header('location: index.php?page=planing/ajouterplaningmedecinchef');
   }
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ajouter planing</title>
    <style type="text/css">
        .btn{
                background-color: #2a2185;
                color: white;
        }                   
      </style>
</head>
<body>
<div class="card text-dark bg-light mb-3" style="max-width: 95%; height:400px; margin-left:100px; margin-right:100px; margin-top:70px;">
    <div class="card-body">
        <div class="container"  style="margin-bottom:70px;">  
            <div class="col-sm-12" >
                <form method="post" name="FRMPlaning"  style="margin-top:80px; margin-left:100px;">
                    <div class="row g-3">
                        <div  class="col-5">
                            <label for="txtid" id="LBLid"  name="LBLid">Id Planing</label>
                            <input type="text" id="txtid" name="txtid"placeholder="saisir votre id" class="form-control">
     
                            <label for="txtintitule" id="LBLINTITULE"  name="LBLINTITULE">Intitule Planing </label>
                            <input type="text" id="txtintitule" name="txtintitule" placeholder="saisir votre intitule" class="form-control">
      
                            <label for="TXTdatedebut" id="LBLdatedebut"  name="LBLdatedebut" > Date Debut planing</label>
                            <input type="date" id="TXTdatedebut" name="TXTdatedebut" placeholder="saisir date debut" class="form-control" >
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
      
                            <label for="datefin"> Date Fin Planing</label>
                            <input type="date" id="datefin" name="datefin"  placeholder="saisir date fin" class="form-control">
        
                            <label for="datefin">Num medecin</label>
                            <input type="text" id="txtnum" name="txtnum"  placeholder="saisir num medecin" class="form-control">
                        </div>
                        <div class="col-1"></div>    
                    </div> 
                    <br>
                    <button type="submit" id="bntajouter" name="ajouterplaningmedecinchef" class="btn"> <i class="material-icons">add</i></button>                 </form>
            </div> 
        </div> 
    </div> 
</div> 
</html>
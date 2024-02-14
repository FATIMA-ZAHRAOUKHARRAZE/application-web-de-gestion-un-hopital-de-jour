<?php
$intitule="";
$datedebut="";
$datefin="";

if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $intitule=$_POST['intutile'];
                $datedebut=$_POST['datedebut'];
                $datefin=$_POST['datefin'];
               $values=[$intitule,$datedebut,$datefin,$id];
               $m=new PlaningModel();
                $m->modifierplaning($values);   
                header('Location:index.php?page=planing/index');
        }  
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title> Afficher Planing</title>
    <style type="text/css">
        .custom-centered{
                margin:0 auto;
                margin-bottom: 100px;
                margin-top: 80px;
                margin-left: 300px;
        }
        .btn{
                background-color: #2a2185;
                color: white;
        }
      </style>
</head>
<body>
<form method="post" class="custom-centered">
   <div class="container">
        <div class="row g-1 align-items-center">
                <div class="col-5">
                                <label for="intitule" id="lblintitule" name="lblintitule" class="form-label">Intitule</label>
                                <input type="text"  class="form-control"  placeholder="saisir l'intitule" value="<?=$planing->intitule_planing ?>" name="intutile">

                                <label for="datedebut" id="lbldatedebut" name="lbldatedebut"  class="form-label">Date Debut:</label>
                                <input type="date" class="form-control"   placeholder="saisir date debut" value="<?=$planing->datedebut_planing?>" name="datedebut">
                
                                <label for="datefin" id="lbldatefin" name="lbldatefin" class="form-label">Date Fin</label>
                                <input type="date"  class="form-control"  placeholder="saisir date fin" value="<?=$planing->datefin_planing ?>" name="datefin">

                
                            </div> 
                <div class="col-12">
                       
                                <button  id="btmodifier"   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                        
                                <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=planing/index" ><i class="material-icons">arrow_back</i></a>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</form>
</body>
</html>
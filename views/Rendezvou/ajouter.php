<?php

$num=$_SESSION['username'];
if( !empty($_POST))
{

    if(isset($_POST['btajouter']))
    {
        $intitule=$_POST["txtinti"];
        $date=$_POST["txtdate"];
        $time=$_POST['txtheure'];

        $values=[$intitule,$date,$time,$num,null];
            $m=new RendezvouModel();
            $m->insertrendezvous($values);
            echo "<script>alert(\"le rendez vous  est ajouter avec sucsse\")</script>"; 
        
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
    <title>Ajouter Laureat</title>
    <style type="text/css">
        .btn{
            background-color: #2a2185;
            color: white;
        } 
        .custom-centered{
                margin:0 auto;
                margin-bottom: 100px;
                margin-top: 80px;
                margin-left: 300px;
        }                  
    </style>
</head>
<body>
<div class="card text-dark bg-light mb-3" style="max-width: 95%; height:400px; margin-left:100px; margin-right:100px; margin-top:70px;">
    <div class="card-body">
        <div class="container"  style="margin-bottom:70px;">  
            <div class="col-sm-12" >
<form method="post" class="custom-centered" style="margin-top:90px;">
<div class="row g-3">
                        <div  class="col-5">
            <label for="txtNom" id="lblnum" name="lblnum"  class="col-form-label">intitule:</label>
                    <input type="text"   id="txtnum"  class="form-control" placeholder="saisir l'intitule" name="txtinti">

                    <label for="txtNom" id="lblnom" name="lblnom"  class="col-form-label">date:</label>
                    <input type="date"   id="txtNom"  class="form-control" placeholder="saisir la date" name="txtdate">

                    
                              
           
            <label for="txtprenom" id="lblprenom" name="lblprenom"class="col-form-label">heure:</label>
                    <input type="" class="form-control" name="txtheure"  placeholder="saisir le heure" >
            </div>  
            <div class="col-12">
                    <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit" class="btn"><i class="material-icons">add_box</i></button>
                  
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>
<?php
if( !empty($_POST))
{
    if(isset($_POST['btajouter']))
    {  
        $num=$_POST["txtnum"];
        $nom=$_POST["txtNom"];
        $type=$_POST["txttype"];
        $descript=$_POST['txtdesc'];
        $values=[$num,$nom, $type, $descript];
           
            $m=new medicamentModel();
            $m->insertmedicament($values); 
            echo "<script>alert(\"le medicament est ajouter avec sucsse\")</script>"; 
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
    <title>Ajouter Medicament</title>
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
<form method="post" class="custom-centered" style="margin-top:90px;">
<div class="row g-3">
                        <div  class="col-5">
            <label for="txtNom" id="lblnum" name="lblnum"  class="col-form-label">num:</label>
                    <input type="text"   id="txtnum"  class="form-control" placeholder="saisir le nom" name="txtnum">

                    <label for="txtNom" id="lblnom" name="lblnom"  class="col-form-label">nom:</label>
                    <input type="text"   id="txtNom"  class="form-control" placeholder="saisir le nom" name="txtNom">                              
            </div>    
             
            <div class="col-2"> 
            </div>
            <div class="col-5"> 
            <label for="txttype" id="lbltype" name="lbltype">type</label>
                    <input type="text" class="form-control" name="txttype" placeholder="saisir le  type">
                    
                    <label for="txtdesc" id="lbldesc" name="lbldesc"class="form-label">description:</label> 
                    <textarea class="form-control" name="txtdesc"></textarea>
            </div>
            <div class="col-12">
                    <button id="btajouter" data-toggle="tooltip" data-placement="top" title="Ajouter" name="btajouter" type="submit" class="btn"><i class="material-icons">add_box</i></button>
                  
            </div> 
        </div>  
    </div>  
</form>
</body>
</html>
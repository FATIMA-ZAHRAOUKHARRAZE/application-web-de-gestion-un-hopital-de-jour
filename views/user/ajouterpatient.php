<?php
$id="";
$nom="";
$prenom="";
$tele="";
$email="";
if( !empty($_POST))
    {
        if(isset($_POST['ajouterpatient']))
        {
                $id=$_POST['txtid'];
                $nom=$_POST['txtnom'];
                $prenom=$_POST['TXTprenom'];
                $tele=$_POST['tele'];
                $email=$_POST['email'];
                

        $value=[$id,$nom,$prenom,$tele,$email];
        $sql="select * from users where username =?";
		$model=new UserModel();
		$res=$model->requete( $sql,[$id]);
		$user=$model->getOne($res);
        if ($user)
        {
            echo "<script>alert(\"se compte est deja pris\")</script>";
        }
        else{
        $password =password_hash( $_POST['txtpassword'], PASSWORD_BCRYPT );
        $username=$_POST['txtid'];
        $role="patient";
        $valide=1;
        $values=[$username,$password,$role,$valide];
        $m=new UserModel();
        $m->insertuser($values);
        $m=new UserModel();
        $m->InsertPatient($value);
        echo "<script>alert(\"le compte est ajouter en succes\")</script>";
        header('location: index.php?page=user/login1');
        }
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
    <title>Ajouter Patient</title>
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
                <form method="post" name="FRMDIPLOME"  style="margin-top:20px; margin-left:100px;">
                    <div class="row g-3">
                        <div  class="col-5">
                            <label for="txtid" id="LBLid"  name="LBLid">Num patient</label>
                            <input type="text" id="txtid" name="txtid"placeholder="saisir votre num" class="form-control">
     
                            <label for="txtnom" id="LBLNOM"  name="LBLNOM">Nom patient </label>
                            <input type="text" id="txtnom" name="txtnom" placeholder="saisir votre nom" class="form-control">
      
                            <label for="TXTprenom" id="LBLprenom"  name="LBLprenom" > Prenom patient</label>
                            <input type="text" id="TXTprenom" name="TXTprenom" placeholder="saisir prenom" class="form-control" >
                            <label for="tele">  Telephone De L'patient</label>
                            <input type="text" id="tele" name="tele"  placeholder="saisir telephone" class="form-control">
        
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
      
                           
                            <label for="email" id="email" name="email"> Email De L'patient</label>
                            <input type="email" id="email" name="email" placeholder="saisir email" class="form-control" >
        
                            <label for="txtpassword" id="lblpassword" name="lblpassword" class="form-label">password:</label>
                    <input type="password" class="form-control" name="txtpassword"  placeholder="saisir le telephone">

                    
                        </div>
                        <div class="col-1"></div>    
                    </div> 
                    <br>
                    <button type="submit" id="bntajouter" name="ajouterpatient" class="btn"> <i class="material-icons">add</i></button>                 </form>
            </div> 
        </div> 
    </div> 
</div> 
</html>
 
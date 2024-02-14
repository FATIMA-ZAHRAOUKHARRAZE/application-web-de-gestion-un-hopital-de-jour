<?php
$username="";
$password="";
$role="";
$valide="";
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $username=$_POST['username'];
                $role=$_POST['role'];
                $valide=$_POST['valide'];

               $values=[$username,$role,$valide,$id];
               $m=new UserModel();
                $m->updateuser($values);   
                header('Location:index.php?page=user/index');
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
    <title> Afficher User</title>
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
                                <label for="txtusername" id="lblusername" name="lblusename" class="form-label">Username</label>
                                <input type="text"  class="form-control"  placeholder="saisir le username" value="<?=$user->username ?>" name="username">

                
                                <label for="txtrole" id="lblrole" name="lblrole" class="form-label">Role</label>
                                <input type="text"  class="form-control"  placeholder="saisir le role" value="<?=$user->role ?>" name="role">

                                <label for="txtvalide" id="lblvalide" name="lblvalide" class="form-label">Valide</label>
                                <input type="text"  class="form-control"  placeholder="saisir la valide" value="<?=$user->valide ?>" name="valide">
                
                            </div> 
                <div class="col-12">
                       
                                <button  id="btmodifier"   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                        
                                <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=user/index" ><i class="material-icons">arrow_back</i></a>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</form>
</body>
</html>
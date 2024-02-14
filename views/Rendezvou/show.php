<?php
if(isset($_GET['id'])){   
        $id=$_GET['id'];
        if(isset($_POST['modifier'])){
                $num=$_SESSION['username'];
                $intitule=$_POST['intitule'];
                $date=$_POST['date'];
                $heure=$_POST['heure'];
                $values=[$intitule,$date,$heure,$id];
                $m=new RendezvouModel();
                $m->Updaterendezvous($values);
                echo "<script>alert(\"la rendez vous  est modifier\")</script>";
                if(isset($_SESSION['logged']) && $_SESSION['role']=='patient')
                {
                header('location:index.php?page=rendezvou/patient&id='.$num);
                }
               
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
    <title>Afficher Lauréat</title>
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
                                <label for="txtNom" id="lblnom" name="lblnom">intitule:</label>
                                <input type="text" id="txtNom" class="form-control" placeholder="saisir l'intitule" value="<?=$rendezvous->intitule_rv?>" name="intitule">

                                <label for="txtprenom" id="lblprenom" name="lblprenom">date:</label>
                                <input type="date" class="form-control"   placeholder="saisir la date " value="<?= $rendezvous->date_rv?>" name="date">
                        
                                <label for="txtdate" id="lbldate" name="lbldate">heure:</label>
                                <input type="text" class="form-control"  placeholder="saisir l'heure " value="<?=$rendezvous->heure_rv ?>" name="heure">
                                </div>     
                <div class="col-2"> 
                </div>
                <div class="col-5"> 
                </div>
                <div class="col-12">
                <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='patient')
                                                {
                                                                    ?>
                                        <button  id="btmodifier"  class="btn" data-toggle="tooltip" data-placement="top" title="Modifier" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                <?php
                                                }
                                                ?>
                                            <?php
                                             if(isset($_SESSION['logged']) && $_SESSION['role']=='infirmier')
                {
                        ?>
                                <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=rendezvou/index" class="text-light" ><i class="material-icons">arrow_back</i></a>
<?php
                }
                ?>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
   </div>
</form>
</body>
</html>




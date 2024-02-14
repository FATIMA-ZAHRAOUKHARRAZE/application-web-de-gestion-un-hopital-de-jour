<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
        echo "<h3 style='color:black;text-align:center'>liste vide des rendez vous  <h3>";
    }
        
    else
    {
        if ( $nombre == 1 )
        {
            $rendezvous = $liste[0];
?>
<?php
if(!empty($_POST)){      
    if(isset($_POST['modifier'])){  
        $id=$rendezvous->id;
                $intitule=$_POST['intitule'];
                $date=$_POST['date'];
                $heure=$_POST['heure'];
                $values=[$intitule,$date,$heure,$id];
                $m=new RendezvouModel();
                $m->Updaterendezvous($values);
                echo "<script>alert(\"la rendez  vous  est modifier\")</script>";   
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
    <title>Afficher rendez vous </title>
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
                                        echo'
                                        <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=rendezvou/delete&id='.$rendezvous->id.'" ><i class="material-icons">delete_forever</i></a>
                                        ';
                                               
                                            ?>
                                <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=rendezvou/index" class="text-light" ><i class="material-icons">arrow_back</i></a>

                </div>
        </div>
        <div class="col-sm-1">
        </div>
   </div>
</form>
</body>
</html>
<?php
              }
        else
        {
?>
 <?php

require_once 'models/patientModel.php';
function getpatient($id)
{
    $patient=new patientModel();
    $patient=$patient->getPatientById($id);
    return $patient->email_patient;
    var_dump($patient);die;

}
    if(!empty($_POST))
    {
        if(isset($_POST['chercher']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=rendezvou/chercher&param='.$value);
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
    <title>Tableau Rendez vous</title>
    <style>
        .btn{
        background-color: #2a2185;
        color: white;
                        }
                        .matable
        {
            margin-left: 40px;
            margin-right: 40px;
        }
        
        </style>
</head>
<body>
        <div class='matable' style="margin-top: 80px;">
            <caption>
                <h3 style="text-align:center; color:black">Liste Des Rendez Vous</h3>
            </caption>
            <div class="table-responsive">
                <table  class='table table-bordered '>
                    <thead >
                        <?php
                            if(count($liste)>0){
                                $liste_indice=array_keys((array)$liste[0]);
                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                ?>
                                
                                <th scope='col'>num</th>
                                <th scope='col'> intitule</th>
                                <th scope='col'> date </th>
                                <th scope='col'> heure</th>
                                <th scope='col'>nom patient</th>
                                <?php
                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                echo"</tr>";
                            }
                            ?>
                    </thead>
                    <tbody> 
                    <?php 
                            foreach( $liste as $rendezvous )
                            {
                                echo "<tr class='table-active'>";
                                    echo "<td style='text-align:center'>";
                                        echo $rendezvous->id;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $rendezvous->intitule_rv;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $rendezvous->date_rv;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $rendezvous->heure_rv;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $rendezvous->id_patient;
                                    echo "</td>";                                    
                                    echo'<td style="text-align:center;width:160px;">
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=rendezvou/show&id='.$rendezvous->id.'" ><i class="material-icons">visibility</i></a>
                                        ';
                                        
                                        echo'
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=rendezvou/delete&id='.$rendezvous->id.'" ><i class="material-icons">delete_forever</i></a>
                                            ';
                                    echo' </td>';
                                echo "</tr>";
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
   
</body>
</html>
<?php
        }
    }
?>
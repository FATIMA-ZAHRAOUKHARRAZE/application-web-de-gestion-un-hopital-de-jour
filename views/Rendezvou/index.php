<?php

require_once 'models/patientModel.php';


    if(!empty($_POST))
    {
        if(isset($_POST['chercher']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=rendezvou/chercher&param='.$value);
        }
    }  
    function getpatient($id)
    {
        $patient=new patientModel();
        $patient=$patient->getPatientById($id);
        return $patient->nom_patient;
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
    <form  class="mb-4" method="post"style="margin-top: 20px;" >
    
        
        
    
        <input type="text"  name="chercher_value" style="float: left;margin-left:10px;" > 
        <button style="float: left;margin-left:10px;height:30px"  data-toggle="tooltip" data-placement="top" title="Chercher"class="btn"name="chercher" type="submit"><i class="material-icons">search</i>
        </button>
    </form>
  
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
                                <th scope='col'>num patient</th>
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
                                //$id=$rendezvous->id;
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
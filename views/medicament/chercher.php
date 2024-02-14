<?php
    $nombre = count($liste);

    if ( $nombre == 0 ){
        echo "<h3 style='color:black;text-align:center'>liste vide des medicaments <h3>";
    
    }
        
    else
    {
        if ( $nombre == 1 )
        {
            $medicament = $liste[0];
?>
<?php
                  if(!empty($_POST)){      
                    if(isset($_POST['modifier'])){ 
                           $id=$medicament->id;
                                   $nom=$_POST['nom'];
                                   $type=$_POST['type'];
                                   $description=$_POST['description'];
                                   $values=[$nom,$type,$description,$id];
                                   $m=new medicamentModel();
                                   $m->Updatemedicament($values);
                                   echo "<script>alert(\"le medicament est modifier\")</script>";
                                   header('Location:index.php?page=medicament/index');
                                  
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
                       <title>Afficher Medicament</title>
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
                                           
                                                   <label for="txtNom" id="lblnom" name="lblnom">nom:</label>
                                                   <input type="text" id="txtNom" class="form-control" placeholder="saisir le nom" value="<?=$medicament->nom_medicament?>" name="nom">
                   
                                                   <label for="txtprenom" id="lblprenom" name="lblprenom">type:</label>
                                                   <input type="text" class="form-control"   placeholder="saisir le type" value="<?= $medicament->type_medicament?>" name="type">
                                           
                                                   <label for="txtdate" id="lbldate" name="lbldate">description:</label>
                                                   <input type="texte" class="form-control"  placeholder="saisir description" value="<?=$medicament->description_medicament ?>" name="description">
                                                   
                                                   </div>     
                                   
                                   <div class="col-12">
                                    <?php
                                   if(isset($_SESSION['logged']) && $_SESSION['role']=='rstock')
                                                {
                                                    ?>
                                                           <button  id="btmodifier"  class="btn" data-toggle="tooltip" data-placement="top" title="Modifier" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                                <?php
                                                        } 
                                                        ?>
                                                   <a class="btn"  data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=medicament/index" class="text-light" ><i class="material-icons">arrow_back</i></a>
                                                  
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
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Tableau Medicament</title>
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
                <h3 style="text-align:center; color:black">Liste Des Medicaments</h3>
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
                                <th scope='col'> nom</th>
                                <th scope='col'> type </th>
                                <th scope='col'>description</th>
                                <?php
                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                echo"</tr>";
                            }
                            ?>
                    </thead>
                    <tbody> 
                    <?php 
                            foreach( $liste as $medicament )
                            {
                                echo "<tr class='table-active'>";
                                    echo "<td style='text-align:center'>";
                                        echo $medicament->id;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $medicament->nom_medicament;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $medicament->type_medicament;
                                    echo "</td>";
                                    echo "<td style='text-align:center'>";
                                        echo $medicament->description_medicament;
                                    echo "</td>";
                                    echo'<td style="text-align:center;width:160px;">
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=medicament/show&id='.$medicament->id.'" ><i class="material-icons">visibility</i></a>
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
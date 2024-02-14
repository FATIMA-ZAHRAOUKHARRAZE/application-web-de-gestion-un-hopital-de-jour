<?php
    $nombre = count($rendezvous);
    if ( $nombre == 0 )
        {
            echo "<h3 style='color:#2a2185;text-align:center'>liste vide des rendez vous<h3>";
        ?>

        <!---<a class="btn" style="background-color: #2a2185;color: white;margin-left:20px" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=Rendezvou/show&id=<?= $patient->id ?>"  style="margin-bottom: 20px;"><i class="material-icons">arrow_back</i></a>--->
     <?php
        }
    else
    {
        if ( $nombre == 1 )
        {
            $rendezvous = $rendezvous[0];
?>
<?php
                    if(!empty($_POST)){      
                        if(isset($_POST['modifier'])){
                            $num=$_SESSION['username'];
                            $id=$rendezvous->id;
                                $intitule=$_POST['intitule'];
                                $date=$_POST['date'];
                                $heure=$_POST['heure'];
                                $values=[$intitule,$date,$heure,$id];
                                $m=new RendezvouModel();
                                $m->Updaterendezvous($values);   
                                echo "<script>alert(\"le rendez vous  est modifier\")</script>";
                                header('location:index.php?page=rendezvou/patient&id='.$num);
                                
                        }
                    }
?>    
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <title> Afficher Formation</title>
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
                                            <label for="txtnom" id="lblnom" name="lblnom" class="form-label"> intitule: </label>
                                            <input type="text"  class="form-control" placeholder="saisir le nom " value="<?=$rendezvous->intitule_rv ?>" name="intitule">
                                    
                                            <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label"> date:</label>
                                            <input type="date" class="form-control"  placeholder="saisir la durée" value="<?=$rendezvous->date_rv?>" name="date">
                                    
                                            <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">heure:</label> 
                                            <input type="text" class="form-control"   placeholder="saisir le genre" value="<?=$rendezvous->heure_rv?>" name="heure">
                                    </div>
                                    <div class="col-12">
                                    <?php
                                                if(isset($_SESSION['logged']) && $_SESSION['role']=='patient')
                                                {
                                                                    ?>
                                        <button  id="btmodifier"  class="btn" data-toggle="tooltip" data-placement="top" title="Modifier" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
                                       <?php
                                        echo'
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=rendezvou/delete&id='.$rendezvous->id.'" ><i class="material-icons">delete_forever</i></a>
                                            ';
                                
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
                
                        <div class='container'>
                            <div class='matable' style="margin-top: 80px;">
                                <table  class='table table-bordered'>
                                    <thead>
                                        <?php
                                            if(count($rendezvous)>0){
                                                $liste_indice=array_keys((array)$rendezvous[0]);
                                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                                ?>
                                
                                                <th scope='col'>num</th>
                                                <th scope='col'> intitule</th>
                                                <th scope='col'> date </th>
                                                <th scope='col'> heure</th>
                                                <?php
                                               
                                                echo "<th class='text-center'style='width:160px;'> Operations</th>";
                                            
                                                echo"</tr>";
                                            }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $rendezvous as $rendezvous )
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
                                                    
                                                    echo'<td style="text-align:center;width:160px;">
                                                            <a data-toggle="tooltip" data-placement="top" title="Afficher" class="btn" href="index.php?page=rendezvou/show&id='.$rendezvous->id.'"><i class="material-icons">visibility</i></a>
                                                        ';
                                                        
                                                        echo'<a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=rendezvou/delete&id='.$rendezvous->id.'"><i class="material-icons">delete_forever</i></a>
                                                            ';
                                                    echo' </td>';
                                                } 
                                                echo "</tr>";
                                           
                                                
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
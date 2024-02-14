<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
       echo "<h3 style='color:black;text-align:center'>liste vide des planings<h3>";
    }
    else
    {
        if ( $nombre == 1 )
        {
            $planing = $liste[0];
?>
<?php
$intitule="";
$datedebut="";
$datefin="";

if(!empty($_POST)){      
    if(isset($_POST['modifier'])){
        $id=$planing->id;
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
                                <?php
                                        echo'
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=planing/delete&id='.$planing->id.'" ><i class="material-icons">delete_forever</i></a>
                                            ';
                                
                                                
                                            ?>
                                <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=planing/index" ><i class="material-icons">arrow_back</i></a>
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
                <title>Tableau Planing</title>
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
                    <caption>
                <h3 style="text-align:center; color:black">Liste Des Planing</h3>
            </caption>
                        <div class="table-responsive">
                            <table  class='table table-bordered '>
                                <thead style="color:#e74c3c">
                                    <?php
                                        if(count($liste)>0){
                                            $liste_indice=array_keys((array)$liste[0]);
                                            echo "<tr style='color:#2a2185;text-align:center' class='table-active'>";
                                            ?>
                                            <th scope='col'>num</th>
                                            <th scope='col'> intitule</th>
                                            <th scope='col'> date debut </th>
                                            <th scope='col'>date fin</th>
                                            <th scope='col'>num medecin</th>
                                            <?php
                                            echo "<th class='text-center'style='width:160px;'>Operations</th>";
                                            echo"</tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach( $liste as $planing )
                                            {
                                                echo "<tr  class='table-active'>";
                                                echo "<td style='text-align:center'>";
                                                echo $planing->id;
                                            echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $planing->intitule_planing;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $planing->datedebut_planing;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $planing->datefin_planing;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                    echo $planing->id_medecin;
                                                echo "</td>";
                                                    echo'<td style="text-align:center;width:160px;">
                                                            <a  class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=planing/show&id='.$planing->id.'" ><i class="material-icons">visibility</i></a>
                                                        ';
                                                        echo'<a  class="btn"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=planing/delete&id='.$planing->id.'" ><i class="material-icons">delete_forever</i></a>
                                                            ';
                                                    echo' </td>';
                                                echo "</tr>";
                                            }
                                    ?>                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </body>
            </html>             
<?php
        }
    }
?>
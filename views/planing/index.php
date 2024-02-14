<?php
    if( !empty($_POST))
    {
        if(isset($_POST['chercherplaning']))
        {
            $value = $_POST['chercher_value'];
            header('Location:index.php?page=planing/chercherplaning&param='.$value);
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
    <title>Tableau planing</title>
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
    <form  class="mb-4" method="post"style="margin-top: 20px;">
    
       
        <input type="text"  name="chercher_value" style="float: left;margin-left:10px"> 
        <button style="float: left;margin-left:10px;height:30px" data-toggle="tooltip" data-placement="top" title="Chercher"  class="btn "name="chercherplaning" type="submit"><i class="material-icons">search</i>
        </button>
    </form>
            <div class='container'>
                <div class='matable' style="margin-top: 80px;">
                    <caption>
                        <h3 style="text-align:center; color:black">Liste Des planings</h3>
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
                            <tbody >
                                <?php
                                        foreach( $liste as $planing )
                                        {
                                            echo "<tr class='table-active'>";
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
                                                    <a class="btn"  data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=planing/show&id='.$planing->id.'"><i class="material-icons">visibility</i></a>
                                                    ';
                                                   
                                                    echo'
                                                    <a class="btn"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=planing/delete&id='.$planing->id.'"><i class="material-icons">delete_forever</i></a>
                                                        ';
                                            echo' </td>';
                                        }  
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
</body>
</html>

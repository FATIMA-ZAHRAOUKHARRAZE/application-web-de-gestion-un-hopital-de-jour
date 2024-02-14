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
            $medecin = $liste[0];
?>


            <!DOCTYPE html>
            <html >
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <title> Afficher Medecin</title>
                <style type="text/css">
                    .custom-centered{
                margin:0 auto;
                margin-bottom: 100px;
                margin-top: 80px;
                margin-left: 300px;
        }
                    .btn{
                            background-color:#2a2185;
                            color: white;
                    }
                </style>
            </head>
            <body>
            <form method="post" class="custom-centered">
            <div class="container">
                    <div class="row g-1 align-items-center">
                            <div class="col-5">
                                            <label for="nom" id="lblnom" name="lblnom" class="form-label">nom:</label>
                                            <input type="text"  class="form-control"  placeholder="saisir nom" value="<?=$medecin->nom_medecin ?>" name="nom">

                                            <label for="prenom" id="lblprenom" name="lblprenom"  class="form-label">prenom:</label>
                                            <input type="text" class="form-control"   placeholder="saisir prenom" value="<?=$medecin->prenom_medecin?>" name="prenom">

                                            <label for="tele" id="lbltele" name="lbltele"  class="form-label">tele:</label>
                                            <input type="text" class="form-control"   placeholder="saisir telephone" value="<?=$medecin->tel_medecin?>" name="tele">

                                            <label for="email" id="lblemail" name="lblemail"  class="form-label">email:</label>
                                            <input type="email" class="form-control"   placeholder="saisir email" value="<?=$medecin->email_medecin?>" name="datefin">
                            </div>
                            <div class="col-12">           
             <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=medecin/index" ><i class="material-icons">arrow_back</i></a>
          
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
                <title>Tableau Medecin</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <style>
                    .btn{
                    background-color: #337ab7;
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
                <h3 style="text-align:center; color:black">Liste Des Medecins</h3>
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
                                        <th scope='col'>nom</th>
                                        <th scope='col'> prenom </th>
                                        <th scope='col'> tel</th>
                                        <th scope='col'>email</th>
                                        <?php
                                            echo"</tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach( $liste as $medecin )
                                            {
                                                echo "<tr  class='table-active'>";
                                                echo "<td style='text-align:center'>";
                                                echo $medecin->id;
                                            echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $medecin->nom_medecin;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $medecin->prenom_medecin;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $medecin->tel_medecin;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $medecin->email_medecin;
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                    ?>
                                                                    </tbody>
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
<?php
    $nombre = count($planing);
    if ( $nombre == 0 )
        {
            echo "<h3 style='color:black;text-align:center'>liste vide des planings<h3>";
        ?>
     <?php
        }
    else
    {
        if ( $nombre == 1 )
        {
            $planing = $planing[0];
?>   
            <!DOCTYPE html>
            <html>
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
                                    <div class="col-6">
                                            <label for="txtnom" id="lblnom" name="lblnom" class="form-label"> intitule: </label>
                                            <input type="text"  class="form-control" placeholder="saisir le planing " value="<?=$planing->intitule_planing ?>" name="intitule">
                                    
                                            <label for="txtdurée" id="lbldurée" name="lbldurée" class="form-label"> date debut:</label>
                                            <input type="date" class="form-control"  placeholder="saisir la date debut" value="<?=$planing->datedebut_planing?>" name="date">
                                    
                                            <label for="txtgenre" id="lblgenre" name="lblgenre" class="form-label">date fin:</label> 
                                            <input type="date" class="form-control"   placeholder="saisir le date fin " value="<?=$planing->datefin_planing?>" name="heure">

                                            
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
                    </style>
                </head>
                <body>
                
                        <div class='container'>
                            <div class='matable' style="margin-top: 80px;">
                            <caption>
                        <h3 style="text-align:center; color:black">Liste Des planings</h3>
                    </caption>
                                <table  class='table table-bordered'>
                                    <thead>
                                        <?php
                                            if(count($planing)>0){
                                                $liste_indice=array_keys((array)$planing[0]);
                                                echo "<tr class='table-active'style='color:#2a2185;text-align:center'>";
                                                ?>
                                
                                                <th scope='col'>num</th>
                                                <th scope='col'> intitule</th>
                                                <th scope='col'> date debut  </th>
                                                <th scope='col'>date fin </th>
                                                <?php
                                            
                                                echo"</tr>";
                                            }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $planing as $planing )
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
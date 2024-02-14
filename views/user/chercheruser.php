<?php
    $nombre = count($liste);

    if ( $nombre == 0 )
    {
       echo "<h3 style='color:black;text-align:center'>liste vide des users<h3>";
      
    }
    else
    {
        if ( $nombre == 1 )
        {
            $user = $liste[0];
?>
<?php
                        $username="";
                        $role="";
                        $valide="";
                        if(!empty($_POST)){      
                            if(isset($_POST['modifier'])){
                                $id=$user->id;
                                        $username=$_POST['username'];
                                        $role=$_POST['role'];
                                        $valide=$_POST['valide'];
                                        $values=[$username,$role,$valide,$id];
                                        $m=new UserModel();
                                        $m->UpdateUser($values);   
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
                <title> Afficher user</title>
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
                                            <label for="username" id="lblusername" name="lblusername" class="form-label">username:</label>
                                            <input type="text"  class="form-control"  placeholder="saisir username" value="<?=$user->username?>" name="username">

                                            <label for="role" id="lblrole" name="lblrole"  class="form-label">role:</label>
                                            <input type="text" class="form-control"   placeholder="saisir role" value="<?=$user->role?>" name="role">

                                            <label for="valide" id="lblvalide" name="lblvalide"  class="form-label">valide:</label>
                                            <input type="text" class="form-control"   placeholder="saisir date fin" value="<?=$user->valide?>" name="valide">
                            </div>
                            <div class="col-12">
                            
            <button  id="btmodifier"   data-toggle="tooltip" data-placement="top" title="Modifier" class="btn" name="modifier" type="submit" ><i class="material-icons">edit</i></button>
           <?php
            echo'
                                            <a class="btn" data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=user/delete&id='.$user->id.'" ><i class="material-icons">delete_forever</i></a>
                                            ';
                                            ?>
             <a class="btn" data-toggle="tooltip" data-placement="top" title="Annuler" href="index.php?page=user/index" ><i class="material-icons">arrow_back</i></a>
          
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
                <title>Tableau user</title>
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
                        <h3 style="text-align:center; color:black">Liste Des Users</h3>
                    </caption>
                        <div class="table-responsive">
                            <table  class='table table-bordered '>
                                <thead style="color:#e74c3c">
                                    <?php
                                        if(count($liste)>0){
                                            $liste_indice=array_keys((array)$liste[0]);
                                            echo "<tr style='color:#2a2185;text-align:center' class='table-active'>";
                                            ?>
                                        <th scope='col'>username</th>
                                        <th scope='col'>role</th>
                                        <th scope='col'>validation</th>
                                      <?php
                                            echo "<th class='text-center'style='width:160px;'>Operations</th>";
                                            echo"</tr>";
                                        }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach( $liste as $user )
                                            {
                                                echo "<tr  class='table-active'>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $user->username;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $user->role;
                                                    echo "</td>";
                                                    echo "<td style='text-align:center'>";
                                                        echo $user->valide;
                                                    echo "</td>";
                                                    echo'<td style="text-align:center;width:160px;">
                                                            <a  class="btn" data-toggle="tooltip" data-placement="top" title="Afficher" href="index.php?page=user/show&id='.$user->id.'" ><i class="material-icons">visibility</i></a>
                                                        ';
                                                        echo'<a  class="btn"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="index.php?page=user/delete&id_user='.$user->id.'" ><i class="material-icons">delete_forever</i></a>
                                                            ';
                                                    echo' </td>';
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
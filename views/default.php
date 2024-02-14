<?php
require_once 'database.php';
if(isset($_SESSION['logged']))
{
  $num=$_SESSION['username'];

  if ( !empty( $_POST)&& $this->model)
    {
        if ( isset( $_POST['prev']))
            $this->model->pagination->prev();
        
        if ( isset( $_POST['next']))
            $this->model->pagination->next();
    }  
}
$connection = mysqli_connect('localhost','root','','hopitaljour');
$sclcountn="select count(*) from medecins";
$rescountM= mysqli_query($connection,$sclcountn);
$nbrnotificaton=mysqli_fetch_array($rescountM)[0];
$nbrm=0;
$nbrm=$nbrm+$nbrnotificaton;
$sclcountn="select count(*) from infirmiers";
$rescountM= mysqli_query($connection,$sclcountn);
$nbrnotificaton=mysqli_fetch_array($rescountM)[0];
$nbrni=0;
$nbrni=$nbrni+$nbrnotificaton;
$sclcountn="select count(*) from 	patients";
$rescountM= mysqli_query($connection,$sclcountn);
$nbrnotificaton=mysqli_fetch_array($rescountM)[0];
$nbrnp=0;
$nbrnp=$nbrnp+$nbrnotificaton;
$sclcountn="select count(*) from 	medecin_pharmacies";
$rescountM= mysqli_query($connection,$sclcountn);
$nbrnotificaton=mysqli_fetch_array($rescountM)[0];
$nbrnmp=0;
$nbrnmp=$nbrnmp+$nbrnotificaton;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="views/style.css">
</head>
<style>
  /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --blue: #2a2185;
  --white: #fff;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 100vh;
  overflow-x: hidden;
}

.container {
  position: relative;
  width: 100%;
}

/* =============== Navigation ================ */
.navigation {
  position: fixed;
  width: 300px;
  height: 100%;
  background: var(--blue);
  border-left: 10px solid var(--blue);
  transition: 0.5s;
  overflow: hidden;
 
}
.navigation.active {
  width: 80px;
}

.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
 
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  right: 40PX;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: var(--white);
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: var(--blue);
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 75px;
  text-align: center;
}
.navigation ul li a .icon ion-icon {
  font-size: 1.75rem;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* --------- curve outside ---------- */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before {
  content: "";
  position: absolute;
  right: 0;
  top: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px 35px 0 10px var(--white);
  pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px -35px 0 10px var(--white);
  pointer-events: none;
}

/* ===================== Main ===================== */
.main {
  position: absolute;
  width: calc(100% - 300px);
  left: 300px;
  min-height: 100vh;
  background: var(--white);
  transition: 0.5s;
}
.main.active {
  width: calc(100% - 80px);
  left: 80px;
}

.topbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 10px;
}

.toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: relative;
  width: 400px;
  margin: 0 10px;
}

.search label {
  position: relative;
  width: 100%;
}

.search label input {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  padding: 5px 20px;
  padding-left: 35px;
  font-size: 18px;
  outline: none;
  border: 1px solid var(--black2);
}

.search label ion-icon {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 1.2rem;
}

.user {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}
.userr {
  position: relative;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.user img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ======================= Cards ====================== */
.cardBox {

  position: relative;
  width: 100%;
  padding: 30px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 1px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 20px;
  color: var(--blue);
  margin-left:80px;
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
  margin-left:50px;
}

.cardBox .card .iconBx {
  font-size: 1.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}


/* ====================== Responsive Design ========================== */
@media (max-width: 991px) {
  .navigation {
    left: -300px;
    
  }
  .navigation.active {
    width: 300px;
    left: 0;
  }
  .main {
    width: 100%;
    left: 0;
  }
  .main.active {
    left: 300px;
  }
  .cardBox {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .details {
    grid-template-columns: 1fr;
  }
  .recentOrders {
    overflow-x: auto;
  }
  .status.inProgress {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
  .cardBox {
    grid-template-columns: repeat(1, 1fr);
  }
  .cardHeader h2 {
    font-size: 20px;
  }
  .user {
    min-width: 40px;
  }
  
  .navigation {
    width: 100%;
    left: -100%;
    z-index: 1000;
  }
  .navigation.active {
    width: 100%;
    left: 0;
  }
  .toggle {
    z-index: 10001;
  }
  .main.active .toggle {
    color: #fff;
    position: fixed;
    right: 0;
    left: initial;
  }
}
</style>
<body>
    <!-- =============== Navigation ================ -->
   
    <?php
if(isset($_SESSION['logged']))
{
    ?>
        <div class="navigation">
          <!-- =============== Infirmier ================ -->
          <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='infirmier')
            {
        ?>
            <ul>
                <li>
                <a href="#">
                <div>
                </div>
                        <span class="title">Infirmier</span>
                    </a>
                </li>
                
                <li>
                    <a href="index.php?page=rendezvou/index">
                    <span class="icon">
                        <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title"> Liste Rendez_Vous</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>


          <!-- =============== medecin ================ -->
          <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='medecin')
            {
        ?>
            <ul>
                <li>
                <a href="#">
                <div>
                </div>
                        <span class="title">Medecin</span>
                    </a>
                </li>
                <li>
                <?php echo'<a href="index.php?page=planing/medecin&id='.$num.'">';?>
                <span class="icon">
                        <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title">Liste Planing</span>
                    </a>
                </li>     
                <li>
                    <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>
     <!-- =============== Administration ================ -->
     <?php
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' )
            {
        ?>
            <ul>
                <li>
                    <a href="#">
                        
                        <span class="title">Administration</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=user/index">
                    <span class="icon">
                        <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title">Liste User</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=user/ajouterinfirmier">
                        <span class="icon">
                            <ion-icon name="add-circle" ></ion-icon>
                        </span>
                        <span class="title">Ajouter Infirmier</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=user/ajoutermedecin">
                        <span class="icon">
                            <ion-icon name="add" ></ion-icon>
                        </span>
                        <span class="title">Ajouter Medecin</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=user/ajoutermedecinchef">
                        <span class="icon">
                            <ion-icon name="add-circle" ></ion-icon>
                        </span>
                        <span class="title">Ajouter Medecin Chef</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=user/ajoutermedecinpharmacie">
                        <span class="icon">
                            <ion-icon name="add" ></ion-icon>
                        </span>
                        <span class="title">Ajouter Medecin Pharmacie</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=user/ajouterresponsablestock">
                        <span class="icon">
                            <ion-icon name="add-circle" ></ion-icon>
                        </span>
                        <span class="title">Ajouter Responsable Stock</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li> 
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                            <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>
            <!---====Medecin Chef===-->
            <?php 
    if(isset($_SESSION['logged']) && $_SESSION['role']=='Medecinchef')
            {
        ?>
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="delete"></ion-icon>
                        </span>
                        <span class="title">Medecin Chef</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=medecin/index">
                        <span class="icon">
                        <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="title">Liste Medecin</span>
                    </a>
                </li> 
                <li>
                <a href="index.php?page=planing/index">
                        <span class="icon">
                        <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title">Liste Planing</span>
                    </a>
                </li> 
               <li>
                <a href="index.php?page=planing/ajouterplaningmedecinchef">
                        <span class="icon">
                        <ion-icon name="add-circle"></ion-icon>
                        </span>
                        <span class="title">Ajouter planing medecin</span>
                    </a>
                </li> 
                <li>
                <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li> 
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>

                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>
            <!---====Medecin pharmacie===-->
            <?php 
    if(isset($_SESSION['logged']) && $_SESSION['role']=='mpharmacie')
            {
        ?>
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Medcin Pharmacie</span>
                    </a>
                </li>
                
                <li>
                <?php echo'<a href="index.php?page=medicament/index">';?>
                        <span class="icon">
                        <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="title">Liste Medicament</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li>  
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>

                <!---====patient===-->
                <?php 
    if(isset($_SESSION['logged']) && $_SESSION['role']=='patient')
            {
        ?>
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Patient</span>
                    </a>
                </li>
                
                <li>
                <?php echo'<a href="index.php?page=rendezvou/ajouter">';?>
                        <span class="icon">
                        <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="title">Prendre Rendez Vous</span>
                    </a>
                </li>

                <li>
                <?php echo'<a href="index.php?page=rendezvou/patient&id='.$num.'">';?>
                        <span class="icon">
                        <ion-icon name="document"></ion-icon>
                        </span>
                        <span class="title">Modifier Le rendez vous</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li>  
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>
        <!-- ========================= Responsable de Stock ==================== -->
        <?php 
    if(isset($_SESSION['logged']) && $_SESSION['role']=='rstock')
            {
        ?>
        </ul>
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Responsable stock</span>
                    </a>
                </li>
                
                <li>
                <?php echo'<a href="index.php?page=medicament/index">';?>
                <span class="icon">
                        <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title">Liste Medicament</span>
                    </a>
                </li>

                <li>
                <?php echo'<a href="index.php?page=medicament/ajouter">';?>
                <span class="icon">
                        <ion-icon name="person"></ion-icon>
                        </span>
                       
                        <span class="title">Ajouter Medicament</span>
                    </a>
                </li>
                <li>
                <a href="index.php?page=user/update">
                        <span class="icon">
                        <ion-icon name="key"></ion-icon>
                        </span>
                        <span class="title">Modifier Le Mot De Passe</span>
                    </a>
                </li>  
                <li>
                <a href="index.php?page=user/deconnecter">
                        <span class="icon">
                        <ion-icon name="log-out"></ion-icon>
                        </span>
                        <span class="title">Se Deconnecter</span>
                    </a>
                </li>  
            </ul>
            <?php
        }
    ?>
        </div>
        
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="user">
                   
                </div>
            </div>
            <!-- ======================= Cards ================== -->
            <?php
            
            
            if(isset($_SESSION['logged']) && $_SESSION['role']=='admin' || $_SESSION['role']=='direction')
            {
        ?>
            <div class="cardBox">
                <div class="card">
                    <div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                     
                    </div>
                    <div class="cardName">Medecin</div>
                        <div class="numbers">
                      
                          <?php 
                 
                echo $nbrm
            ?>
                         
                        </div>
                        
                    </div>

                 
                </div>
                <div class="card">
                 
                    <div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                 <div class="cardName"> Infirmier</div>
                        <div class="numbers">
                          <?php 
                 
                echo $nbrni
            ?>
                         
                        </div>
                       
                    </div>

                   
                </div>
                <div class="card">
                    <div>
                    
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <div class="cardName"> Medecin Pharmacie</div>
                        <div class="numbers">
                          <?php 
                 
                echo $nbrnmp
            ?>
                         
                        </div>
                       
                    </div>

                    
                </div>

                <div class="card">
                    <div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                    <div class="cardName"> Patient</div>
                        <div class="numbers">  <?php 
                 
                 echo $nbrnp
             ?></div>
                      
                    </div>

                  
                </div>


                
            </div>
            <?php
        }
    ?>

            <!-- ================ Order Details List ================= -->
            
  <?php
      }
      ?>          
                <!-- ================= New Customers ================ -->
                
                <?php   
            echo $view;
            ?> 
            <?php
        if($this->model && $this->model->pagination->istoshow){
            ?>
            <CENTER>
            <form method="POST" class="form">
                <button id="precedent" type="submit" class="btn"  name="prev" value="prev">precedent</button>
                <button id="next" type="submit" class="btn" name="next" value="next">suivant</button>
            </form></CENTER>
            <?php
        }
    ?>
      
    
    <!-- =========== Scripts =========  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="views/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

   
</script>
    <script>let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
</script>
</body>

</html>
<?php

require_once "config.php";
require_once "database.php";

$db = connect(DB_SERVER,USER,PASSWORD,DB_NAME);
session_start();




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard</title>
    <link
      rel="stylesheet"
      href="./bootstrap-5.1.3-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./fontawesome-free-6.0.0-web/css/all.css" />
  </head>
  <body>
    <form <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
      <section id="menu">
        <div class="logo">
          <h2>Student Dashboard</h2>
        </div>
  
        <div class="items">
          <li>
            <i class="fa-solid fa-chart-pie"></i
            ><a href="index.html">Dashboard</a>
          </li>
          <button class="button">
          <li>
          <i class="fa fa-download" ></i>See Transcript
          </li>
          </button>
          <li>
            <i class="fa-solid fa-right-from-bracket"></i
            ><a href="login.html">Log out</a>
          </li>
        </div>
      </section>
      <div class="container">
        <h1>Exam Card</h1>
        <hr>
  
       <?php
      
       
       if(isset($_POST['login'])){
        $_SESSION['admNo'] = $_POST['adm_num'];
        $student_id = select_studentId($db,$_SESSION['admNo']);
        foreach($student_id as $id){
           
           $sql = "SELECT `code`,`name` FROM student_course JOIN units on `code` = `unit_code` WHERE student_id =".$id['ID'];

        }
        $resultset = $db->query($sql);
       

        while ($row = $resultset->fetch_assoc()) {
            echo $row['code']." ".$row['name']."<input type = 'submit' value = 'Delete'".'<br>' .'<br>';
            
        }

      
    }elseif($_SESSION['admNo']!=null){
  echo "deleted";

    }
       ?>
      </div>
     
    </form>
 
  
    
    
 


    <script src="./bootstrap-5.1.3-dist/js/bootstrap.min.js">
    </script>
  </body>
</html>

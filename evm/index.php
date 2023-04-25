
<?php
  require "admin/dbC.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EVM</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="blur" class="container">
    <header>
        <div class="logo">
          <img src="img/ecLogo.png" >
          <h1>NAMMA ELECTIONS-2023</h1>
        </div>
      </header>
      

    <form class="main" action="<?php $_PHP_SELF; ?>" method="POST">

    <h2> Cast your vote here </h2>

      <ul class="leftBox">
        <li>
          <img src="img/bjp.png" alt="">
          <span>Bharatiya Janata Party</span>
        </li>

        <li>
          <img src="img/inc.png" alt="">
          <span>Indian National Congress</span>
        </li>

        <li>
          <img src="img/app.jpg" alt="">
          <span>Aam Aadmi Party</span>
        </li>

        <li  class="lf">
          <img src="img/aitc.png" alt="">
          <span>All India Trinamool Congress</span>
        </li>


        <li>
          <img src="img/cpi.png" alt="" >
          <span>Communist Party of India</span>
        </li>

        <li>
          <img src="img/ncp.png" alt="">
          <span>Nationalist Congress Party</span>
        </li>

        <li>
          <img src="img/bsp.png" alt="">
          <span>Bahujan Samaj Party</span>
        </li>

        <li>
          <img src="img/nota.png" alt="">
          <span>NONE OF THE ABOVE [Nota]</span>
        </li>

      </ul>


      <ul class="rightBox">
        <li>
          <button type="submit"  name="btn1" id="btnV1" class="btn_vote" onclick="lightOn(1)" >  </button>
          <button class="btn_light" id="light1"></button>
        </li>

        <li>
          <button type="submit" name="btn2" id="btnV2" class="btn_vote" onclick="lightOn(2)" >  </button >
          <button class="btn_light" id="light2"></button>
        </li>

        <li>
          <button type="submit" name="btn3" id="btnV3" class="btn_vote" onclick="lightOn(3)">  </button>
          <button class="btn_light" id="light3"></button>
        </li>

        <li>
          <button type="submit" name="btn4" id="btnV4" class="btn_vote" onclick="lightOn(4)">  </button>
          <button class="btn_light" id="light4"></button>
        </li>

        <li>
          <button type="submit" name="btn5" id="btnV5" class="btn_vote" onclick="lightOn(5)">  </button>
          <button name="" class="btn_light" id="light5"></button>
        </li>

        <li>
          <button type="submit" name="btn6" id="btnV6" class="btn_vote" onclick="lightOn(6)">  </button>
          <button name="" class="btn_light" id="light6"></button>
        </li>

        <li>
          <button type="submit" name="btn7" id="btnV7" class="btn_vote" onclick="lightOn(7)">  </button>
          <button name="" class="btn_light" id="light7"></button>
        </li>

        <li>
          <button type="submit" name="btn8" id="btnV8" class="btn_vote" onclick="lightOn(8)">  </button>
          <button name="" class="btn_light" id="light8"></button>
        </li>

      </ul>

      <h5 id="msg"></h5>
    </form>
</div>

    <div id="popup">
      <img src="img/tick.png" alt="">
        <h2>Thanks For Voting</h2>
        <p>Click here to view the live counting election result </p>
        <input type="button" id="button" value="View Result" onclick="window.location.href='results.php'"> </input>
    </div>




    <script>
      function lightOn(no) {
        document.getElementById("light"+no).style.backgroundColor="red";

        for(a=1;a<=8;a++){

          if(a==no){
            document.getElementById("btnV"+a).disabled = false;
          }
          else {
            document.getElementById("btnV"+a).style.background=" #1a5276";
            document.getElementById("btnV"+a).disabled = true;
            
          }
        }
      }

       function toggle() {
            var blur=document.getElementById('blur');
            blur.classList.toggle('active');
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>

  </body>
</html>

<?php

for($a=1; $a<=8; $a++){
  if(isset($_POST['btn'.$a.''])){
    $sql ="SELECT * from prt WHERE prtID=$a";

    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){

            $prtCount = $row['prtVoteTotal'];
            $prtCount=$prtCount+1;

            $sql ="UPDATE prt SET prtVoteTotal = $prtCount WHERE prtID=$a;";

            $query = mysqli_query($con, $sql);

            if($query){

              $sql ="SELECT * from prt WHERE prtID=$a";

              $result=mysqli_query($con, $sql);

              if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_assoc($result)){

                      $prtName = $row['prtNAME'];
                      echo"<script>
                      document.addEventListener('click', toggle());
                      </script>";

                      
                  }
              }

            }
            else{
                echo"Error:".$sql."<br>".$con->error;
            }
      }
    }
  }
}



?>

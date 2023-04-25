
<?php
  require "admin/dbC.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Live Results</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background: url(img/backg.jpg) no-repeat ;
        background-size: cover;
        

    }

    header {
  background: #1b1d29;
  padding: 0.5rem 0.5rem;
}

.logo {
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo h1,h2 {
  font-size: 2rem;
  background:none;
  
  font-family: "Montserrat", sans-serif;
  
}

section{
    background: #4fabbd8f;
    height:70px;


}
.logo h2 {
  color: black;
  margin: 0;
  font-weight: 1000;
}


.logo .img1 {
  margin-right: 1rem;
  width: 4rem;
}

.logo .img2{
  width: 9rem;


}


    
    table {
        position: absolute;
        left: 50%;
        top: 60%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        background: none;
        background: white;
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
        background:none;
        background: white;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        background:none;
    }
    
    #header {
        background-color: #4faabd;
        background-image: -webkit-linear-gradient(top, #4faabd, #1E62D0);
  background-image: -moz-linear-gradient(top, #4faabd, #1E62D0);
    background-image: -ms-linear-gradient(top, #4faabd, #1E62D0);
    background-image: -o-linear-gradient(top, #4faabd, #1E62D0);
    background-image: linear-gradient(to bottom, #4faabd, #1E62D0);
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #4faabd;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
</style>
  </head>

  <body>
    <header>
        <div class="logo">
          <img src="img/ecLogo.png" class="img1">
          <h1>NAMMA ELECTIONS-2023</h1>
        </div>
      </header>
      <section class="logo">
        <img src="img/live.gif" alt="" class="img2">
        <h2>Results</h2>
      </section>
    <table>
        <tr id="header">
        <th>ID</th>
        <th>PARTY Name</th>
        <th>Votes Total</th>
        </tr>
        <?php
        
        $sql = "SELECT prtID, prtNAME, prtVoteTotal from prt";
        $result = $con-> query($sql);

        if($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>". $row["prtID"] ."</td><td>". $row["prtNAME"]."</td><td>". $row["prtVoteTotal"]."</td></tr>";

            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }

        $con-> close();

        ?>

    </table>
  </body>
  </html>

  
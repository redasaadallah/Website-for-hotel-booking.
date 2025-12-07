<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
    background-image: url('../back2.png');
    background-size: cover; /* Ensures the image covers the entire div */
  background-position: center; /* Centers the image */
  background-repeat: no-repeat;
  background-attachment: fixed; 
  display:flex;
  flex-direction:column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  gap:20px;
}
.m1{
      border: groove 5px green;
      height: 160px;
      backdrop-filter: blur(10px);
      text-align: center;
      padding-inline: 20px;
      width: 50%;
      margin: 0 auto;

    }
.reserver {
  
  padding: 15px 3px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  border-radius: 10px;
  display: inline-block;
  border: 0px;
  font-weight: 700;
  box-shadow: 0px 0px 14px -7px #f09819;
  background-image: linear-gradient(45deg, #FF512F 0%, #F09819  51%, #FF512F  100%);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 120px;
  
}

.reserver:hover {
  background-position: right center;
  /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

.reserver:active {
  transform: scale(0.95);
}
h1{
  font-size: 40px;
  color: #b82406;
}
#d3{
  width: 100%;
  height:0px;
  text-align: center;
  padding-top: 0px;
  border: none;
}
table{
  border-collapse: collapse;
  text-align:center;
}
th{
  font-size: 16px;
  font-family: arial;
  background-color: #e7c28b;
}
td{
  font-family: arial;
  background-color: rgb(182, 230, 182);
  
}
th,td{
  border:groove 5px orange;
  padding:20px;
  width: 250px;

}
    </style>
</head>
<body>
    <?php
    // Connection à la base de données 'gestionhotels'
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=gestionhotels;charset=utf8',
            'root'
        );
    }
    catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $cin=$_GET["cin"];
    $code=$_GET["code"];
    $sql="SELECT cin from voyageur where cin='$cin' ";
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $sql="SELECT * from reservation where cin='$cin' ";
        $result = $db->query($sql);
        //echo"<div id='d3' class='m1'>";
        echo"<table>";
        echo"<thead>";
        echo"<tr>";
          echo"<th>Date de réservation</th>";
          echo"<th>Ville</th>";
         echo" <th>Hôtel</th>";
          echo"<th>Type de chambre</th>";
          echo"<th>Prix</th>";
        echo"</tr>";
      echo"</thead>";
      //--------------------nomhotel------------------
      $sql="SELECT nomhotel,ville from hotel h join reservation r on h.idhotel=r.idhotel join voyageur v on r.cin=v.cin";
$nomhotel = $db->query($sql);
$row = $nomhotel->fetch(PDO::FETCH_ASSOC);
$nomhotel_s="";
$ville="";
if ($row) {
    $nomhotel_s = (string)$row['nomhotel'];
    $ville=(string)$row['ville'];
} 
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['dat'] . "</td>"; 
        echo "<td>" . $ville . "</td>"; 
        echo "<td>" . $nomhotel_s . "</td>"; 
        echo "<td>" . $row['typeChambre'] . "</td>"; 
        echo "<td>" . $row['Prix'] . "</td>"; 
        echo "</tr>";
    }  
     // echo"</div>";
    }   
    else{
       echo"<div class='m1'>";
      echo"<h1>Vous n'avez aucune réservation!!!<br> Veuillez en effectuer une.</h1>";
       echo"</div>";
  
    }
    echo"<button class='reserver' onclick='window.history.back();'>Retourner</button>";
    ?>

</body>
</html>
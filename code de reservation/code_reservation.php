<?php
require 'conexion.php';
$ville=$_GET["ville"];
$hotel=$_GET["hotel"];
$cin=$_GET["cin"];
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$phone=$_GET["phone"];
$email=$_GET["email"];
$typeprix=$_GET["prix"];
$date=$_GET["date"];
$parts = explode(" ", $typeprix, 2);
$type = $parts[0]; 
$prix = $parts[1];
$code = "";
for ($i = 0; $i < 15; $i++) {
    $code .= rand(0, 9); }
//---------------------------------------------------insertion---------------------------------------------------
$sql="SELECT * FROM voyageur where cin='$cin'";
$carte = $db->query($sql);
$row = $carte->fetch(PDO::FETCH_ASSOC);
$carte_string="";
if ($row) {
    $carte_string = (string)$row['CIN'];
}   
if($cin!=$carte_string){
$sql = "INSERT INTO  voyageur(cin, nom, prenom, telephone, email) VALUES ('$cin', '$nom', '$prenom', '$phone', '$email')";
$db->query($sql);
$sql="SELECT idhotel FROM hotel where nomhotel='$hotel' and ville='$ville'";
$idhotel_string="";
$idhotel = $db->query($sql);
$row = $idhotel->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $idhotel_string = (string)$row['idhotel']; 
}   
$sql = "INSERT INTO  reservation(codereservation, typechambre, prix, cin, idhotel, dat) VALUES ('$code', '$type', '$prix', '$cin', '$idhotel_string', '$date')";
$db->query($sql);
}
else{
    $sql="SELECT idhotel FROM hotel where nomhotel='$hotel' and ville='$ville'";
    $idhotel = $db->query($sql);
    $row = $idhotel->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $idhotel_string = (string)$row['idhotel']; 
    }   
    $sql = "INSERT INTO  reservation(codereservation, typechambre, prix, cin, idhotel, dat) VALUES ('$code', '$type', '$prix', '$cin', '$idhotel_string','$date')";
    $db->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="code_reservation.css">
</head>
<body>
    <div id="d1">
        <h3><span id="bien">Votre réservation a été bien effectuée.</span><br><br> L'Hôtel Casablanca vous souhaite la bienvenue</h3>
        
        <h1>Votre code de réservation est : 
        <?php
        echo "<span>",$code,"</span></h1>"
        ?>
        <p>Merci pour votre visite. Bonne journée.</p>
        <button class="reserver" onclick="location.href = document.referrer;">retourner</button>
    </div>
</body>
<script src="code_reservation.js"></script>
</html>
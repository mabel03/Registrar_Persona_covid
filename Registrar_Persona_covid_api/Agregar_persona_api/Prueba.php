<?php 
include('Encabezado.php');
include("libs/Conexion1.php");

$url ="https://randomuser.me/api/?results=1000";

$datos = file_get_contents($url);
$datos= json_decode($datos);


foreach($datos->results as $persona){
    $zodiaco="";
    $fecha=strtotime($persona->dob->date);
    $fecha=date('d-m-y',$fecha);
    list ($dia, $mes, $year)=explode("-", $fecha);
    if(($mes == 1 && $dia <= 20) || ($mes == 12 && $dia >=22)) {
        $zodiaco="capricornio";
      } else if (($mes == 1 && $dia >= 21) || ($mes == 2 && $dia <= 18)) {
        $zodiaco="acuario";
      } else if(($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20)) {
        $zodiaco ="piscis";
      } else if(($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 20)) {
        $zodiaco ="aries";
      } else if(($mes == 4 && $dia >= 21) || ($mes == 5 && $dia <= 20)) {
        $zodiaco ="tauro";
      } else if(($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
        $zodiaco ="geminis";
      } else if(($mes == 6 && $dia >= 22) || ($mes == 7 && $dia <= 22)) {
        $zodiaco ="cancer";
      } else if(($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 23)) {
        $zodiaco ="leo";
      } else if(($mes == 8 && $dia >= 24) || ($mes == 9 && $dia <= 23)) {
        $zodiaco ="virgo";
      } else if(($mes == 9 && $dia >= 24) || ($mes == 10 && $dia <= 23)) {
        $zodiaco ="libra";
      } else if(($mes == 10 && $dia >= 24) || ($mes == 11 && $dia <= 22)) {
        $zodiaco ="escorpio";
      } else if(($mes == 11 && $dia >= 23) || ($mes == 12 && $dia <= 21)) {
        $zodiaco="sagitario";
      }

      header('Location: index.php');

      $nombre=$persona->name->first;
      $apellido=$persona->name->last;
      $edad=$persona->dob->age;
      $bandera=$persona->nat;
      $tel=$persona->phone;
      $correo=$persona->email;
      $dir=$persona->location->city;
      $genero=$persona->gender;
      $nacionalidad=$persona->nat;
      $imgp=$persona->picture->thumbnail;
      $imgbig=$persona->picture->large;
      $latitud=$persona->location->coordinates->latitude;
      $longitud=$persona->location->coordinates->longitude;

      $sql ="insert into personasafectadas (Nombre, Apellido, Edad, Zodiaco, Bandeta, Telefono, Correo, Direccion,Genero, Nacionalidad, ImagenGrande, imgtiny, latitud, longitud)
      values ('{$nombre}','{$apellido}','{$edad}','{$zodiaco}','{$bandera}','{$tel}','{$correo}','{$dir}','{$genero}','{$nacionalidad}','{$imgbig}','{$imgp}','{$latitud}','{$longitud}')";

echo $sql;

//  $rsid = conexion::ejecutar($sql,true);
 
$sentencia =$pdo->prepare($sql);
$sentencia->execute();

}

include('pie.php');

?>
<?php

include('libs/utils.php');
include('Encabezado.php');

$sql ="select * from personasafectadas where IdPersona={$_GET['id']}";

$datos = conexion::consulta_array($sql);



foreach ($datos as $data){
		 
    echo"

    <!DOCTYPE html>
    <html>
    <head>
    <title>{$data['Nombre']}</title>
    <link rel='stylesheet'href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'> 
    </head>
    <body>
  <p>Infectados por el Covid-19</p>
    <center><h2><i>Informacion de la persona:</i></h2></center>
    </br>
    <CENTER><img src='{$data['ImagenGrande']}'style='border: 2px solid black''width='200px'height='185px'></CENTER>
    <br>
    <div class='tabla'>
    <ul class='list-group'>
    <li class='list-group-item'><strong>Nombre:</strong>{$data['Nombre']}</li>
    <li class='list-group-item'><strong>Apellido:</strong>{$data['Apellido']}</li>
    <li class='list-group-item'><strong>Telefono:</strong>{$data['Telefono']}</li>
    <li class='list-group-item'><strong>Correo:</strong>{$data['Correo']}</li>
    <li class='list-group-item'><strong>Direccion:</strong>{$data['Direccion']}</li>
    <li class='list-group-item'><strong>Genero:</strong>{$data['Genero']}</li>
    <li class='list-group-item'><strong>Nacionalidad:</strong>{$data['Nacionalidad']}</li>
    </ul>
    </div>
    <br>
    
    
     <div class='tabla1'>
     <h3>*-Ubicacion en el mapa</h3>
  <center><iframe width='425' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://www.openstreetmap.org/export/embed.html?bbox=-236.95312500000003%2C-79.17133464081945%2C237.65625000000003%2C79.17133464081945&amp;layer=mapnik&amp;marker={$data['latitud']}%2C{$data['longitud']}' style='border: 3px solid black'></iframe><br/><small><a href='https://www.openstreetmap.org/?mlat=0.0&amp;mlon=0.4#map=3/{$data['latitud']}/{$data['longitud']}'>Ver el mapa más grande</a></small></center>
     
     </div>
     </br>
     </br>
     <center><a href='index.php' class='btn btn-info' role='button'>Ver todas las personas infectadas con el COVID-19</a></center>
     </br>
    ";


}
  include("pie.php");

    ?>
    
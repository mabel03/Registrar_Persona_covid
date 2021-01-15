<?php 
include_once  'libs/Conexion1.php';

$sql='select * from personasafectadas';
$sentencia =$pdo->prepare($sql);
$sentencia->execute();



$resultado=$sentencia->fetchAll();

$personas_x_paginas=80;


$total_personas_db=$sentencia->rowCount();
$paginas=$total_personas_db/$personas_x_paginas;
$paginas=ceil($paginas);

?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="Css.css" rel="stylesheet">
    <title>Persona con covid-19</title>
  </head>
  <body>
<div class="container my-5">
</br>
<h1 class="mb-5"><strong><center>*-COVID-19 Visualizer-*</h1></strong></center>
<p><strong><h5><i><center>Personas infectados por el COVID-19</center></i></h5></strong></p>
<div class="row mb-5">
    <div class="col">
    <span class="float-right"><a href="Prueba.php" class="btn btn-primary" role="button">Convertir</a></span>
    </div>
</div>

<?php 

  if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
  }else{
    $pagina = 0;
  }


$iniciar = ($pagina-1)*$personas_x_paginas;


  $sql_personas='SELECT * FROM personasafectadas LIMIT :iniciar,80';
  $sentencia_personas=$pdo->prepare($sql_personas);
  $sentencia_personas->bindParam(':iniciar',$iniciar,PDO::PARAM_INT);
  $sentencia_personas->execute();

  $sentencia_personas=$sentencia_personas->fetchAll();

  ?>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th>Nombre</th>
	  <th>Apellido</th>
	  <th>Edad</th>
	  <th>Signo Zodiacal</th>
	  <th>Foto del Zodiaco</th>
	  <th>Banderas</th>
      <th></th>
    </tr>
  </thead>

  <center>
  <tbody>
   <?php foreach($sentencia_personas as $data): ?>
 <?php
    echo"
			 <tr>
				 <td><img src='{$data['imgtiny']}' alt='hello'></td>
				 <td>{$data['Nombre']}</td>
				 <td>{$data['Apellido']}</td>
				 <td>{$data['Edad']}</td>
				 <td>{$data['Zodiaco']}</td>
				 <td><img src='https://horoscopo.lavanguardia.com/img/ico-{$data['Zodiaco']}.png' width='50px' height='50px'alt='hello'></td>
				 <td><img src='https://www.countryflags.io/{$data['Bandeta']}/flat/32.png' alt='hello'></td>
				 <td>
					 <a class='btn' href='ver.php?id={$data['IdPersona']}'>
           <strong class='btn btn-outline-primary btn-block'>Datos personales</strong>
					 </a>
				 </td>
			 </tr>
             ";
            ?>
    <?php endforeach ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">

  
    <li class="page-item
    <?php echo $_GET['pagina']<=1? 'disabled': '' ?>
    
    ">

    <a class="page-link" 
    href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">
               Atras
    </a>

    </li>


     <?php for($i=0;$i<$paginas; $i++): ?>
    <li class="page-item 
    <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>">
         <a class="page-link" href="index.php?pagina=<?php echo $i+1?>">
         <?php echo $i+1?>
         </a>
    </li>
    <?php endfor?>

    <li class="page-item
    <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?>">
   
    
    <a class="page-link" 
    href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">
    <center>Siguiente
     </center>
    </a>
    
    </li>
  </ul>
</nav>

</div>

  </body>
</html>

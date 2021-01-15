<?php 
              
       include('libs/utils.php');
    
       $editando = false;

    if($_POST){

        foreach($_POST as &$valor){
           $valor  = addslashes($valor);
        }
         
        extract($_POST);

        $sql = "insert into registrarc(Cedula, Nombre,Apellido,Ciudad,Curso, Comentario) 
        values ('{$cedula}','{$nombre}','{$apellido}','{$ciudad}','{$curso}','{$comentario}')
        
        "; 

        $rsid = conexion::ejecutar($sql, true);
     
          $archivo = $_FILES['foto'];
          if($archivo['error'] == 0){
         move_uploaded_file($archivo['tmp_name'],"foto/{$rsid}.jpg");
          }
    

     header("Location:index.php");

     }
    else if(isset($_GET['ced'])){
       
        $sql = "select * from registrarclientecurso where Codigo ={$_GET['ced']}";

        $objs = conexion::consulta_array($sql);

        if(count($objs) > 0){
            $data = $objs[0];
            $_POST = $data;
            $editando = true;
        }
    }
?>

<?php include("Encabezado.php");



?>
    <div class="row">
    <form enctype ="multipart/form-data" class="col s12" method = "post">
         
         <?php

         $cond =['placeholder'=>'Escribe su cedula'];
          
         if($editando){
            $cond['readonly'] = 'readonly';
         }
         echo asgInput('cedula','*-  Cedula','',$cond);
         
         ?>
         <?= asgInput('nombre','*-   Nombre','',['placeholder'=>'Escribe su nombre']);?>
         <?= asgInput('apellido','*- Apellido','',['placeholder'=>'Escribe su apellido']);?>
         <?= asgInput('ciudad','*- Ciudad','',['placeholder'=>'Escribe su ciudad']);?>
         <?= asgInput('curso','*- Curso que desea concursar','',['placeholder'=>'Ingrese el curso que desea']);?>
         <?= asgInput('comentario','*- Comentario','',['placeholder'=>'Escribe su comentario']);?>
        <?= asgInput('foto','','',['type'=>'file']);?>      
        <div class = "center-align">
        <button class = "btn" type = "submit" class="waves-effect waves-light btn">Guardar Informacion</button>
        </div>
    </form>
  </div>
  <script>
       $('#cedula').mask('000-0000000-0');
  </script>
  <?php include("pie.php");?>

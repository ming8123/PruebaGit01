<html>
<head></head>
<meta charset="UTF-8">
<link href="../style.css" rel="stylesheet">
<body>
<?php 
$nombre=null;
$errornombre=null;
$apellido=null;
$bool=true;
$pass=null;
$min=false;
$may=false;
$sim=false;

if ((!isset($_POST['enviar']))||empty($_POST["nombre"])||empty($_POST["apellido1"])){
    echo "<p id='error'>Debes rellanar los datos para darte de alta </p>";
}
else{
    
    if(ctype_alpha($_POST["nombre"])){
        $nombre=strtoupper($_POST["nombre"]);
    }else {
       $errornombre="**dato no valido";
        $bool=false;
    }
    
    if(ctype_alpha($_POST["apellido1"])){
        $apellido=strtoupper($_POST["apellido1"]);
        
    }else {
        echo "<p id='error'>Apellido1:Datos no valido</p>";
        $bool=false;
        
    }
    if(strlen($_POST["password"])>=8){       
        for($i=0;$i<=strlen($_POST["password"]);$i++){
            if (ctype_lower($i)){
                
                $min=true;
            }else   {
                $bool=false;
                echo "<p>Falta  minuscula</p>";
            }
            if (ctype_upper($i)){
                $may=true;
            }else    {
                $bool=false;
                echo "<p>Falta mayuscula</p>";
                
            }
            if (ctype_punct($i)){
                $sim=true;
            }else         $bool=false;
        }
    }else {
        echo "<p id='error'>password:Datos no valido</p>";
        $bool=false;
    }
    
?>

<?php
echo "<div id='resultado'>";
echo"<h1>RESULTADO</h1>";


    if($bool){
        echo "<p>El nombre de alumno es: ".$nombre."</p>";
        echo "<p>El primer apellido de alumno es: ".$apellido."</p>";
        echo "<p>la contraeña es validas";
    }  
}
echo"</div>";
?>
<form action="validacion.php" method="post">
<fieldset>
<legend>validacion.php</legend>
<p>Introduce nombre: <input type="text" name="nombre" value="<?php  echo $nombre?>"><?php echo "<span id='error'>$errornombre</span>"?><p>
<p>Introduce primer apellidos: <input type="text" name="apellido1" value="<?php  echo $apellido?>"><p>
<p>Introduce segundo apellido(opcional): <input type="text" name="apellido2"><p>
<p>Introduce password: <input type="password" name="password" ><p>
<p>Introduce correo: <input type="text" name="correo"><p>
<p>Introduce fecha de nacimiento: <input type="date" name="fecha"><p>
<p>Introduce direccion: <input type="text" name="direccion"><p>
<p>Introduce ciclo formativo: <input type="text" name="ciclo"><p>
<p>Introduce telefono: <input type="text" name="telefono"></p>
<input type="submit" name="enviar">
</fieldset>
</form>
</body>
</html>
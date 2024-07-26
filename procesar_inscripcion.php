<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción al Curso de Repostería</title>
	
		   <script>  
	   
	  
document.addEventListener('DOMContentLoaded', function() {
    console.log('Footer loaded successfully');
	});
	 </script>

   <style>
        body {
            margin: 0;
    padding: 0;
    background-image: url('ds.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
		   
	   }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color:#000000;
        }
	   h1{
		   color:#DDA0DD;
	   }
	   h4{
		   font-size: 40px;
		   color: #DB0003;
	   }
        input[type="text"],
        input[type="number"],
	   input[type="date"],
	   input[type="month"],
	   input[type="email"],
        select,
        textarea {
       
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ffb3b3;
            border-radius: 5px;
        }
	   #sexo{
		     width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ffb3b3;
            border-radius: 5px;
	   }
	

      button {
            background-color: #ff6f61;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
		  
        }
	   h5{
		   color:#17053B;
		   font-size: 30px;
		   
	   }
footer {
    background-color:#ffb3b3;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-logo h2 {
    margin: 0;
    font-size: 24px;
}

.footer-social {
    margin: 20px 0;
}

.footer-social a {
    margin: 0 10px;
    text-decoration: none;
}

.footer-social img {
    width: 24px;
    height: 24px;
}

footer p {
    margin: 0;
    font-size: 14px;
}
    </style>
</head>
<body>
	<div id="menu"></div>
    
    <div class="container">
		
        <h1>Inscripción al Curso de Repostería</h1>
        <form action="procesar_inscripcion.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
                <option value="femenino">Femenino</option>
                <option value="masculino">Masculino</option>
            </select>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="F_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="F_nacimiento" name="F_nacimiento" required><br><br>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
			
			<label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="jornada">Jornada:</label>
            <select id="jornada" name="jornada">
                <option value="matutina">Matutina</option>
                <option value="vespertina">Vespertina</option>
            </select>

            <label for="mes_inicio">Mes de inicio:</label>
            <input type="month" id="mes_inicio" name="mes_inicio" required><br><br>

            <label for="motivacion">¿Qué te motivó a inscribirte?</label>
            <textarea id="motivacion" name="motivacion" rows="4"></textarea>

            <button type="submit">Inscribirme</button>
			
			
			
			
        </form>
    </div>

	<script>
        fetch('menu.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('menu').innerHTML = data;
            });
    </script>


	<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $fecha_nacimiento = $_POST["F_nacimiento"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $jornada = $_POST["jornada"];
    $mes = $_POST["mes_inicio"];
    $motivo= $_POST["motivacion"];
		
		 if ($edad < 18) {
        echo " <script>alert('Lo siento, debes ser mayor de 18 años para inscribirte ');</script>";
    } else {
		 
			$conexion =new MySQLi("localhost", "root", "", "dulce_sabor","3308");

	
$sql = "INSERT INTO inscripciones (nombre, apellido, sexo, edad, fecha_nacimiento, dni, telefono, correo, direccion, jornada,mes_inicio,motivo)
VALUES ('$nombre', '$apellido', '$sexo', '$edad', '$fecha_nacimiento', '$dni', '$telefono', '$correo', '$direccion', '$jornada','$mes','$motivo')";

if($conexion->query($sql)===true){
		
        
        echo "<script>alert('¡Inscripción exitosa! Bienvenido a nuestra familia de reposteros, $nombre ');</script>";
}
     
        if ($jornada == "matutina") {
            $hora_inicio = "09:00 AM";
        } elseif ($jornada == "vespertina") {
            $hora_inicio = "06:00 PM";
        }
        echo "<script>alert('El curso comenzará el $mes a las $hora_inicio');</script>";
   
    
		 }
	}
?>
<footer>
   <div class="footer-container">
            <div class="footer-logo">
                <h2>PASTELERIA DULCE SABOR</h2>
            </div>
	    <h3> Siguenos en nuestras redes sociales:</h3>
            <div class="footer-social">
                <a href="https://www.facebook.com" target="_blank">
                    <img src="facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img src="instagram.png" alt="Instagram">
                </a>
                <a href="https://www.twitter.com" target="_blank">
                    <img src="twitter.png" alt="Twitter">
                </a>
                <a href="https://wa.me/1234567890" target="_blank">
                    <img src="whatsapp1.png" alt="WhatsApp">
                </a>
            </div>
            <p>&copy; 2024 Pastelería Dulce Sabor. Todos los derechos reservados.</p>
        </div>
  </footer>	
	

</body>
</html>
<?php
session_start();
require 'dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['save'])) {
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/Exception.php';
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
	$status = '0';
	$registro = date('Y-m-d');

	$check_email_query = "SELECT * FROM admisiones WHERE email='$email' LIMIT 1";
	$result = mysqli_query($con, $check_email_query);
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['message'] = "El correo ingresado ya esta en uso, inicia sesión o registrate con un correo diferente";
		header("Location: admisiones.php");
		exit(0);
	} else {
		$query = "INSERT INTO admisiones SET registro='$registro', email='$email', telefono='$telefono', status='$status' ";
		$query_run = mysqli_query($con, $query);
		if ($query_run) {
			$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
			$apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
			$apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
			$password = mysqli_real_escape_string($con, $_POST['telefono']);
			$rol_id = mysqli_real_escape_string($con, $_POST['detalles']);
			$rol_text = '';

			if ($rol_id == 3) {
				$rol_text = "Maestría en educación";
			} elseif ($rol_id == 4) {
				$rol_text = "Especialidad en docencía";
			}

			$sql = "INSERT INTO usuarios SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$email', password='$password', rol_id='$rol_id', estatus='1'";

			$query_run = mysqli_query($con, $sql);
			if ($query_run) {

				$sql = "INSERT INTO informacion SET username='$email'";

				$query_run = mysqli_query($con, $sql);
				if ($query_run) {
					$asunto = 'PROCESO DE ADMISION';
					$cuerpo = '
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                </head>
                <body style="font-family: system-ui;text-align: justify;background-color: #e7e7e7;">
                    <div style="background-color: #ffffff;max-width:500px;margin: 0 auto;">
                        <img style="width: 100%;" src="https://cepap.edu.mx/images/cintillosuperior.jpg" alt="Cintillo superior">
                    <div style="padding: 0px 30px;">
                        <p style="margin-top: 45px;">Estimado/a ' . $nombre . '</p>
                        <p>Este correo es para confirmarte que recibimos tu solicitud de admisión exitosamente.</p>
                        <p>Agradecemos sinceramente tu interes en querer formar parte de nuestra institución. Contamos con la mejor infraestructura y una robusta plataforma digital para que puedas cursar tu maestría o especialidad de forma innovadora.</p>
                        <p>Lleva tu proceso de admisión ingresando a tu perfil desde <a style="text-decoration: none;color: #4b81be;"  href="https://cepap.edu.mx/login">cepap.edu.mx/login</a>, deberás completar tu información académica, proceso de pago y alta de documentación.</p>

                        <div style="padding: 3px 20px;background-color:#efefef;color:#000000;border-radius: 3px;margin: 30px 0px;text-align:left;">
                        <p style="margin-bottom: 0px;"><b>Conoce los detalles de tu registro:</b></p>
                        <div style="display: flex; flex-direction: column; margin: 0 auto;">
                            <div style="display: flex; flex-wrap: wrap;">
                                <p style="margin-right: 5px;margin-bottom: 0px;"><b>Nombre:</b></p>
                                <p style="flex: 2;margin-bottom: 0px;text-transform:capitalize">' . $nombre . ' ' . $apellidopaterno . ' ' . $apellidomaterno . '</p>
                            </div>
                        </div>
                        
                        <p><b>Correo:</b> ' . $email . '</p>
                        <p><b>Rol solicitado:</b> ' . $rol_text . '</p>
                        <p><b>Estatus:</b> Fase 2</p>
                        </div>

                        <p>Estamos comprometidos en brindar un servicio excepcional para todos nuestros alumnos y aspirantes. Esperamos siempre seguir siendo tu elección. Si necesitas contactarnos visita <a style="text-decoration: none;color: #4b81be;" href="https://cepap.edu.mx/contacto">cepap.edu.mx/contacto</a></p>
                        <p style="text-align: center;margin-top:30px;margin-bottom:0px;">Atentamente</p>
                        <p style="text-align: center;margin-top:0px;margin-bottom:50px;"><b>Equipo administrativo</b></p>
                    </div>
                    <div style="background-color: #151515;color: #ffffff;padding: 5px 15px;font-size: 10px;text-align: center;padding-bottom: 15px;margin-bottom: 25px;">
                        <p>Este correo es enviado de manera automática por nuestro sistema, puedes comunicarte con nuestro equipo mediante cualquiera de nuestros medios de contacto oficiales.</p>
                        <p>Conoce el estatus de tu solicitud aqui:</p>
                        <a style="text-decoration: none;color: #80b5f3;" href="https://cepap.edu.mx/estatus">cepap.edu.mx/estatus</a>
                    </div>
                    </div>
                </body>
                
                </html>';

					$mail = new PHPMailer(true);

					try {
						//Configuraciones del servidor
						$mail->isSMTP();
						$mail->Host = 'mail.cepap.edu.mx'; // Especifica tu servidor SMTP
						$mail->SMTPAuth = true;
						$mail->Username = 'admisiones@cepap.edu.mx'; // SMTP username
						$mail->Password = '0#M?toz?J[A$'; // SMTP password
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
						$mail->Port = 465;

						//Configuración del correo
						$mail->setFrom('admisiones@cepap.edu.mx', 'CEPAP');
						$mail->addAddress($email, $nombre . ' ' . $apellidopaterno); // Añade al destinatario
						$mail->addReplyTo('admisiones@cepap.edu.mx', 'CEPAP');

						// Contenido del correo
						$mail->isHTML(true);
						$mail->Subject = $asunto;
						$mail->Body    = $cuerpo;

						// Enviar correo
						if ($mail->send()) {
							$_SESSION['message'] = "Se envió tu solicitud exitosamente, revisa tu correo";
							header("Location: perfil.php");
							exit(0);
						} else {
							$_SESSION['message'] = "Tu solicitud se envío a nuestro equipo, parece que hubo un error al hacerte llegar la información a tu correo";
							header("Location: admisiones.php");
							exit(0);
						}
					} catch (Exception $e) {
						$_SESSION['message'] = "Error al enviar el correo: {$mail->ErrorInfo}";
						header("Location: admisiones.php");
						exit(0);
					}
				} else {
					$_SESSION['message'] = "Error al inicializar tu información";
					header("Location: admisiones.html");
					exit(0);
				}
			} else {
				$_SESSION['message'] = "Error al crear el usuario";
				header("Location: admisiones.html");
				exit(0);
			}
		} else {
			$_SESSION['message'] = "Error en la admisión";
			header("Location: admisiones.html");
			exit(0);
		}
	}
}

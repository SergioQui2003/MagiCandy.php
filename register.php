<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		
		// PARA QUE LLENE CORRECTAME EL RECAPCHAT
		/* if(!isset($_SESSION['captcha'])){
			require('recaptcha/src/autoload.php');		
			$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());
			$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$resp->isSuccess()){
		  		$_SESSION['error'] = 'Por favor conteste recaptcha correctamente';
		  		header('location: signup.php');	
		  		exit();	
		  	}	
		  	else{
		  		$_SESSION['captcha'] = time() + (10*60);
		  	}

		} */

		if($password != $repassword){
			$_SESSION['error'] = 'Las contraseñas no coinciden';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Correo electrónico ya tomado';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//Generador de codigo
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Gracias por pertenecer a MagiCandy.</h2>
						<p>Los datos de su cuenta son:</p>
						<p>Correo electrónico: ".$email."</p>
						<p>Su contraseña: ".$_POST['password']."</p>
						<p>Haga clic en el enlace a continuación para activar su cuenta y ser parte de nosotros</p>
						<a href='http://localhost/onlineventas/activate.php?code=".$code."&user=".$userid."'>Activar la cuenta</a>
						<br>
						<img src='http://localhost:3000/images/Logo.webp' alt='Logo Empresarial' />
					";


					//Cargar correo
		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Configuración servidor
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'magicandy2023@gmail.com';     
				        $mail->Password = 'ikukpvrqxwqonxkx';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('magicandy2023@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('magicandy2023@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'Registro en MagiCandy ';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Cuenta creada. Revise su correo electrónico para activar.';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'El mensaje no pudo ser enviado. Error de correo: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de registro primero';
		header('location: signup.php');
	}

?>
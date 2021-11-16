<?php 
require_once __DIR__ . '/vendor/autoload.php';

//PHP-MAILER LIBRARY
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$Country_Name 		= $_POST['CN'];
$Country_City 		= $_POST['CC'];
$Country_Population = $_POST['Population'];

//echo $Country_Name."<br>".$Country_City ."<br>".$Country_Population;

//CREATE NEW PDF instance
$mpdf = new \Mpdf\Mpdf();

//create Our pdf
$data = '';

$data .= '<h1>ANTAMASI TIEDOT</h1>';

$data .= '<strong>Country Name</strong> '.$Country_Name.'<br>';
$data .= '<strong>Country City</strong> '.$Country_City.'<br>';
$data .= '<strong>Population</strong> '.$Country_Population;


//Write PDF
$mpdf->WriteHTML($data);

$pdf = $mpdf->Output('Country_DATA.pdf','S');

$Maa_DATA = [
	'Country_Name: ' => $Country_Name,
	'Country_City: ' => $Country_City,
	'Country_Population: ' => $Country_Population,
];


//Run the FUNCTION sendEmail
sendEmail($pdf,$Maa_DATA);



//GENERATE MAIL SEND function
function sendEmail($pdf,$Maa_DATA)
	{
		
		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);
		
		//SET email body
		$email_body = '';
		$email_body .= '<h1>Counry data From Country Information App</h1>';
		
			foreach($Maa_DATA as $title_data => $data)
			{
				$email_body .= '<strong>'. $title_data	 . '</strong>' . $data . '<br />'; 
			}

		try {
			//Server settings
			$mail->isSMTP();                      
			$mail->isSMTP();                                            
			$mail->Host       = 'smtp.gmail.com';                       
			$mail->SMTPAuth   = true;  									
			$mail -> charSet = 'UTF-8';									
			$mail->Username   = 'developing.coderow@gmail.com';         
			$mail->Password   = '@Hawa-101021';                            
			$mail->SMTPSecure = 'tls';            
			$mail->Port       = 587;                                    

			//Recipients
			$mail->setFrom('developing.coderow@gmail.com', 'Country Info');
			$mail->addAddress('satar.qadeerzada@gmail.com', 'SATAR QADERZADA');    
			$mail->addCC('abdulsatar1@hotmail.com');
  		
			//Attachment
			$mail->addStringAttachment($pdf, 'Country_DATA.pdf');
		
			//Content
			$mail->isHTML(true);                                  		
			$mail->Subject = 'COUNTRY INFORMATION';
			$mail->Body    = $email_body;
			$mail->AltBody = strip_tags($email_body);

			$mail->send();
			
			header('Location:thanks.php');
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}	
	}		
?>
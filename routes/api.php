<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
use vendor\autoload;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route for /api; display message
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to CRS API!']);
});

// Route for /api/login --> returns multiple user role inside an array
Route::get('/login/{email}', [UsersController::class, 'login']); 

// Route for /api/users --> Insert user data to database
Route::post('/users', [UsersController::class, 'insertUser']); 

// Route for /api/user/1/{userId} --> Update user data to database
Route::put('/user/1/{userId}', [UsersController::class, 'updateUser']);


// Email blast:
// Route for /api/email-blast --> Send email to all users
Route::post('/email-blast', function () {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host       = 'smtp.example.com'; //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->Username   = ''; //SMTP username
        $mail->Password   = ''; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('', '');     //Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = ' Email Blast test';
        $mail->Body    = 'Test email blast';
        $mail->AltBody = 'Test email blast';

        $mail->send();
        echo 'Message has been sent';
        return response()->json(['message' => 'Email sent successfully!']);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return response()->json(['error' => 'Error sending email!', 'errData' => $e]);
    }
    
    
});











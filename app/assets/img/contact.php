<?php
require("req_globals.php");

$boss = mysqli_query($con, "SELECT * FROM main WHERE pageId = 5");
$worker = mysqli_fetch_assoc($boss);


/*$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'wproctor23@yahoo.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Your contact request has been submitted successfully !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}*/

?>


<!doctype html>
<html>
    <head>
        <title>Jazz It Up Studios</title>
        <link rel="stylesheet" href="_css/style.css">
        <style type="text">
        	button{
        		display: hidden;
        		}
        </style>
    </head>

    <body>
    <div id="container">

        <?php include("inc_header.php"); ?>

        <div class="splash">
            <img src="<?php echo $worker["splashImg"]; ?>" alt="">
        </div>
        <div class="title">
            <h1><?php echo $worker["PageTitle"]; ?></h1>
        </div>

        <div id="contact">
            <div id="errorMess">
                <h3 class="message">***Sorry for the inconvienve but the email form is currently not working. In the mean time, if you have any questions please call, email or visit Jazz It Up Studios. Thank you.</h3>
            </div>

            <form id="formPage" action="mail_handler.php" name="form" method="post">

                <li>
                    <h4 class="spaceClose">Name</h4>
                    <input placeholder="Your name (First, Last)" type="text" tabindex="1" name="name" size="60" maxlength="30" required  autofocus >

                </li>
                <li>
                    <h4 class="spaceClose">Email</h4>
                    <input placeholder="Your Email Address" type="text" name="email"  size="60" maxlength="30" tabindex="2" required>

                </li>
                <li>
                    <h4 class="spaceClose">Phone Number</h4>
                    <input placeholder="Your Phone Number" type="text" name="phone" size="60" maxlength="30" tabindex="3" required>

                </li>

                <li>
                    <h4 class="spaceClose">Message</h4>
                    <textarea placeholder="Type your Message Here...." type="text" name="message" cols="57" rows="10" tabindex="5" required></textarea>
                </li>
                <li>
                    <button name="submit" type="submit" value="send">Submit</button>
                    </li>

            </form>


            <div id="infoBox">
                <h3 class="adjust1">Jazz It Up Studios</h3>
                <h5 class="adjust2">310.995.0408 <br/> jazzitupstudios3@gmail.com</h5>
                <h5 class="adjust3">1425 Marcelina Ave.<br/> Torrance, CA 90501</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.165940244561!2d-118.31790418492064!3d33.83383098066594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd4aba13027bef%3A0xd55409f3167fd1b5!2s1425+Marcelina+Ave%2C+Torrance%2C+CA+90501!5e0!3m2!1sen!2sus!4v1487817421388" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <?php include("inc_footer.php"); ?>

    </div>

    </body>
</html>
<?php
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

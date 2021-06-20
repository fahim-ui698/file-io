<?php

$file2 = fopen("Users.txt", "r");
$read = fread($file2, filesize("Users.txt"));
fclose($file2);

$json_decoded_text = json_decode($read, true);
$obj = json_decode($read);



$userNameErr = $passwordErr  = "";

$json_userName = $obj->{'userName'};
$json_password = $obj->{'password'};

$userName = "";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['uname'])) {
        $userNameErr = "Please fill up the username properly";
    } else {
        $userName = $_POST['uname'];
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Please fill up the password properly";
    } else {
        $password = $_POST['password'];
    }

    if($userName == $json_userName && $password == $json_password){
        header("Location: ./welcome.php");
    }
    else{
        echo '<script>alert("Error Credentials")</script>';
    }
    

}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>LogIn Form</title>
</head>

<body>

    <h1>LogIn Form</h1>



    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        
        <fieldset>

            <legend>User Account Information: </legend>

            <label for="uname">UserName:</label>
            <input type="text" name="uname" id="uname" value="<?php echo $userName; ?>">
            <br>
            <p style="color:red"><?php echo $userNameErr; ?></p>

            <label for="pass">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $password; ?>">
            <br>
            <p style="color:red"><?php echo $passwordErr; ?></p>


        </fieldset>
        <br>

        <input type="submit" value="Submit" name="submit">

    </form>
    <br>


</body>

</html>


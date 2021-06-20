<?php
$firstNameErr = $lastNameErr = $genderErr =  $emailErr = $userNameErr = $passwordErr = $rEmailErr = $present_addressErr = $parmanent_addressErr = $phoneErr = $contact_emailErr = $website_linkErr = $birthdayErr = $religionErr = "";

$firstName = "";
$lastName = "";
$gender = "";
$userName = "";
$password = "";
$present_address = "";
$parmanent_address = "";
$phone = "";
$contact_email = "";
$website_link = "";
$birthday = "";
$religion = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['fname'])) {
        $firstNameErr = "Please fill up the first name properly";
    } else {
        $firstName = $_POST['fname'];
    }

    if (empty($_POST['lname'])) {
        $lastNameErr = "Please fill up the last name properly";
    } else {
        $lastName = $_POST['lname'];
    }

    if (empty($_POST['email'])) {
        $emailErr = "Please enter your email";
    } else {
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

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

    

    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST['gender'];
    }

    if (empty($_POST['present_address'])) {
        $present_addressErr = "Present address is required";
    } else {
        $present_address = $_POST['present_address'];
    }
    if (empty($_POST['parmanent_address'])) {
        $parmanent_addressErr = "Parmanent address is required";
    } else {
        $parmanent_address = $_POST['parmanent_address'];
    }
    if (empty($_POST['phone'])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = $_POST["phone"];
        if (!is_numeric($phone)) {
            $phoneErr = "Phone is not valid";
        } else {
            $phone = $_POST['phone'];
        }
    }
    if (empty($_POST['contact_email'])) {
        $contact_emailErr = "Contact Email is required";
    } else {
        $contact_email = $_POST['contact_email'];
    }
    if (empty($_POST['website_link'])) {
        $website_linkErr = "Website Link is required";
    } else {
        $website_link = test_input($_POST["website_link"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website_link)) {

            $website_linkErr = "Website Link is not valid";
        } else {
            $website_link = $_POST['website_link'];
        }
    }
    if (empty($_POST['birthday'])) {
        $birthdayErr = "Birthday is required";
    } else {
        $birthday = $_POST['birthday'];
    }
    if (empty($_POST['religion'])) {
        $religionErr = "Religion is required";
    } else {
        $religion = $_POST['religion'];
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>

<body>

    <h1>Registration Form</h1>



    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <legend>Basic Information: </legend>

            <label for="fname">FirstName:</label>
            <input type="text" name="fname" id="fname" value="<?php echo $firstName; ?>">
            <br>
            <p style="color:red"><?php echo $firstNameErr; ?></p>

            <label for="lname">LastName:</label>
            <input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
            <br>
            <p style="color:red"><?php echo $lastNameErr; ?></p>

            <label for="gender">Choose Gender:</label>

            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male

            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female

            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
            <p style="color:red"><?php echo $genderErr; ?></p>

            <label for="birthday">Date of birth :</label>
            <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>">
            <p style="color:red"><?php echo $birthdayErr; ?></p>
            <br>
            <br>
            <label for="Religion">Religion :</label>
            <select id="city" name="religion">
                <option value="" disabled selected>Choose option</option>
                <option value="Muslim">Muslim</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddu">Buddu</option>
                <option value="chirstan">Chirstam</option>
                <select />
                <p style="color:red"><?php echo $religionErr; ?></p>
        </fieldset>


        <br>


        <fieldset>
            <legend>Contact Information:</legend>

            <label for="Present Address">Present Address</label>
            <textarea name="present_address" ><?php echo $present_address ?></textarea>
            <p style="color:red"><?php echo $present_addressErr; ?></p>
            <br>



            <label for="Parmament Address">Parmament Address</label>
            <textarea name="parmanent_address" ><?php echo $parmanent_address ?></textarea>
            <p style="color:red"><?php echo $parmanent_addressErr; ?></p>


            <br><br>




            <label for="Phone "> Phone: </label>
            <input type="text" id="phone" name="phone" value="<?php echo $phone ?>">
            <p style="color:red"><?php echo $phoneErr; ?></p>


            <br><br>




            <label for="Email"> Email: </label>
            <input type="text" id="contact_email" name="contact_email" value="<?php echo $contact_email ?>">
            <p style="color:red"><?php echo $contact_emailErr; ?></p>



            <br><br>




            <label for="Weblink"> Personal Website Link(url): </label>
            <input type="text" id="Weblink" name="website_link" value="<?php echo $website_link ?>">
            <p style="color:red"><?php echo $website_linkErr; ?></p>



        </fieldset>
        <br>
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

        <input type="submit" value="Submit">

    </form>
    <br>


</body>

</html>

<?php

if ($firstName != "" && $lastName != "" && $gender != "" && $userName != "" && $password != "" && $present_address != "" && $parmanent_address != "" && $phone != "" && $contact_email != "" && $website_link != "" && $birthday != "" && $religion != "") {

    $arr1 = array('firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender,  'userName' => $userName, 'password' =>  $password,  'present_address' => $present_address, 'parmanent_address' => $parmanent_address , 'phone' => $phone , 'contact_email' => $contact_email, 'website_link' => $website_link, 'birthday' => $birthday, 'religion' => $religion);

    $json_encoded_text = json_encode($arr1);

    $file1 = fopen("Users.txt", "w");
    fwrite($file1, $json_encoded_text);

    fclose($file1);
}


?>
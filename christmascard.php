<?php
    if (isset($_POST['submitpressed'])){ //do the following if user got to this page by submitting the form as oppose to entering url manually.
        $servername = 'localhost';
        $username = 'root';                       
        $password = 'password';                     
        $dbname = 'marshall';               
        
        $name = $_POST['name'];         // get the information entered by the user from the christmas form
        $email = $_POST['email'];
        $addressline1 = $_POST['addressline1'];
        $town = $_POST['town'];
        $postcode = $_POST['postcode'];
        $comment = $_POST['comment'];    

        //create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //check connection
        if ($conn->connect_error) {     //if connection error tell user
            $message = "Connection failed. Please try again later. Click <a href='index.php'>here</a> to return.";
        } else {    //else if no connection error

            //check how many people has registered, if more than 10 go back to main page and tell user it's no longer available
            $sql1 = "SELECT * FROM christmas;";
            $result = $conn->query($sql1);
            if ($result->num_rows >= 10 ) {
                header("Location: index.php?error=maxxedout&name=".$name."&email=".$email."&addressline1=".$addressline1."&town=".$town."&postcode=".$postcode."&comment=".$comment."#christmas");
                exit();     //return to main page with information in the url about error and user filled in data
            }

            //server side error handling, mainly for email as html email error handling one doesn't fully work for email
            if (empty($name) || empty($email) || empty($addressline1) || empty($town) || empty($postcode))  { //check if any of the required fields are empty, shouldn't need as html one works
                header("Location: index.php?error=emptyfields&name=".$name."&email=".$email."&addressline1=".$addressline1."&town=".$town."&postcode=".$postcode."&comment=".$comment."#christmas");
                exit();     //return to main page with information in the url about error and user filled in data
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //check if email entered is in a valid format
                header("Location: index.php?error=invalidemail&name=".$name."&addressline1=".$addressline1."&town=".$town."&postcode=".$postcode."&comment=".$comment."#christmas");
                exit();     //return to main page with information in the url about error and user filled in data
            }
            
            //prepared statement for inserting data from form into database
            $sql = "INSERT INTO christmas (name, email, addressline1, town, postcode, comments) VALUES (?, ?, ?, ?, ?, ?);";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssssss", $name, $email, $addressline1, $town, $postcode, $comment);
                if ($stmt->execute()) {
                    $message = "Success! We will contact you via email shortly. Do not refresh, you will be redirected in 10s. Or you can click <a href='index.php'>here</a>";
                } else {
                    $message = "ERROR: Could not execute: $sql . Error: $conn->execute";  //does this work?
                }
            } else {
                $message = "ERROR: Could not prepare query: $sql . Error: $conn->error";   //does this work?
            }
            $stmt->close();
            $conn->close();
        }
    } else {  //if user got to this page by manually entering the url
        $message = "Why are you here?";
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Christmas Card</title>
    <meta name="author" content="Allan Sham"> 
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10; URL=index.php">      <!--takes the user back to homepage after 10s-->
</head>
<body>
<main>
    <header>
        <div id="ig">
            <a href="https://www.instagram.com/marshallmattersthebc/" target="_blank"><img src="images/IG.png" alt="instagram logo"></a>
        </div>
        <h1 class="full-title">M A R S H A L L &nbsp; &nbsp; M A T T E R S</h1>
        <h1 class="half-title">M A R S H A L L</h1>
        <h1 class="letter-title">M</h1>
    </header>
    <?php
        echo "<p class='ch'>$message</p>";
    ?>
     <div class="photo" id="photo3">    <!-- add a photo using CSS-->
    </div>
</main>
</body>    
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Christmas Card</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10;URL=index.php">      <!--takes the user back to homepage after 10s-->
</head>
<body>
<main>
    <header>
        <div id="ig">
            <a href="https://www.instagram.com/marshallmattersthebc/" target="_blank"><img src="images/IG.png"></a>
        </div>
        <h1 id="full-title">M A R S H A L L &nbsp; &nbsp; S H A M</h1>
        <h1 id="half-title">M A R S H A L L</h1>
        <h1 id="letter-title">M</h1>
    </header>

    


    <?php
        if (isset($_POST['submitpressed'])){ //do the following if user got to this page by submitting the form as oppose to entering url manually.  
            $servername = 'localhost';
            $username = 'root';
            $password = 'password';
            $dbname = 'marshall';

            //create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            //check connection
            if ($conn->connect_error) {
                die ("Connection failed: " . $conn->connect_error);
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $addressline1 = $_POST['addressline1'];
            $town = $_POST['town'];
            $postcode = $_POST['postcode'];
            $comment = $_POST['comment'];
            
            //server side error handling, mainly for email as html email error handling one doesn't fully work for email
            if (empty($name) || empty($email) || empty($addressline1) || empty($town) || empty($postcode))  { //check if any of the required fields are empty, shouldn't need as html one works
                header("Location: index.php?error=emptyfields&name=".$name."&email=".$email."&addressline1=".$addressline1."&town=".$town."&postcode=".$postcode."&comment=".$comment."#christmas");
                exit();
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //check if email entered is in a valid format
                header("Location: index.php?error=invalidemail&name=".$name."&addressline1=".$addressline1."&town=".$town."&postcode=".$postcode."&comment=".$comment."#christmas");
                exit();
            }
            

            $sql = "INSERT INTO christmas (name, email, addressline1, town, postcode, comments) VALUES (?, ?, ?, ?, ?, ?);";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssssss", $name, $email, $addressline1, $town, $postcode, $comment);
                if ($stmt->execute()) {
                    echo "<p id='ch'>Success! We will contact you via email shortly. Do not refresh, you will be redirected in 10s.</p>";
                    // header( "refresh:10; url=index.php" );
                } else {
                    echo "ERROR: Could not execute: $sql " . $conn->error; 
                }
            } else {
                echo "ERROR: Could not prepare query: $sql " . $conn->error;
            }

            $stmt->close();
            $conn->close();

        } else {
            echo "<p id='ch'>Why are you here?</p>";
        }
        
     ?>

     <div class="photo" id="photo3">
    </div> <!--ends photo1-->
</main>
</body>    
</html>
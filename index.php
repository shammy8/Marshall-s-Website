<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marshall Sham</title>
    <meta name="description" content="Marshal Sham">
    <meta name="keywords" content="marshall, border collie, dog">
    <meta name="author" content="Allan Sham"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
<main>
    <!--Top of Page-->
    <div class="photo" id="photo1">
        <header>
            <div id="ig">
                <a href="https://www.instagram.com/marshallmattersthebc/" target="_blank"><img src="images/IG.png"></a>
            </div>
            <h1 id="full-title">M A R S H A L L &nbsp; &nbsp; S H A M</h1>
            <h1 id="half-title">M A R S H A L L</h1>
            <h1 id="letter-title">M</h1>
        </header>
    </div> <!--ends photo1-->



    <!--First Paragraph-->
    <div class="no-background">
        <p>Hai Furends, my name is Marshall Sham, you can call me Marshall fur short. 
            I was born on the 1st of March 2004, which makes me 15 years old, or around 83 years
            old in human years. I am old dog. My arms and feet are getting weak, I can't 
            eat proper without falling over anymore. But it OK, I am still happy and I stay 
            pawsitive all the time.<p> 
        <p>It is nearly X-mas, every year I will paw-make christmas cards with my mummy for 
            my furry furends. Unfurtunately, I dont' have time so I can only make some. If you 
            would like a personalised card from me and my mummy you can fill in the form below. Hope 
            you have a Feliz navidog, that is Spanish for merry christmas, I learned during my 
            adventures.</p>
        <p>Talking about adventures, you can see all the places I have been to below. I have 
            been all over the UK: from the North of Scotland to Lands End. I even been to Europe as 
            you might have noticed from my fluency in Spanish. You can also jump over to my 
            Instagram and follow it (link above), I am getting famous so please no puparazzi.</p>
        <p>Finally, if you have a spare monies I appreciate any donations for me to buy treats. 
            You can find my details at the bottom of the page. Not too much though, mummy says 
            I'm getting fat.</p>    
    </div> <!--ends first no-background-->
    


    <!--Second Photo-->
    <div class="photo" id="photo2">
    </div>

    <!--Christmas Card Form-->
    <div class="no-background" id="christmas" name="christmasform">
        <h2>LIMITED AVAILABLITY</h2>
        <h2>Register to receive a paw-made X-mas card from Marshall</h2>

        <?php   //Error messages when email isn't entered properly (checkd using php) as the html error handling doesn't fully work for emails
            if (isset($_GET['error'])){  //not needed as html error handling should handle when required fields are not entered
                if ($_GET['error'] == "emptyfields") {
                    echo "<p id='formerror'>Fill in all the required fields</p>";
                    echo '<script>alert("Fill in all the required fields"); </script>';
                    
                } else if ($_GET['error'] == "invalidemail") { //error messages for invalid email
                    echo "<p id='formerror'>Check to see if you have entered your email correctly.</p>";
                    echo '<script>alert("Check to see if you have entered your email correctly."); </script>';
                }
            }
        ?>

        <form method="POST" action="christmascard.php">

            <div class="form-row">
                <div class="form-label">
                    <label>name:</label>
                </div>
                <div class= "form-input">
                    <input type="text" name="name" value="<?php echo $_GET['name']?>" placeholder= "your name" required>
                </div>
            </div>
        
            <div class="form-row">
                <div class="form-label">
                    <label>e-mail:</label>
                </div>
                <div class= "form-input">
                    <input type="email" name="email" value="<?php echo $_GET['email']?>" placeholder= "abc@abc.com" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-label">
                    <label>address line 1:</label>
                </div>
                <div class= "form-input">
                    <input type="text" name="addressline1" value="<?php echo $_GET['addressline1']?>" placeholder= "address line 1" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-label">
                    <label>town:</label>
                </div>
                <div class= "form-input">
                    <input type="text" name="town" value="<?php echo $_GET['town']?>" placeholder= "town"  required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-label">
                    <label>postcode:</label>
                </div>
                <div class= "form-input">
                    <input type="text" name="postcode" value="<?php echo $_GET['postcode']?>" placeholder= "postcode" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-label">
                    <label>comments:</label>
                </div>
                <div class= "form-input">
                    <textarea name="comment" rows="4" cols="20" maxlength="5000" placeholder="leave a message for marshall"></textarea>        
                </div>
            </div>

            <div class="submit-button">
                <input style="width: 10em;  height: 2.1em;" type="submit" name="submitpressed">
            </div>

        </form>
    </div> <!--end christmas card form-->



    <!--Map-->
    <div class="map-title">
        <h1 id="full-title">M Y &nbsp; &nbsp; A D V E N T U R E S</h1>
        <h1 id="half-adventure-title">A D V E N T U R E S</h1>
    </div>
    <div id="map"></div>
    
    <script src="marshallMap.js"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer src=>   
    </script>



    <!--Donations-->
    <div class="no-background donations">
        <div class="donate">
            <h3>B I T C O I N</h3>
            <p>1andreas3batLhQa2FawWjeyjCqyBzypd</p>
        </div>
        <div class="donate">
            <h3>P A Y P A L</h3>
            <p>paypal.me/soemthingsomething</p>
        </div>
        <div class="donate">
            <h3>R E V O L U T</h3>
            <p>123LFMDDFSsd5</p>
        </div>
    </div> <!-- end donations-->



</main>
</body>
</html>
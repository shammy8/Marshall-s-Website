<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marshall Matters</title>
    <meta name="description" content="Marshal Matters the BC">
    <meta name="keywords" content="marshall, matters, border collie, dog, cute">
    <meta name="author" content="Allan Sham"> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
    <div class ="fix-overflow"> <!--fix overflow not working on body tag on mobile devices-->
    <div class="carousel-container">
        <header>
            <div id="ig">
                <a href="https://www.instagram.com/marshallmattersthebc/" target="_blank"><img src="images/IG.png" alt="instagram logo"></a>
            </div>
            <h1 class="full-title">M A R S H A L L &nbsp; &nbsp; M A T T E R S</h1>
            <h1 class="half-title">M A R S H A L L</h1>
            <h1 class="letter-title">M</h1>
        </header>

        <div class = "carousel-slide">
            <div class="arrow" id="arrow-left"><i class="fa fa-chevron-left" style="font-size: 30px"></i></div>
            <div class="arrow" id="arrow-right"><i class="fa fa-chevron-right" style="font-size: 30px"></i></div>
            <div class="arrow" id="arrow-down"><i class="fa fa-chevron-down" style="font-size: 30px"></i></div>
            <div class="slide" id="photo1"></div>
            <div class="slide" id="photo2"></div>
            <div class="slide" id="photo3"></div>
        </div> <!--ends carousel slide-->
    </div> <!--ends carousel container-->


    <div class="grid-third">   
        <div class="no-background description" id="s">
            <p>Hai Furends, my name is Marshall Matters, you can call me Marshall fur short. I was born on the 1st of March 2004, which makes me 15 years old, or around 83 years old in human years. I am old dog. My arms and feet are getting weak, I can't eat proper without falling over anymore. But it OK, I am still happy and I stay pawsitive all the time.<p> 
            <p>It is nearly X-mas, every year I will paw-make christmas cards with my mummy for my furry furends. Unfurtunately, I don't have time so I can only make some. If you would like a personalised card from me and my mummy you can fill in the <a href="#christmas">form</a> below. Hope you have a Feliz navidog, that is Spanish for merry christmas, I learned during my adventures.</p>
            <p>Talking about adventures, you can see all the places I have been to in my adventure <a href="#map">map</a>. I have been all over the UK: from John O'Groats to the Lake District. You can also hop over to my <a href=https://www.instagram.com/marshallmattersthebc target="_blank">Instagram</a> and follow it, I am getting famous so please no puparazzi.</p>
            <p>Finally, I appreciate any donations for me to buy treats. You can find my details at the bottom of the page. Not too much though, mummy says I'm getting fat.</p>    
        </div> <!--ends description -->
        

        <div class="mapdiv">
            <div id="map"></div>
            <script src="marshallMap2.js"></script>
            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3cwMmLk8ilAVw8BwL7lqOwz8pESXUY_E&callback=initMap">   
            </script>
        </div> <!--end mapdiv-->
    </div> <!--ends grid-third -->
    

   <div class="bottom">

        <div class="no-background" id="christmas"> <!--Christmas Card Form-->
            <h2>LIMITED AVAILABLITY</h2>
            <h2>Register to receive a paw-made X-mas card from Marshall</h2>
            <p class='formerror'>This feature is for testing only, if you would like to help me test please fill in some random details below.</p>

            <?php   //Error messages when email isn't entered properly (checked using php) as the html error handling doesn't fully work for emails
                if (isset($_GET['error'])){  //if there is an error as seen in the url
                    if ($_GET['error'] == "emptyfields") {  //not needed as html error handling should handle when required fields are not entered
                        echo "<p class='formerror'>Fill in all the required fields</p>";
                        echo '<script>alert("Fill in all the required fields"); </script>';
                    } else if ($_GET['error'] == "invalidemail") { //error messages for invalid email
                        echo "<p class='formerror'>Check to see if you have entered your email correctly.</p>";
                        echo '<script>alert("Check to see if you have entered your email correctly."); </script>';
                    } else if ($_GET['error'] == "maxxedout") { //error messages for too many applications
                        echo "<p class='formerror'>Sorry no more christmas cards available.</p>";
                        echo '<script>alert("Sorry no more christmas cards available."); </script>';
                    }
                }
            ?>

            <form method="POST" action="christmascard.php">

                <div class="form-row">
                    <div class="form-label">
                        <label>name:</label>
                    </div>
                    <div class= "form-input">
                        <input type="text" name="name" value="<?php echo $_GET['name']?>" placeholder= "your name" maxlength="250" required>
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-label">
                        <label>e-mail:</label>
                    </div>
                    <div class= "form-input">
                        <input type="email" name="email" value="<?php echo $_GET['email']?>" placeholder= "abc@abc.com" maxlength="250"  required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label">
                        <label>address line 1:</label>
                    </div>
                    <div class= "form-input">
                        <input type="text" name="addressline1" value="<?php echo $_GET['addressline1']?>" placeholder= "address line 1" maxlength="250" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label">
                        <label>town:</label>
                    </div>
                    <div class= "form-input">
                        <input type="text" name="town" value="<?php echo $_GET['town']?>" placeholder= "town" maxlength="250" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label">
                        <label>postcode:</label>
                    </div>
                    <div class= "form-input">
                        <input type="text" name="postcode" value="<?php echo $_GET['postcode']?>" placeholder= "postcode" maxlength="12"  required>
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


        <!--Donations-->
        <div class="no-background donations">
            <div class="donate">
                <h3>B I T C O I N</h3>
                <p style="text-align: center">COMING SOON</p>
            </div>
            <div class="donate">
                <h3>P A Y P A L</h3>
                <p>paypal.me/marshallmattersthebc</p>
            </div>
            <div class="donate">
                <h3>R E V O L U T</h3>
                <p style="text-align: center">COMING SOON</p>
            </div>
        </div> <!-- end donations-->
    
    </div>

    <footer>
        <p>Made by Allan Sham</p>
        <a href="https://github.com/shammy8" target="_blank"> <i class="fa fa-github" style="font-size: 36px; color:white;"></i></a>
    </footer>    

    </div> <!--end of fix overflow -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
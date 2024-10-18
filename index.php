<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FoodieConnect</title>
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1>
                    <a class="navbar-brand" href="index.php">
                        <i class="fa fa-cutlery" aria-hidden="true"></i> FoodieConnect
                    </a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.php">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="sell.php">Sell</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog2.php">Recipes blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="feedback.html">Feedbacks</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li> -->
                    </ul>
                </div>
                <!-- search button -->
                <div class="search-right">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <h4 class="search-pop-text-w3 text-white text-center mb-4">Search Your Favourite Food Here
                            </h4>
                            <form action="#search" method="GET" class="search-box">
                                <div class="input-search"> <span class="fa fa-search mr-2"
                                        aria-hidden="true"></span><input type="search" placeholder="Enter Keyword"
                                        name="search" required="required" autofocus="">
                                </div>
                                <button type="submit" class="btn button-style">Search</button>
                            </form>
                        </div>
                        <a class="close" href="#close">×</a>
                    </div>
                    <!-- //search popup -->
                </div>
                <!-- //search button -->
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->
    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 pt-md-0 pt-4">
                    <div class="typewr">
                    <p style="font-family: 'Montserrat', sans-serif;">FoodieConnect helps you 
                        <span class="typed-text"></span>!<span class="cursor"> </span></p>
                    </div>
                    <br><br>
                    <div class="newbtn">
                        <a class="btn button-style" href="menu.html">Buy</a>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <a class="btn button-style" href="sell.php">Sell</a>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <a class="btn button-style" href="blog2.php">Blog</a>
                    </div>

                    <p class="subtext"> </p>
                   
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <img id="myImage" src="new/dosaveg.png"  class="plate" onclick="changeImage()">
                </div>
                <style>
                    @import url('https://fonts.googleapis.com/css?family=Montserrat');
                  
                        .plate{
                            max-width: 80%;
                            height: auto;
                            transition: -webkit-transform .5s;
                            }
                            .plate:hover {
                            cursor: pointer;
                            transform: scale(1.2);
                            -webkit-transform: scale(1.2);
                            }
                            .plate:active {
                                transform: scale(0.9);
                            }

                            .subtext{
                                position: inherit;
                                height: 100px;;
                                width:max-content;
                                display: flex;
                                justify-content: left;
                                align-items: left;

                            }



            .typewr {
              height: 100px;;
              width:max-content;
              display: flex;
              justify-content: left;
              align-items: left;
            }
            .typewr p {
              font-size: 2rem;
              padding: 0.5rem;
              font-weight: bold;
              letter-spacing: 0.1rem;
              text-align: left;
              overflow: visible;
            }
            .typewr p span.typed-text {
              font-weight: normal;
              color: #18DC6D;
            }
            .typewr p span.cursor {
              display: inline-block;
              background-color: #ccc;
              margin-left: 0.1rem;
              width: 3px;
              animation: blink 1s infinite;
            }
            .typewr p span.cursor.typing {
              animation: none;
            }
            @keyframes blink {
              0%  { background-color: #ccc; }
              49% { background-color: #ccc; }
              50% { background-color: transparent; }
              99% { background-color: transparent; }
              100%  { background-color: #ccc; }
            }
                </style>
                <script>
                    function changeImage()
                     {
                        var image = document.getElementById('myImage');
                        if (image.src.match("new/dosaveg.png")){
                            image.src = "new/all.png";

                        }
                        else if (image.src.match("new/all.png")){
                            image.src = "new/dosa.png";

                        } else {
                            image.src="new/dosaveg.png";
                        } }
                  function changeImage2()
                  {
                        var image = document.getElementById('myImage2');
                        if (image.src.match("new/berry.png")){
                            image.src = "new/cherry.png";

                        }
                        else if (image.src.match("new/cherry.png")){
                            image.src = "new/lemon.png";

                        } else {
                            image.src="new/berry.png";
                        } 
                    }
                        function changeImage3(){
                   
                        var image = document.getElementById('myImage3');
                        if (image.src.match("new/berries.png")){
                            image.src = "new/tomato.png";

                        }
                        else if (image.src.match("new/tomato.png")){
                            image.src = "new/orange.png";

                        } else {
                            image.src="new/berries.png";
                        } 
                    }



                    const typedTextSpan = document.querySelector(".typed-text");
                const cursorSpan = document.querySelector(".cursor");
                
                const textArray = [" Buy Food", " Sell Food", " Blog about Food",];
                const typingDelay = 200;
                const erasingDelay = 100;
                const newTextDelay = 1500; // Delay between current and next text
                let textArrayIndex = 0;
                let charIndex = 0;
                
                function type() {
                  if (charIndex < textArray[textArrayIndex].length) {
                    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                    typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                    charIndex++;
                    setTimeout(type, typingDelay);
                  } 
                  else {
                    cursorSpan.classList.remove("typing");
                      setTimeout(erase, newTextDelay);
                  }
                }
                
                function erase() {
                    if (charIndex > 0) {
                    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
                    typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex-1);
                    charIndex--;
                    setTimeout(erase, erasingDelay);
                  } 
                  else {
                    cursorSpan.classList.remove("typing");
                    textArrayIndex++;
                    if(textArrayIndex>=textArray.length) textArrayIndex=0;
                    setTimeout(type, typingDelay + 1100);
                  }
                }
                
                document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
                  if(textArray.length) setTimeout(type, newTextDelay + 250);
                });
                </script>
            </div>
        </div>
        <img id="myImage2" src="new/berry.png"  class="berry" alt="" onclick="changeImage2()">
        <img id="myImage3" src="new/berries.png"  class="berr" alt="" onclick="changeImage3()">
        <style>
             .berry{
                position:absolute;
                left: 86%;
                right: 10%;     
                top: 4%;
                max-width: 12%;
                transition: -webkit-transform .5s;
                }
                .berry:hover {
                    cursor: pointer;
                    transform: scale(1.2);
                -webkit-transform: scale(1.2);
                }
                .berry:active {
                    transform: scale(0.9);
                    }

                    .berr{
                    position:absolute;
                    right: 82%;
                    bottom: 2%;
                    z-index: 0;
                    max-width: 19%;
                   
                    transition: -webkit-transform .5s;
                    }
                    .berr:hover {
                        cursor: pointer;
                        transform: scale(1.2);
                    -webkit-transform: scale(1.2);
                    }
                    .berr:active {
                        transform: scale(0.9);
                        }
        </style>
        
    </section>
    <!-- //banner section -->
    <!-- about section -->

    <div class="w3l-content-photo-5">
        <div class="content pb-5 pt-md-5 pt-4">
            <div class="container py-lg-4 py-md-3">
                <div class="row">
                    <div class="col-lg-6 content-photo">
                        <a href="#image"><img src="assets/images/about.png" class="img-responsive"
                                alt="content-photo"></a>
                    </div>
                    <div class="col-lg-6 content-left mb-md-0 mb-3">
                        <h3>Welcome To <span>FoodieConnect</span></h3>
                        <p>Where food enthusiasts come together to explore, create, and share culinary experiences like never before.</p>
                        <p>Our mission is to create a vibrant community where food lovers from around the globe can connect, 
                            inspire, and delight in the joys of cooking and sharing delicious recipes.</p>
                        <p>We are committed to fostering creativity, celebrating diversity in flavors, and promoting sustainable practices within 
                            the culinary community. We believe in the power of food to bring joy, health, and connection to people's lives.</p>
                        <a class="btn button-style" href="about.html">Read More </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //about section -->
    <!-- team with grids section -->
    <section class="w3l-content-11-main">
        <div class="content-design-11 pt-md-4 pt-1 pb-5">
            <div class="container pb-md-4 pb-3">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <h3 class="title-main-2 text-center p-lg-4">We primarily made this website to reduce the Food Crisis</h3>
                    </div>
                    <div class="col-lg-7 mt-lg-0 mt-sm-5 mt-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="position-relative">
                                    <img src="new/fdwst1.jpg" class="img-responsive" alt="content-photo">
                                    <div class="text-position">
                                        <h4><a href="about.html">Approximately one-third of the food produced globally is wasted.</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-sm-0 mt-4">
                                <div class="position-relative">
                                    <img src="new/fdwst2.jpg" class="img-responsive" alt="content-photo">
                                    <div class="text-position">
                                        <h4><a href="about.html">Reducing food waste is crucial for achieving food 
                                            security and sustainability. </a></h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="text-align-last: right;"> Read article: <a href="https://www.fao.org/platform-food-loss-waste/regions/neareast/resources/publications/2/en?tabInx=0#:~:text=Reducing%20food%20loss%20and%20waste,in%20the%20Sustainable%20Development%20Goals.> here " target="_blank"> How important is reducing food waste?</a> </p>
                </div>
                <div class="content-sec-11 mt-5 pt-lg-4">
                    <div class="row">
                        <div class="col-md-6 columns">
                            <div class="icon-eff">
                                <span class="fa fa-cutlery" aria-hidden="true"></span>
                            </div>
                            <div class="right-side">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                    porttitor vehicula nullam augue ipsum dolor.</p>
                                <a href="#services" class="read-button">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-6 columns mt-md-0 mt-4">
                            <div class="icon-eff">
                                <span class="fa fa-coffee" aria-hidden="true"></span>
                            </div>
                            <div class="right-side">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                    porttitor vehicula nullam augue ipsum dolor.</p>
                                <a href="#services" class="read-button">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-md-5 mt-4">
                        <div class="col-md-6 columns">
                            <div class="icon-eff">
                                <span class="fa fa-beer" aria-hidden="true"></span>
                            </div>
                            <div class="right-side">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                    porttitor vehicula nullam augue ipsum dolor.</p>
                                <a href="#services" class="read-button">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-6 columns  mt-md-0 mt-4">
                            <div class="icon-eff">
                                <span class="fa fa-apple" aria-hidden="true"></span>
                            </div>
                            <div class="right-side">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                    porttitor vehicula nullam augue ipsum dolor. </p>
                                <a href="#services" class="read-button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //team with grids section -->
    <!-- video section -->

    <!-- //video section -->
    <!-- blog section -->
    <section class="w3l-blog-sec py-5">
        <div class="services-layout py-md-4 py-3">
            <div class="container">
                <h3 class="title-big mb-4 pb-2">Blog Posts</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-6 column column-img" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <h3 class="date">21<sup>st</sup> October</h3>
                                <a href="blog2.php">
                                    <figure>
                                        <img class="img-responsive" src="assets/images/blog1.jpg" alt="blog-image">
                                    </figure>
                                </a>
                                <h3> <a href="blog2.php" class="vv-link">Chicken Curry Recipe</a>
                                </h3>
                                <ul class="admin-list">
                                    <li><a href="blog2.php"><span class="fa fa-user-circle"
                                                aria-hidden="true"></span>
                                            veettamma</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-heart" aria-hidden="true"></span>200
                                            Likes</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-comments"
                                                aria-hidden="true"></span>75 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 column column-img mt-md-0 mt-4" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <h3 class="date">14<sup>th</sup> October</h3>
                                <a href="blog2.php">
                                    <figure>
                                        <img class="img-responsive" src="assets/images/blog4.jpg" alt="blog-image">
                                    </figure>
                                </a>
                                <h3> <a href="blog2.php" class="vv-link">Indian Coffee House Review</a>
                                </h3>
                                <ul class="admin-list">
                                    <li><a href="blog2.php"><span class="fa fa-user-circle"
                                                aria-hidden="true"></span>
                                            vlogger</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-heart" aria-hidden="true"></span>2.1k
                                            Likes</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-comments"
                                                aria-hidden="true"></span>200 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4 column column-img" id="zoomIn">
                        <div class="services-gd">
                            <div class="serve-info">
                                <h3 class="date">4<sup>th</sup> November</h3>
                                <a href="blog2.php">
                                    <figure>
                                        <img class="img-responsive" src="assets/images/blog3.jpg" alt="blog-image">
                                    </figure>
                                </a>
                                <h3> <a href="blog2.php" class="vv-link">How to have a healthy diet</a>
                                </h3>
                                <ul class="admin-list">
                                    <li><a href="blog2.php"><span class="fa fa-user-circle"
                                                aria-hidden="true"></span>
                                            K7-uncle</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-heart" aria-hidden="true"></span>23
                                            Likes</a></li>
                                    <li><a href="blog2.php"><span class="fa fa-comments"
                                                aria-hidden="true"></span>0 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //blog section -->
    <!-- call section -->
    <section class="w3l-call-to-action-6">
        <div class="call-vv-action py-5">
            <div class="container py-md-4 py-3">
                <div class="grid">
                    <div class="float-lt">
                        <h3 class="title-big">Contact us now!</h3>
                        <p>For Online queries, please call us today</p>
                    </div>
                    <div class="float-rt text-right">
                        <ul class="buttons">
                            <li class="phone"><span class="fa fa-volume-control-phone mr-1" aria-hidden="true"></span>
                                <a class="call-style-w3" href="tel:+1(23) 456 789 0000">+1(23) 456 789 0000</a>
                            </li>
                            <li class="green">Or</li>
                            <li><a href="contact.html" class="btn button-style">Get in touch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //call section -->
    <!-- 3 grids -->
    <section class="w3l-features-4">
        <div class="features4-block text-center py-5">
            <div class="container py-md-5 py-3">
                <div class="row features4-grids">
                    <div class="col-lg-4 col-md-6">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fa fa-motorcycle" aria-hidden="true"></span>
                            </div>
                            <h5><a href="contact.html">Fast Ordering</a></h5>
                            <p>Our efficient system helps you order food fast.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fa fa-shopping-basket" aria-hidden="true"></span>
                            </div>
                            <h5><a href="contact.html">Fresh Ingredients</a></h5>
                            <p>Our site will only provide food that is verified by experts.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                        <div class="features4-grid">
                            <div class="feature-images">
                                <span class="fa fa-laptop" aria-hidden="true"></span>
                            </div>
                            <h5><a href="contact.html">Online Suport 24/7</a></h5>
                            <p>We have an all time active support system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 3 grids -->
    <!-- promocode section -->
    <section class="w3l-promocode">
        <div class="promo-block pt-md-0 pt-4">
            <div class="container">
                <div class="row aap-4-section">
                    <div class="col-lg-6 app4-right-image">
                        <img src="assets/images/img3.png" class="img-responsive" alt="App Device" />
                    </div>
                    <div class="col-lg-6 app4-left-text pl-lg-0 mb-lg-0 mb-sm-2 mb-4">
                        <h6>want to volunteer at foodies?</h6>
                        <h4>Get In Touch With Us Now</h4>
                        <p class="mb-4"> Become a part of our team and help us reduce food wastes by volunteering in food collections, 
                            donation events, etc. send a mail to know the details.
                            </p>
                        <div class="app-4-connection">
                            <div class="newsletter">
                                <label>Become a Foodie and get extra discounts!</label>
                                <form action="#" methos="GET" class="d-flex wrap-align">
                                    <input type="email" placeholder="Enter your email id" required="required" />
                                    <button type="submit">Get Discounts</button>
                                </form>
                            </div>
                            <p class="mobile-text-app mt-4 pt-2">To Get Our Mobile Apps</p>
                            <div class="app-4-icon">
                                <ul>
                                    <li><a href="#url" title="Apple" class="app-icon apple-vv"><span class="fa fa-apple"
                                                aria-hidden="true"></span></a></li>
                                    <li><a href="#url" title="Google play" class="app-icon play-vv"><span
                                                class="fa fa-play" aria-hidden="true"></span></a></li>
                                    <li><a href="#url" title="Microsoft" class="app-icon windows-vv"><span
                                                class="fa fa-windows" aria-hidden="true"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //promocode section -->
    <!-- footer -->
    <section class="w3l-footer-16">
        <div class="w3l-footer-16-main">
            <div class="container">
                <div class="row footer-p">
                    <div class="col-lg-4 pr-lg-5">
                        <a class="logo" href="index.php"><i class="fa fa-cutlery" aria-hidden="true"></i> FoodieConnect</a>
                        <p class="mt-4">Duis imperdiet sapien tortor, vitae congue diam auctor vitae. Aliquam
                            eget turpis ornare, euismod ligul aeget, enenatis dui. </p>
                    </div>
                    <div class="col-lg-4 mt-lg-0 mt-4">
                        <h3>Pages</h3>
                        <div class="row">
                            <div class="col-6 column">
                                <ul class="footer-gd-16">
                                    <li><a href="index.php"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i>Home</a></li>
                                    <li><a href="about.html"><i class="fa fa-angle-right" aria-hidden="true"></i>About
                                            Us</a></li>
                                    <li><a href="sell.php"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i>Sell</a></li>
                                    <li><a href="blog2.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Recipe Blogs
                                            </a></li>
                                    <li><a href="contact.html"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-6 column pl-0">
                                <ul class="footer-gd-16">
                                    <li><a href="menu.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Product Menu</a></li>
                                    <li><a href="#privacy"><i class="fa fa-angle-right" aria-hidden="true"></i>Privacy
                                            Policy</a></li>
                                    <li><a href="terms.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Terms and
                                            conditions</a></li>
                                    <li><a href="#faq"><i class="fa fa-angle-right" aria-hidden="true"></i>FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 column mt-lg-0 mt-4">
                        <h3>Newsletter </h3>
                        <div class="end-column">
                            <h3>Subscribe Here Now</h3>
                            <form action="#" class="subscribe" method="post">
                                <input type="email" name="email" placeholder="Email Address" required="">
                                <button><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                            </form>
                            <p>Subscribe to our mailing list and get updates to your email inbox.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
                    <div class="columns text-lg-left">
                        <p class="copy-text">@ 2020 Foodies. All rights reserved. Design by <a
                                href="https://w3layouts.com/" target="_blank">
                                W3Layouts</a>
                        </p>
                    </div>
                    <div class="columns-2 mt-md-0 mt-3">
                        <ul class="social">
                            <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- theme switch js (light and dark)-->
    <script src="assets/js/theme-change.js"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the 
            // class of outer div
            // The second paramter is the speed between each letter is typed.   
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
        });
    </script>
    <!-- //magnific popup -->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->

</body>
</html>
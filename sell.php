<!DOCTYPE html>
<html lang="en">
<head>
<?php 
 session_start();
 include("db_connect.php");
 
 // Ensure the user is logged in
 if (!isset($_SESSION['email']) || !isset($_SESSION['usertype'])) {
     // Redirect to login page if not logged in
     header("Location: login.html");
     exit();
 }
 
 // Check if the user is of type 'seller'
 if ($_SESSION['usertype'] === 'customer' && basename($_SERVER['PHP_SELF']) === 'sell.php') {
     echo "<script>
             alert('Login as a Customer to view the Menu page.');
             window.location.replace('login.html'); // Redirect seller to the seller-accessible page
           </script>";
     exit();
 }
 ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FoodieConnect - Sell</title>
    <!-- google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">



    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FoodieConnect - Sell</title>
    <!-- google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
       .product-form {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.field, .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-group.half-width-1, .form-group.half-width {
    width: 48%;
    display: inline-block;
    margin-right: 2%;
}

.product-form .form-group input, 
.product-form select, 
.product-form textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 6px;
    border: 1px solid #ccc;
    background: #fff;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

textarea {
    height: 100px;
}

input[type="file"] {
    margin-top: 10px;
}

.field.btn {
    display: flex;
    justify-content: center;
}

.field.btn input[type="submit"] {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.field.btn input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .form-group.half-width-1, .form-group.half-width {
        width: 100%;
        margin-right: 0;
    }
}

</style>
<script>

        document.addEventListener("DOMContentLoaded", function() {
            const groceriesText = document.querySelector(".title-text .groceries");
            const groceriesForm = document.querySelector("form.groceries");
            const groceriesBtn = document.querySelector("label.groceries");
            const cookedBtn = document.querySelector("label.cooked");
            const farmedBtn = document.querySelector("label.farmed");
            const cookedLink = document.querySelector("form .cooked-link a");

            cookedBtn.onclick = () => {
                groceriesForm.style.marginLeft = "-33.33%";
                groceriesText.style.marginLeft = "-33.33%";
            };

            farmedBtn.onclick = () => {
                groceriesForm.style.marginLeft = "-66.66%";
                groceriesText.style.marginLeft = "-66.66%";
            };

            groceriesBtn.onclick = () => {
                groceriesForm.style.marginLeft = "0%";
                groceriesText.style.marginLeft = "0%";
            };

            cookedLink.onclick = () => {
                cookedBtn.click();
                return false;
            };
        });
    </script>
   
     <!--header-->
     <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1>
                    <a class="navbar-brand" href="index.php">
                        <i class="fa fa-cutlery" aria-hidden="true"></i> FoodieConnect
                    </a>
                </h1>
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
                        <li class="nav-item"><a class="nav-link" href="blog.php">Recipes blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.html">Feedbacks</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <!-- search button -->
                <div class="search-right">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <h4 class="search-pop-text-w3 text-white text-center mb-4">Search Your Favourite Food Here</h4>
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
                <!-- Toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox" onchange="toggleTheme()">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>
    </header>
</head>
<body>
<section id="sell" class="w3l-blog py-5">
        <div class="container py-lg-5 py-4">
            <div class="blog-list mx-auto">
                <h3 class="mb-4 text-center">Sell Your Food Items:</h3>
                <div class="wrapper">
        <div class="title-text">
        </div>
       <div class="form-inner">
      
<!--products-->
<form method="post" action="sell.php" class="product-form" enctype="multipart/form-data">
    <!-- Product Name -->
    <div class="field">
        <input type="text" name="p_name" placeholder="Product Name" required>
        <span class="error"></span>
    </div>

    <!-- Category Selection -->
    <div class="form-group">
        <label for="category">Category</label>
        <select id="category" name="category" required>
            <option value="" disabled selected>Select Category</option>
            <option value="Groceries">Groceries</option>
            <option value="Cooked Food">Cooked Food</option>
            <option value="Farmed Products">Farmed Products</option>
        </select>
        <span class="error"></span>
    </div>

    <!-- Expiry Date -->
    <div class="form-group">
        <label>Expiry Date:</label>
        <input type="date" name="p_expiry_date" required>
        <span class="error"></span>
    </div>

    <!-- Packed Date -->
    <div class="form-group">
        <label>Packed Date:</label>
        <input type="date" name="p_packed_date" required>
        <span class="error"></span>
    </div>

<!-- Sell or Donate Option -->
<div class="form-group">
    <label for="sellOrDonate">Choose Option:</label>
    <select id="sellOrDonate" name="sellOrDonate" onchange="togglePriceBox()" required>
        <option value="" disabled selected>Select Option</option>
        <option value="sell">Sell</option>
        <option value="donate">Donate</option>
    </select>
</div>

<!-- Price Field (Only for "Sell" Option) -->
<div id="price-group" class="form-group hidden">
    <input type="number" class="form-control" id="p_mrp" name="p_mrp" placeholder="Enter price" step="0.01">
    <span class="error"></span>
</div>

<!-- Good Job Message (Only for "Donate" Option) -->
<div class="form-group hidden" id="good-job">Good job! Thank you for donating.</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var actionDropdown = document.getElementById('sellOrDonate');
        var priceGroup = document.getElementById('price-group');
        var goodJobMessage = document.getElementById("good-job");

        // Show or hide elements based on selection
        actionDropdown.addEventListener('change', function() {
            if (actionDropdown.value === 'sell') {
                priceGroup.classList.remove('hidden');  // Show price input
                goodJobMessage.classList.add('hidden'); // Hide donation message
            } else if (actionDropdown.value === 'donate') {
                priceGroup.classList.add('hidden');     // Hide price input
                goodJobMessage.classList.remove('hidden'); // Show donation message
            } else {
                // Default state (no selection)
                priceGroup.classList.add('hidden');
                goodJobMessage.classList.add('hidden');
            }
        });

        // Trigger change event to set initial visibility
        actionDropdown.dispatchEvent(new Event('change'));
    });
</script>

<style>
    .hidden {
        display: none;
    }
</style>


    <!-- Product Description -->
    <div class="form-group">
        <textarea name="p_description" placeholder="Enter Description" required></textarea>
        <span class="error"></span>
    </div>

    <!-- Image Upload -->
    <div class="form-group">
        <label>Upload Product Image:</label>
        <input type="file" name="p_pic" accept="image/*" required>
    </div>

    <!-- Submit Button -->
    <div class="field btn">
        <input type="submit" value="Submit">
    </div>
</form>

            </div>
        </div>
    </div>
</div></div></section>

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
                                    <li><a href="blog.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Recipe Blogs
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
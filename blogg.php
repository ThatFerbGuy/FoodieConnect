<!doctype html>
<html lang="en">
<?php

session_start();
include("db_connect.php"); // Database connection
$is_logged_in = isset($_SESSION['email']);
// Handle blog post submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];
    $query = $conn->prepare("INSERT INTO blogs (title, content, author_id) VALUES (?, ?, ?)");
    $query->bind_param('ssi', $title, $content, $author_id);
    $query->execute();
}

// Handle blog post submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['email'])) {
    $blog_title = $_POST['blog_title'];
    $blog = $_POST['blog'];
    $reg_id = $_SESSION['reg_id'];
    $query = $conn->prepare("INSERT INTO blog (blog_title, blog, reg_id) VALUES (?, ?, ?)");
    $query->bind_param('ssi', $blog_title, $blog, $reg_id);
    $query->execute();
}

// Fetch all blogs
$blog = $conn->query("SELECT b.blog_title, b.blog, b.blog_date, r.name AS author FROM blog b JOIN registration r ON b.reg_id = r.reg_id ORDER BY b.blog_date DESC");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogTitle = mysqli_real_escape_string($conn, $_POST['blogTitle']);
    $blog = mysqli_real_escape_string($conn, $_POST['blog']);

    // File upload handling (same as the provided code)
    $uploaded_files = [];
    if (isset($_FILES['blogImage']) && count($_FILES['blogImage']['name']) > 0) {
        $upload_dir = "uploads/blog_images/";
        foreach ($_FILES['blogImage']['name'] as $key => $filename) {
            $filetype = $_FILES['blogImage']['type'][$key];
            $filesize = $_FILES['blogImage']['size'][$key];
            $filetmp = $_FILES['blogImage']['tmp_name'][$key];

            // Validate file type and size
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $max_size = 5 * 1024 * 1024; // 5MB

            if (in_array($filetype, $allowed_types) && $filesize <= $max_size) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $newfilename = uniqid() . "." . $ext;
                $filepath = $upload_dir . $newfilename;

                // Move the file to the target directory
                if (move_uploaded_file($filetmp, $filepath)) {
                    $uploaded_files[] = $filepath; // Store the path of the uploaded file
                }
            }
        }
    }

    // Convert array of file paths to JSON string for storage
    $images_json = json_encode($uploaded_files);

    // Insert blog data into the database
    $sql = "INSERT INTO blog (blog_title, blog, images) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $blog_title, $blog, $images_json);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Blog posted successfully!');</script>";
    } else {
        echo "<script>alert('Error posting blog.');</script>";
    }

    // Close connection
    mysqli_stmt_close($stmt);
}

// Fetch all blogs from the database
$sql = "SELECT * FROM blog ORDER BY blog_id DESC";
$result = mysqli_query($conn, $sql);
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FoodieConnect - Blogs</title>
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
                        <?php if (isset($_SESSION['email'])): ?>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="sell.php">Sell</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li> 
                        <li class="nav-item"><a class="nav-link" href="feedback.html">Feedbacks</a></li> 
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>    
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>                        
                      
                        <?php endif; ?>
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


 <!-- write blog-->
  <section class="w3l-blog-sec py-5">
  <div class="services-layout py-md-4 py-3">
  <h3 class="mb-4 text-center">Recipes and Blogs</h3>
  <button id="writeb" class="writeb" >Write Blog</button>
  
  <style>
    .writeb {
  margin-left: 10%;
  padding: 12px 38px;
  font-size: 16px;
  color: #fff;
  background: var(--secondary-color);
  border-radius: 10px;
  font-weight: 500;

}

.write-style:hover {
  transform: translate3d(0, -5px, 0);
  -webkit-transform: translate3d(0, -5px, 0);
  color: #fff;
  opacity: .8;
}
  </style>
 <div id="blogForm" style="display:none;">

   <!-- write Blog Section -->
   <section class="w3l-blog-sec py-5">
        <div class="services-layout py-md-4 py-3">
            <div class="container">
                <div class="row">
                    <!-- Existing blog posts here -->
                    <!-- Add new blog post form -->
                    <div class="col-12 mt-4">
                   
    <section>
        <div class="services-layout py-md-4 py-3">
            <div class="container">
            <?php if (isset($_SESSION['email'])): ?>
                <form action="blog.php" method="post" enctype="multipart/form-data">

            <!-- Blog submission form -->
            <h4>Write a Blog/Recipe</h4>
            <form>
                    <fieldset class="inputs">
                        <div class="form-group">
                            <label for="blog_title">Blog/Recipe Title</label>
                            <input type="text" class="form-control" id="blog_title" name="blog_title" required>
                        </div>
                        <div class="form-group">
                            <label for="blog">Content</label>
                            <textarea type="text" class="form-control" id="blog" name="blog" rows="5" placeholder="Write here..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="blogImage">Attach Images</label>
                            <input type="file" class="form-control-file" id="blog_img" name="blog_img[]" multiple>
                        </div>
                    </fieldset>
                    <fieldset class="actions">
                        <button id="submit" type="submit" class="btn button-style">Post</button>
                    </fieldset>      
                </form>
        <?php else: ?>
            <h4><a href="login.html">Login</a> to Write a Blog/Recipe</h4>
        <?php endif; ?>
         
            </div>
        </div>
    </section>

   
    <style>
	.containerDetails {
    position: relative;
		margin-top: 0px;
		margin-left: auto;
		margin-right: auto;
		width:100%;/*Media*/
    height: auto;
		background:url(http://jotform.us/images/big-back.png) repeat-x rgb(241, 241, 241);
		color:black !important;
		font-family:'Verdana';
		font-size:18px;
		padding-top: 20px;
    padding-bottom: 25px;
		-moz-box-shadow: 0px 5px 10px 0px #333, 0px -3px 10px 0px #333;
		-webkit-box-shadow: 0px 5px 10px 0px #333, 0px -3px 10px 0px #333;
		box-shadow: 0px 5px 10px 0px #333, 0px -3px 10px 0px #333;
		
		-moz-border-radius:.5em;
		-webkit-border-radius:.5em;
		border-radius:.5em;
	}

#submit:hover {
  -moz-transition-property: background;
	-moz-transition-timing-function: ease-in-out;
	-moz-transition-duration: 0.3s;
	-webkit-transition-property: background;
	-webkit-transition-timing-function: ease-in-out;
	-webkit-transition-duration: 0.3s;
	transition-property: background;
	transition-timing-function: ease-in-out;
 transition-duration: 0.3s;
  color: #ffffff !important;
	border:1px solid #0c8910 !important;
	background: #46af69; /* old browsers */
	background: -moz-linear-gradient(top, #6fe1aa 0%, #46af69 100%); /* firefox */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6fe1aa), color-stop(100%,#46af69)); /* webkit */
	background: linear-gradient(top, #7ee16f 0%, #46af57 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#6fe1aa', endColorstr='#46af69', GradientType=0 ); /* ie */
}
#submit:active {
color: #ffffff !important;
		border:1px solid #0c8910 !important;
		background: #4baf46; /* old browsers */
		background: -moz-linear-gradient(top, #64af46 0%, #6fe180 100%); /* firefox */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#46af67), color-stop(100%,#6fe18b)); /* webkit */
		background: linear-gradient(top, #46af69 0%, #6fe1aa 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#46af69', endColorstr='#6fe1aa', GradientType=0 ); /* ie */
		
		-moz-box-shadow:inset 0px 0px 0px 1px rgba(147, 255, 221, 0.3), 0px 1px 1px 0px rgba(0, 0, 0, 0.30);
		-webkit-box-shadow:inset 0px 0px 0px 1px rgba(147, 255, 183, 0.3), 0px 1px 1px 0px rgba(0, 0, 0, 0.30);
		box-shadow:inset 0px 0px 0px 1px rgba(147, 255, 208, 0.3), 0px 1px 1px 0px rgba(0, 0, 0, 0.30);
}

#text-box {
  float:none;
  clear:both;
  background: #f1f1f1;
  padding: 6px;
  margin-top: 0px;/**/
  margin-bottom: 0px;/**/
  width: 95%;/*Media*/
  height: 100px;
  font-family: 'Merriweather Sans', sans-serif;
  font-size: 14px;
  border: 1px solid #82e895;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: 0 1px 1px #82e88a inset;
  -webkit-box-shadow: 0 1px 1px #a4e882 inset;
  box-shadow: 0 1px 1px #82e88c inset;
}
#text-box:focus {
  background-color: #fff;
  border-color: #82e891;
  outline: none;
  -moz-box-shadow: 0 0 0 1px #82e887 inset;
  -webkit-box-shadow: 0 0 0 1px #a2e882 inset;
  box-shadow: 0 0 0 1px #90e882 inset;
}
#submit {
    float: left;
  	cursor: pointer;
    margin-right: 8px;
    margin-bottom: -20px;
	
		-moz-border-radius:.2em;
		-webkit-border-radius:.2em;
		border-radius:.2em;
	
		padding:8px 25px;
	
		color: #ffffff;
		font-family: 'Merriweather Sans', sans-serif;
		font-size: 13px;
		font-weight: bold;
		text-shadow:0px -1px 0px #14531b;
	
		border:1px solid #0c8910;
	
		-moz-box-shadow:inset 0px 0px 0px 1px rgba(147, 187, 255, 0.30), 0px 2px 2px 0px rgba(0, 0, 0, 0.30);
		-webkit-box-shadow:inset 0px 0px 0px 1px rgba(147, 187, 255, 0.30), 0px 2px 2px 0px rgba(0, 0, 0, 0.30);
		box-shadow:inset 0px 0px 0px 1px rgba(147, 187, 255, 0.30), 0px 2px 2px 0px rgba(0, 0, 0, 0.30);
	
		background: #309655; /* old browsers */
		background: -moz-linear-gradient(top, #52c86a 0%, #309655 100%); /* firefox */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#52c86a), color-stop(100%,#309655)); /* webkit */
		background: linear-gradient(top, #52c86a 0%, #309655 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#52c86a', endColorstr='#309655', GradientType=0 ); /* ie */
}

fieldset {
  border: 0;
}

#post-container {
  background: #CCC;
  text-align: left;
  margin-left: 10px;
  margin-right: 10px;
  width: auto;
  height: auto;
  border-radius: 10px;
  box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
.posted {
  margin-top: 30px;
  padding: 5px;
}

.post {
  position: relative;
  border-top: 2px dotted #333;
  font-family: 'Merriweather Sans', sans-serif;
  margin-top: 20px;
}
.post h4{
  font-size: 0.9em;
  font-weight: normal;
  line-height: 1.5em;
  text-transform: uppercase;
  margin-top: -0.75em;
  text-align: center;
}
.post h4 span {
  background: #CCC;
  padding: 0 5px;
}

.pcontent {
  position: relative;
  padding: 20px;
}
#TimeSub {
  position: relative;
  margin-left: 1em;
  font-size: .6em;
}

.inputs span.counter {
 float: right;
 color: #000;
  font-size:10px;
  padding:10px;
}

.inputs p.info {
 font-size: 11px;
 color: #000;
  float:left;
  padding:5px;
}
.inputs p.info > span {
 color: #a50505; 
}

    </style>
    <script>
        $(document).ready(function() {
  //timer
   //please dont change any thing here without my permission / mar!am
        var myVar = setInterval(function () { myTimer() }, 1000);

        function myTimer() {
            var Temp = new Date();
            //start get day
            var weekdays = new Array(7);
            weekdays[0] = "Sun";
            weekdays[1] = "Mon";
            weekdays[2] = "Tue";
            weekdays[3] = "Wed";
            weekdays[4] = "Thu";
            weekdays[5] = "Fri";
            weekdays[6] = "Sat";
            var current_date = new Date();
            weekday_value = current_date.getDay();
            //end get day
            //get day as number
            var d = Temp.getDate();
            //start get month
            var month = new Array();
            month[0] = "Jan";
            month[1] = "Feb";
            month[2] = "Mar";
            month[3] = "Apr";
            month[4] = "May";
            month[5] = "Jun";
            month[6] = "Jul";
            month[7] = "Aug";
            month[8] = "Sep";
            month[9] = "Oct";
            month[10] = "Nov";
            month[11] = "Dec";
            var m = month[Temp.getMonth()];
            //end get month

            //start get year
            var y = Temp.getFullYear();
            //end get year

            //start get time
          var t = Temp.getHours()+':'+Temp.getMinutes()+":"+Temp.getUTCDate();
            //end get time
            document.getElementById("TimeSpan").innerHTML = weekdays[weekday_value] + ' - ' + d + ' ' + m + ' ' + y;

   document.getElementById("TimeSub").innerHTML = t;
        }

  //just do this once to prevent the form from looking weird without any posts
    $('#submit').one('click', function() {
        $('#post-container').addClass("posted");
      
    });
    $('#submit').click(function() {
      
        $('#submit').hide('slow');
        var post = $('#text-box').val();
        var wrap = '<div class="post"><h4><span id="TimeSpan"></span></h4><div class="pcontent">' + post + '<sub id="TimeSub"></sub></div></div>';
        $('#post-container').prepend(wrap);
        $('#text-box').val("");
    });
  
});
//
$(document).ready(function () {
    var comment = $('#text-box'),
        counter = '',
        counterValue = 140, //change this to set the max character count
        minCommentLength = 5, //set minimum comment length
        $commentValue = comment.val(),
        $commentLength = $commentValue.length,
        submitButton = $('#submit').hide();
  
    $('.inputs').prepend('<span class="counter"></span>').append('<p class="info">Min length: <span></span></p>');
    counter = $('span.counter');
    counter.html(counterValue); //display your set max length
    comment.attr('maxlength', counterValue); //apply max length to textarea
    $('.inputs').find('p.info > span').html(minCommentLength);
    // everytime a key is pressed inside the textarea, update counter
    comment.keyup(function () {
      var $this = $(this);
      $commentLength = $this.val().length; //get number of characters
      counter.html(counterValue - $commentLength); //update counter
      if ($commentLength > minCommentLength - 1) {
        submitButton.fadeIn(200);
      } else {
        submitButton.fadeOut(200);
      }
    });
  });
    </script>
    </section>
<!--This is the script for write button show and hide -->
    
<script>
    document.getElementById('writeb').addEventListener('click', function() {
        var form = document.getElementById('blogForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>
</section>


 <!--// write blog-->
 
    <section>
        <div class="container">
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                $blog_img = json_decode($row['blog_img'], true); // Decode JSON to array
            ?>
            <div class="blog-post">
                <h5><?php echo htmlspecialchars($row['blog_title']); ?></h5>
                <p><?php echo nl2br(htmlspecialchars($row['blog'])); ?></p>
                <?php if (!empty($images)) { ?>
                    <div class="blog-images">
                        <?php foreach ($images as $image) { ?>
                            <img src="<?php echo $blog_img; ?>" alt="Blog Image" style="max-width: 100%; height: auto;">
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <hr>
            <?php } ?>
        </div>
    </section>


    <!-- blog started-->
    <section class="w3l-blog-sec py-5">
        <div class="services-layout py-md-4 py-3">
            <div class="container">
                <h3 class="title-big mb-4 pb-2">Blog Posts</h3>
                <div class="row">

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Display</title>
    <link rel="stylesheet" href="style-starter.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <div class="blog-post">
            <h2 class="blog-title">The Journey of Culinary Delights</h2>
            <p class="blog-meta">By <span class="author">John Doe</span> on <span class="date">October 19, 2024</span></p>
            <div class="blog-content">
                <p>Welcome to the world of culinary wonders, where flavors meet creativity...</p>
            </div>
            <div class="blog-images">
                <img src="image1.jpg" alt="Blog Image 1" class="img-fluid">
                <img src="image2.jpg" alt="Blog Image 2" class="img-fluid">
            </div>
        </div>
    </div>
</body>
</html>






                <main>
                <?php while ($blog = $blog->fetch_assoc()): ?>
                <div class="blog-post">
                <h4><?php echo $blog['blog_title']; ?></h4>
                <p><?php echo $blog['blog']; ?></p>
                <small>Posted by <?php echo $blog['author']; ?> on <?php echo $blog['blog_date']; ?></small>
                </div>
        <?php endwhile; ?>
        
    </main>
                   
        
                
                </div>
            </div>
        </div>


       
    <!-- //Blog Section -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
 <!-- Js scripts -->

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
                                <li><a href="menu.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Product Menu</a></li>
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
<?php
mysqli_close($conn);
?>
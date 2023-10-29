<?php

	include "connection.php";
    include "student_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="edit-profile-container">
        <div class="form">
            <div class="form-container edit-form-container feedback-container">
                <div class="form-btn">
                    <span onclick="login()" style="width: 100%;">Feedback</span>
                    <hr id="indicator" class="add-author">
                </div>
                <form action="" id="loginform" method="post" enctype="multipart/form-data">
                    <div class="star-widget-container" >
                        <div class="star-widget">
                        <input type="radio" name="rate" id="rate-5" value=5>
                        <label for="rate-5" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-4" value=4>
                        <label for="rate-4" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-3" value=3>
                        <label for="rate-3" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-2" value=2>
                        <label for="rate-2" class="fas fa-star"></label>
                        <input type="radio" name="rate" id="rate-1" value=1>
                        <label for="rate-1" class="fas fa-star"></label>
                        <header></header>
                        </div>
                    </div>
                    
                    <div class="ta">
                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment Here....." required></textarea>
                    </div>
                    
                    <button type='submit' name='submit'>Post</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        if(isset($_SESSION['login_student_username'])){
            $d=date("Y-m-d");
            mysqli_query($db,"INSERT INTO `FEEDBACK` VALUES('$_SESSION[studentid]','$_POST[rate]','$_POST[comment]','$d');");
            ?>
                <script type="text/javascript">
                alert("Feedback successful");
                </script>
                <script>
                    window.location="feedback.php";
                </script>
            <?php
        }
        
    }
    
		
	?>
   
   
</body>
</html>
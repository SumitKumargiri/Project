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
            <div class="form-container">
                <div class="form-btn form-password">
                    <span onclick="login()" style="width: 100%;">Change Password</span>
                    <hr id="indicator" class="indi-password">
                </div>
                <form action="" id="loginform" method="post">
                    <input type="text" placeholder="User Name" name="student_username" required>
                    <input type="email" placeholder="Email" name="Email" required>
                    <input type="password" placeholder="Enter New Password" name="password" id="update" required>
                    <span class='show-hide-update'><i class="fas fa-eye" id="eye-update"></i></span>
                    <button type="submit" class="btn" name="change">Change</button>
                </form>
            </div>
        </div>
    </div>
    <?php

		if(isset($_POST['change']))
		{

			$res=mysqli_query($db,"SELECT * FROM `student` WHERE student_username='$_SESSION[login_student_username]' AND Email='$_POST[Email]' ;");
			$count=mysqli_num_rows($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					alert("The username or email doesn't match.");

				</script>
				<?php
			}
			else
			{
				if(mysqli_query($db,"UPDATE student SET Password='$_POST[password]' WHERE student_username='$_SESSION[login_student_username]' AND Email='$_POST[Email]';"))
				{
					?>
					<script type="text/javascript">
						alert("Your Password is successfully changed");
					</script>
				<?php
				}
			}
	
			
		}

	?>
   
   
    <script>
        var pass2 = document.getElementById("update");
        var showbtn2 = document.getElementById("eye-update");
        showbtn2.addEventListener("click",function(){
            if(pass2.type === "password"){
                pass2.type = "text";
                showbtn2.classList.add("hide");
            }
            else{
                pass2.type = "password";
                showbtn2.classList.remove("hide");
            }
        });
    </script>
</body>
</html>
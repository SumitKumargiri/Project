<?php

	include "connection.php";
    include "admin_navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
                    <input type="text" placeholder="User Name" name="admin_username" required>
                    <input type="password" placeholder="Enter New Password" name="password" id="update2" required>
                    <span class='show-hide-update2'><i class="fas fa-eye" id="eye-update2"></i></span>
                    <button type="submit" class="btn" name="change">Change</button>
                </form>
            </div>
        </div>
    </div>
    <?php

		if(isset($_POST['change']))
		{

			$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_SESSION[login_admin_username]';");
			$count=mysqli_num_rows($res);
			if($count==0)
			{
				?>
				<script type="text/javascript">
					alert("The username doesn't match.");

				</script>
				<?php
			}
			else
			{
				if(mysqli_query($db,"UPDATE admin SET Password='$_POST[password]' WHERE username='$_SESSION[login_admin_username]';"))
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
        var pass2 = document.getElementById("update2");
        var showbtn2 = document.getElementById("eye-update2");
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
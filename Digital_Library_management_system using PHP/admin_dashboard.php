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
    <title>Student Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="admin-dashboard">
        <div class="admin-dashboard-container">
            <div class="admin-dashboard-row">
                <?php
             		
             		$students=mysqli_query($db,"SELECT * FROM `student`");
             		$total_students=mysqli_num_rows($students);

             	?>
                <div class="dashboard-col-4"  style="background-color:#FF9900">
                    <a href="student_info.php">
                        <h3><?=$total_students;?></h3>
                        Total Students
                    </a>
                </div>
                <?php
             		$books=mysqli_query($db,"SELECT * FROM `books`");
             		$total_books=mysqli_num_rows($books);

             	?>
                <div class="dashboard-col-4" style="background-color:#006600">
                    <a href="manage_books.php">
                        <h3><?=$total_books;?></h3>
                        Books Listed
                    </a>
                </div>
                <?php
             		$authors=mysqli_query($db,"SELECT * FROM `authors`");
             		$total_authors=mysqli_num_rows($authors);

             	?>
                 <div class="dashboard-col-4" style="background-color:#990000">
                    <a href="manage_authors.php">
                        <h3><?=$total_authors;?></h3>
                        Authors Listed
                    </a>
                </div>
                <?php
                    $categories=mysqli_query($db,"SELECT * FROM `category`");
                    $total_categories=mysqli_num_rows($categories);

                ?>
                <div class="dashboard-col-4" style="background-color:#009999">
                    <a href="manage_categories.php">
                        <h3><?=$total_categories;?></h3>
                        Categories Listed
                    </a>
                </div>
                <?php
                    $requests=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where issueinfo.approve='' ");
                    $total_requests=mysqli_num_rows($requests);
                ?>
                <div class="dashboard-col-4" style="background-color:#0099FF">
                    <a href="request_info.php">
                        <h3><?=$total_requests;?></h3>
                        Total Books requests
                    </a>
                </div>
                <?php
                    $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                    $issue=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where issueinfo.approve='Yes' or issueinfo.approve='$var'");
                    $total_issue=mysqli_num_rows($issue);

                ?>
                <div class="dashboard-col-4" style="background-color:#006600">
                    <a href="manage_issued_books.php">
                        <h3><?=$total_issue;?></h3>
                        Total Books issued
                    </a>
                </div>
                <?php
                    $var='<p style="color:yellow; background-color:green;">RETURNED</p>';
                    $returned=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where issueinfo.approve='$var'");
                    $total_returned=mysqli_num_rows($returned);
                ?>
                <div class="dashboard-col-4" style="background-color:#660000">
                    <a href="returned.php">
                        <h3><?=$total_returned;?></h3>
                        Returned Lists
                    </a>
                </div>
                <?php
                    $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                    $expired=mysqli_query($db,"SELECT student.studentid,FullName,books.bookid,bookname,ISBN,price FROM student inner join issueinfo on student.studentid=issueinfo.studentid inner join books on issueinfo.bookid=books.bookid where issueinfo.approve='$var'");
                    $total_expired=mysqli_num_rows($expired);
                ?>
                <div class="dashboard-col-4" style="background-color:#FF9900">
                    <a href="expired.php">
                        <h3><?=$total_expired;?></h3>
                        Expired Lists
                    </a>
                </div>
                <?php
                    $trending=mysqli_query($db,"SELECT *FROM trendingbook;");
                    $total_trending=mysqli_num_rows($trending);
                ?>
                <div class="dashboard-col-4" style="background-color:#FF9900">
                    <a href="trending_books.php">
                        <h3><?=$total_trending;?></h3>
                        Total Trending Books
                    </a>
                </div>
            </div>
            <!-- <div class="dashboard-row">
                
            </div>
            <div class="dashboard-row">
                
            </div>     -->
     
        </div>
        <div class="footer">
        <p>&copy; 2023 Copyright by our team</p>
    </div>
    </div>
    
    
    
</body>
</html>
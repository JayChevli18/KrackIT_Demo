<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <!-- jay -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">      
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    <style>
        ._img{
            overflow: hidden;
            width: 50px;
            height: 50px;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        ._img > img{
            width: 50px;
            min-height: 50px;
        }    
    </style>

    </head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <i class="bi-back"></i>
                        <span>Krackit</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="degree_all.php">Degrees</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Institutes</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="institute_list.php">Institute List</a></li>

                                    <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Entrance Exams</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="entrance_exam.php">Entrance Exam</a></li>

                                    <li><a class="dropdown-item" href="mock.php">Mock Test</a></li>
                                </ul>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="contact.php">Contact</a>
                            </li>

                            <li class="nav-item dropdown">

                            <?php
                            $x="";
                                if(isset($_SESSION['user']))
                                {
                                    $x=$_SESSION['user'];
                                }
                                if($x!=null)
                                    {
                                        echo "<a class='nav-link' href='user_logout.php'>Logout</a>";
                                    }
                                    else
                                    {
//                                        echo "<a class='nav-link' href='loginpro.php'>Login</a>";
                                        echo "<a class='nav-link dropdown-toggle' href='#' id='navbarLightDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Login</a>";
                                        echo "<ul class='dropdown-menu dropdown-menu-light' aria-labelledby='navbarLightDropdownMenuLink'>";
                                        echo "<li><a class='dropdown-item' href='login.php'>Sign in</a></li>";
    
                                        echo "<li><a class='dropdown-item' href='sign_up_options.php'>Sign up</a></li>";
                                        echo "</ul>";
    
                                    }
                            ?>

                                <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a> -->

                                <!-- <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="login.php">Sign in</a></li>

                                    <li><a class="dropdown-item" href="sign_up_options.php">Sign up</a></li>
                                </ul> -->
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <div class="_img">
                            <?php
                            if(isset($_SESSION['user']))
                            {
                                $x=$_SESSION['user'];
                            }
                            if($x!=null)
                            {
                                $sql="select cc_profile_image from tbl_user_register where cc_email_id='$x'";
                                $res=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_assoc($res);
                                if($row['cc_profile_image']!=null)
                                {
                                    echo "<img src='" . $row['cc_profile_image'] . "'></img>";
                                }
                                else
                                {
                                    echo  "<a href='#top' class='navbar-icon bi-person smoothscroll'></a>";
                                }
                            }
                            else
                            {
                                echo  "<a href='#top' class='navbar-icon bi-person smoothscroll'></a>";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            

            
<style>
<?php
    include('alumni_nav_bar_css.php');
?>
</style>

<div class="row">
<div class="col-md-2">
    <ul>
        <br>
        <li><h4 align="center">Krackit</h4></li>
        <hr>
        <li align="center"><a href="alumni_home.php">Home</a></li>
        <li align="center"><a href="alumni_review.php">Review</a></li>
        <li  align="center">
        <?php
            if($_SESSION['alumni'])
            {
                echo "<a href='alumni_logout.php'>Logout</a>";
            }
            else
            {
                echo "<a href='login.php'>Login</a>";
            }
    ?>

        </li>
    </ul>
    
</div>
<div class="col-md-10"></div>
</div>

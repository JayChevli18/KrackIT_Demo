<style>
<?php
    include('admin_nav_bar_css.php');
?>
</style>

<div class="row">
<div class="col-md-2">
    <ul>
        <br>
        <li><h4 align="center">Krackit</h4></li>
        <hr>
        <li><a href="admin_home.php" align="center">Home</a></li>
        <li><a href="admin_course.php" align="center">Courses</a></li>
        <li><a href="admin_ins_dept.php" align="center">Departments</a></li>
        <li><a href="admin_state.php" align="center">State</a></li>
        <li><a href="admin_city.php" align="center">City</a></li>
        <li><a href="admin_ins.php" align="center">Institute</a></li>
        <li><a href="admin_query.php" align="center">Query</a></li>
        <li>
        <?php
            if($_SESSION['useradmin'])
            {
                echo "<a href='user_logout.php' align='center'>Logout</a>";
            }
            else
            {
                echo "<a href='login.php' align='center'>Login</a>";
            }
    ?>

        </li>
    </ul>
    
</div>
<div class="col-md-10"></div>
</div>

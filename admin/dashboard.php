<?php
session_start();
include"connect.php";
include"header.php";
?>
<?php
if (isset($_SESSION['username'])) {?>
<?php include"navbar.php";?>
<div class="dash col-xs-12 text-center">
    <h2>Welcome <span><?php echo $_SESSION['username']?></span></h2>
</div>
<div class="dashcontent col-sm-6 col-xs-12">
    <div class="container">
        <div>
            <div class="construction col-xs-12">
                <h2 class="text-center">Add In Construction Section</h2>
                <form action="addcon.php" method="POST">
                    <input type="file" name="file" class="form-control" required>
                    <input type="text" name="title" placeholder="Title" class="form-control" required>
                    <input type="text" name="details" placeholder="details" class="form-control" required>
                    <input type="submit" value="Add" class="form-control btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    header('Location: login.php');
    exit();
}
?>
<?php
include"footer.php";
?>
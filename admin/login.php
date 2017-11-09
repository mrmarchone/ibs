<?php include"header.php";?>
<?php include"connect.php";?>
<?php session_start();?>
<?php
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}
?>
<div class="login col-xs-12">
    <div class="contanier">
        <div class="row">
            <div class="form col-xs-12">
                <div class="feat">
                    <form action="login.php" method="post">
                        <h2 class="h1 text-center">ADMIN LOGIN</h2>
                        <input 
                            type="text" 
                            placeholder="Email or username" 
                            autocomplete="off" 
                            required 
                            class="form-control" 
                            name="user"/>
                        <input 
                            type="password" 
                            placeholder="Password" 
                            autocomplete="off" 
                            required 
                            class="form-control" 
                            name="password"/>
                        <input 
                            type="submit" 
                            value="Login" 
                            autocomplete="off" 
                            required 
                            class="btn btn-success form-control"/>
                    </form>
                    <?php
                    if (isset($_POST['user']) && isset($_POST['password'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['password'];
                        $hash = sha1($pass);
                        $stmt = $con->prepare("SELECT * FROM admins WHERE username=? AND password=? AND groupID=1 LIMIT 1");
                        $stmt->execute(array($user, $hash));
                        $row = $stmt->fetch();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            $_SESSION['username'] = $user;
                            $_SESSION['ID'] = $row['ID'];
                            header('Location: dashboard.php');
                            exit();
                        } else {
                            echo "<h1 class='alert alert-danger'>Not Found</h1>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include"footer.php";?>
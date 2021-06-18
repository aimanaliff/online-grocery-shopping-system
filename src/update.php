<?php
$db=mysqli_connect("localhost","root","","groceries");
$kode=$_GET['code'];
$username = $_GET['username'];

//check link
 if (isset($kode) && isset($username)){
    $db_user = user($username);
    $row = mysqli_fetch_assoc($db_user);
    $token = $row ['token'];
    $db_username = $row ['username'];

    //check between tokens & usernames that are in links and databases
    if ($token==$kode && $db_username==$username){
    //check submit
    if  (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $konfir_pass = $_POST['konfir_password'];
    //check password
        if($password != "" && $konfir_pass != ""){
            if ($password==$konfir_pass) {
                echo "password telah diupdate";
                $konfir_pass1 = md5($password);
                update_pass($konfir_pass1, $username);
                $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
                $code = str_shuffle($code);
                $code = substr($code,0, 10);
                update_token($code,$username);
                header('location:index.php');
            }else {
                
                echo "<script>alert('Password is different')</script>";
                echo "<script>
                var a = '$kode';
                var b = '$username';
                window.open('update.php?code='+a+'&username='+b , '_self');
                </script>";
                // header("location: update.php?code='$kode'&username='$username'");
                die();
            }
        } else{
            echo "<script>alert('Password is empty')</script>";
            echo "<script>
            var a = '$kode';
            var b = '$username';
            window.open('update.php?code='+a+'&username='+b , '_self');
            </script>";
            die();
        }
            
        }
    }else{
        echo "<script>alert('Link has expired')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        die();
    }
}else{
    echo "link is wrong";
}

function user($username) {
    $query = "SELECT * FROM user WHERE username='$username'";
    return result ($query);
}

function result($query) {
    global $db;
    if ($result = mysqli_query($db, $query) or die ('gagal menampilkan data')){
        return $result;
    }
}

function update_token($code,$username) {
    $query = "UPDATE user SET token='$code' WHERE username='$username'";
    return run ($query);
}

function update_pass($konfir_pass,$username) {

    $query = "UPDATE user SET passwordd='$konfir_pass' WHERE username='$username'";
    return run ($query);
}

function run($query) {
    global $db;
    if (mysqli_query ($db, $query)) return true;
    else return false;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Password Recovery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet'>
<style>
body {
    text-align:center;
}

</style>
</head>
<body>
    <h3>Change your password</h3>
    <form action=""  method="post">
        <label>Password</label><br>
        <input class="form-control" type="password" name="password" placeholder="password" required><br>
        <label>new password</label><br>
        <input class="form-control" type="password" name="konfir_password" placeholder="new password" required><br>
        <input class="btn btn-primary form-control" type="submit" name="submit">
    </form>
</body>
</html>

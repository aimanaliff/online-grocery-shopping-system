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
        if ($password==$konfir_pass) {
            echo "password telah diupdate";
            update_pass($konfir_pass, $username);
            $code = '123456789qazwsxedcrfvtgbyhnujmikolp';
            $code = str_shuffle($code);
            $code = substr($code,0, 10);
            update_token($code,$username);
            header('location:index.php');
        }else {
            echo "<script>alert('Password is different')</script>";
            echo "<script>window.open('_self')</script>";
        }
    }
    }else{
        echo "<script>alert('Link has expired')</script>";
        echo "<script>window.open('index.php')</script>";
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
<title>Send Email</title>
</head>
<body>
    <h3>Change your password</h3>
    <form action=""  method="post">
        <label>password</label><br>
        <input type="text" name="password" placeholder="password"><br>
        <label>new password</label><br>
        <input type="text" name="konfir_password" placeholder="new password"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

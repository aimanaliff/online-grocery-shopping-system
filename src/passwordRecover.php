<?php


$db=mysqli_connect("localhost","root","","groceries");

if  (isset($_POST['submitpasswordrecovery'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $d = user($username);
    $db_email1 = email($username);
    $row_email= mysqli_fetch_array($db_email1);
    $jumlah = mysqli_num_rows($d);

    if ($jumlah !=0) {
        $db_email = $row_email['email'];
        
        if ($email==$db_email){
            $token = selectToken($username);
            
            $alamat = "http://localhost/online-grocery-shopping-system/src/update.php?code=$token&username=$username";
            $to = $db_email;
            $judul = "password reset";
            $isi = "this is automatic email, dont reply. For reset your password please click this link ".$alamat;
            $headers = "From: muhammadhazieq00@gmail.com" . "\r\n";
            mail($to,$judul,$isi,$headers);

        }else {
            // echo "<script>alert('Your email didn't register')</script>";
            // echo "<script>window.open('index.php, '_self')</script>";
            
            // echo"your email didn't register";
        }

    }else {
        // echo "<script>alert('Your username didn't register')</script>";
        // echo "<script>window.open('index.php, '_self')</script>";
    }
}

function user($username) {
    $query = "SELECT * FROM user WHERE username='$username'";
    return result ($query);
}

function email($username) {
    $query = "SELECT email FROM user WHERE username='$username'";
    return result ($query);
}

function result($query) {
    global $db;
    if ($result = mysqli_query($db, $query) or die ('gagal menampilkan data')){
        return $result;
    }
}

function selectToken($username) {
    $query = "select token from user where username='$username'";
    global $db;
    $run = mysqli_query($db,$query);
    $row= mysqli_fetch_array($run);
    $token = $row['token'];
    return $token;
}

?>

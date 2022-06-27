<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

function getPDOObject()
{
    $user = 'root';
    $pass = '';
    $pdo = new PDO("mysql:host=localhost;dbname=techvilla", $user, $pass);
    if (!$pdo) {
        echo "Not connected";
    }
    return $pdo;
}

// 
function getcountry($id){
    $pdo=getPDOObject();
    $data = '';
    $sql=$pdo->prepare("select name from countries where id='".$id."'");
    $sql->execute();
    $data = $sql->fetchColumn();
    return $data;
}

//function for session check
function check_session()
{
    if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        header('location:login.php');
    }
}



// function for user login
function user_login()
{
    extract($_POST);
    // echo '<pre>';
    // print_r($_POST);
    // die("hii");
    $pdo = getPDOObject();
    if (empty($email) or empty($pass)) {
        $msg = '<div class="alert alert-danger">user Id and password required</div>';
    } else {
        $sql = "select id,name,email,phone,password,astatus from admin where email=? and astatus='1' limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $rowcnt = $stmt->rowCount();
        if ($rowcnt) {
            $data = $stmt->fetch(pdo::FETCH_ASSOC);
            // echo '<pre>';
            // print_r($data);
            // die("hii");
            if (password_verify($pass, $data['password'])) {
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['user_name']  = $data['name'];
                $_SESSION['user_email']= $data['email'];

                if ($_SESSION['user_id']) {
                    header('location:index.php');
                } else {
                    $msg = '<div class="alert alert-danger"> something went wrong </div>';
                }
            } else {
                $msg = '<div class="alert alert-danger">Invalid credential</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger">Invalid credential</div>';
        }
    }
    return $msg;
}

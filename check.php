<?php

session_start();

$row = 1;

$handle = fopen("users.csv", "r");
while (($data = fgetcsv($handle,",")) !== FALSE){
    echo "Login : " . $data[0] . " Password : " . $data[1];
    echo "<br>";

    if ($_POST['login'] === $data[0]){
        if ($_POST['password'] === $data[1]){
            echo "Correct";
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header("Location: connected.php");
        }
        else{
            $_SESSION['error'];
            header("Location: index.php?error=1");
        }
    }
}


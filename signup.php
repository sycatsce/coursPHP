<?php
session_start();

if (isset($_SESSION['error'])){
    switch($_SESSION['error']){
        case 1:
            echo "Les login et password ne peuvent pas être vides";
            unset($_SESSION['error']);
            break;
        case 2:
            echo "Les deux passwords ne correspondent pas";
            unset($_SESSION['error']);
            break;
    }
}



if (isset($_POST['login']) && isset($_POST['password'])){
    if (!empty($_POST['login']) && !empty($_POST['password'])){
        if ($_POST['password'] == $_POST['passwordcheck']){
            $fp = fopen('users.csv', 'a+');
            fputcsv($fp,array($_POST['login'], $_POST['password']),","); 
            fclose($fp);
            $_SESSION['inscrit'] = 1;
            header("Location: index.php");
        }
        else{
            $_SESSION['error'] = 2;
            header("Location: signup.php");
        }
    }
    else{
        $_SESSION['error'] = 1;
        header("Location: signup.php");
    }
}


?>

<html>
    <title> Sign up </title>
    <h1 style="text-align:center;"> Sign up </h1>

<body>
    <form method="post" action="signup.php">
        <div style="margin:5 5 5 5px">Nom <input type="text" name="nom"/></div><br>
        <div style="margin:5 5 5 5px">Prénom <input type="text" name="prenom"/></div><br>
        <div style="margin:5 5 5 5px">Login* <input type="text" name="login"/></div><br>
        <div style="margin:5 5 5 5px">Password* <input type="password" name="password"/></div><br>
        <div style="margin:5 5 5 5px">Enter it again* <input type="password" name="passwordcheck"/></div><br>
        
        <a href="index.php"><button type="button"> Retour </button></a>
        <button type="submit"> Sign up </button>
    </form>

    <p> (*) Required fields </p>
</body>

</html>
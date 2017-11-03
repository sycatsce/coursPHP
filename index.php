<?php
session_start();

if (isset($_SESSION['error'])){
    echo "Login ou password incorrect";
    unset($_SESSION['error']);
}

if (isset($_SESSION['inscrit'])){
    echo "Inscription terminée";
    unset($_SESSION['inscrit']);
}
?>

<html>
    <title> Connection </title>

<body>

    <form method="post" action="check.php">
        
        <div style="width:100%; text-align:center">
        <div style="margin:5 5 5 5px">Login <input type='text' name='login'> <br></div>
        <div style="margin:5 5 5 5px">Password <input type='password' name='password'> <br></div>
        
        <div style="margin:5 5 5 5px">
        <button type='submit'> Sign in </button>
        <a href="signup.php"><button type='button'> Sign up </button></a>
        </div>

    </form>


</body>
</html>
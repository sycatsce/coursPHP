<?php

$l = $_GET['ligne'];
if ( isset($_POST['login']) && isset($_POST['password'])){

    $i = 1;
    $array_tmp = array();
    $handle = fopen("users.csv", "a+");
    
    while (($data = fgetcsv($handle,",")) !== FALSE) {
        $ligne_tmp = array();
        if ($i !== intval($_GET['ligne'])){
            $ligne_tmp[0] = $data[0];
            $ligne_tmp[1] = $data[1];
            $array_tmp[$i-1] = $ligne_tmp;
        }
        $i++;
    }
    $array_tmp[] = array($_POST['login'], $_POST['password']);

    $handle = fopen('users.csv','w+');
    foreach ($array_tmp as $ligne){
        fputcsv($handle,$ligne,",");
    }

    header("Location: connected.php");
}

?>


<html>
    <title> Modifier </title>

    <body>
        <form method='post' action='edit.php?ligne=<?php echo $_GET['ligne']; ?>'>
            New login <input type="text" name="login"/> <br>
            New password <input type="password" name="password"/> <br>
            Enter it again <input type="passwordcheck" name="passwordcheck"/> <br>

            <button type="submit"> Validate </button>

        </form>
<?php
session_start();

if (!isset($_SESSION['login']) && !isset($_SESSION['password'])){
    echo "Pas de session";
    header("Location: index.php");
}

echo "Bonjour " . $_SESSION['login'];
?>


<form method="post" action="disconnect.php">
        <button type="submit"> Disconnect </button>
</form>

<b><p>Liste des utilisateurs</p></b>
<table style="margin: 5 5 5 5px">
    <tr>
        <th> Login </th>
        <th> Password </th>
    </tr>
<?php
$i = 1;
$handle = fopen("users.csv", "r");
while (($data = fgetcsv($handle,",")) !== FALSE){
    echo "<tr><td>" . $data[0] . "</td><td>" . $data[1] . 
    "</td><td><a href='edit.php?ligne=".$i."'>
    <button type='button'>Edit</button></a></td></tr>";
    $i++;
}

?>

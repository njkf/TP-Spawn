# TP-Spawn


<form method='post' action= '<?php echo $_SERVER ["PHP_SELF"];?>'>
<input type='submit' name='envoyer' id='envoyer' value='Générer un spawn' />
</form>



<?php

session_name('spawnfornite');
session_start();

$database_host = 'localhost';
    $database_port = '3306';
    $database_dbname = 'fornite_spanws';
    $database_user = 'root';
    $database_password = 'root';
    $database_charset = 'UTF8';
    $database_options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO(
        'mysql:host=' . $database_host . 
        ';port=' . $database_port . 
        ';dbname=' . $database_dbname . 
        ';charset=' . $database_charset, 
        $database_user,
        $database_password,
        $database_options
    );

$query = 'SELECT id, name FROM spawns;';
$req = $pdo->prepare($query);
$req->execute();
$spawns = $req->fetchAll();

function afficher () {
	global $spawns;
	global $_SESSION;
	$index = rand(0, count($spawns)-1);
	while ($_SESSION['index'] == $index)
		{
			$index = rand(0, count($spawns)-1);
		};

	$_SESSION['index'] = $index;
	echo "<p>" . $spawns[$index]["name"] . "</p>";
	$index++;
	echo "<img src='./" .$index . ".jpg'/>";
};

				

   

if (!empty($_POST['envoyer'])) {
	afficher();
}
?>




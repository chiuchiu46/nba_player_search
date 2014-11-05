<?php
error_reporting(-1);
if (isset($_REQUEST['pname']))
{
# Connect
$conn = new PDO('mysql:host=acdbinstance.c6wj7xpbm1zb.us-west-2.rds.amazonaws.com;dbname=nba','info344','1234567');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$name = $_REQUEST['pname'];
$stmt = $conn->prepare("SELECT * FROM stats WHERE playername LIKE '%".$name."%'");
$stmt->execute();
$result = $stmt->fetchAll();
}
?>

<html>
<link href="site.css" rel="stylesheet">
<body>
<form action="index.php" method="get">
Player Name: <input type='text' name='pname'>
<input type='submit' value='Search'>
</form>

<?php
foreach($result as $row){
	echo "<div class='player'>";
	echo "<h2 class='name'>" . $row['PlayerName'] . "</h2>";
	echo "<table class='stats'>";
	echo "<tr>";
	echo "<th>GP</th>";
	echo "<th>FGP</th>";
	echo "<th>TPP</th>";
	echo "<th>FTP</th>";
	echo "<th>PPG</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $row['GP'] . "</td>";
	echo "<td>" . $row['FGP'] . "</td>";
	echo "<td>" . $row['TPP'] . "</td>";
	echo "<td>" . $row['FTP'] . "</td>";
	echo "<td>" . $row['PPG'] . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}
?>
</body>
</html>

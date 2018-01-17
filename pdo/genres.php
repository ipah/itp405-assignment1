<?php
	$pdo = new PDO('sqlite:chinook.db');
	$sql = 'select * from genres;';

	$statement = $pdo->prepare($sql);
	$statement->execute();

	$genres = $statement->fetchAll(PDO::FETCH_OBJ);

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Genres</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>
<body>
	<table class="table text-center">
		<tr>
			<th>Genres</th>
		</tr>
		<?php foreach($genres as $genre) :?>
			<tr>
				<td>
					<a href="tracks.php?genre=<?php echo $genre->Name ?>"><?php echo $genre->Name ?></a>
					
				</td>
					
			</tr>
		<?php endforeach ?>
	</table>

</body>
</html>
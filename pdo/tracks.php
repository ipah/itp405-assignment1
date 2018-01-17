<?php
	$pdo = new PDO('sqlite:chinook.db');
	$sql = 'select t.Name as track_name, a.Title as album_name, ar.Name as artist_name, t.UnitPrice as UnitPrice from genres g
			join tracks t on t.GenreId = g.GenreId
			join albums a on a.AlbumId = t.AlbumId
			join artists ar on ar.ArtistId = a.ArtistId
			where g.Name = ? ;';

	$statement = $pdo->prepare($sql);
	$statement->bindParam(1,$_GET['genre']);

	$statement->execute();

	$songs = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tracks</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Genre: <?php echo $_GET['genre']?></h1>
		</div>
		<table class="table">
			<tr>
				<th>Song Name</th>
				<th>Album Title</th>
				<th>Artist</th>
				<th>Price</th>
			</tr>
			<?php foreach($songs as $song) :?>
			<tr>
				<td>
					<?php echo $song->track_name ?>
				</td>
				<td>
					<?php echo $song->album_name?>
				</td>
				<td>
					<?php echo $song->artist_name?>
				</td>
				<td>
					<?php echo $song->UnitPrice?>
				</td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>

</body>
</html>
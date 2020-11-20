<?php
	if($_POST){
		$moviename = $_POST['movie_name'];
  	$conn = mysqli_connect("localhost","root","","bookmymovie");
		$query = "SELECT * FROM movies_1 WHERE movie_title LIKE '%$moviename%'";
		if(mysqli_query($conn, $query)){
			$result = mysqli_query($conn, $query);
			$row = $result->fetch_assoc();
			$title = $row['movie_title'];
			$genre = $row['genres'];
			$description = $row['movie_imdb_link'];
			$actor1 = $row['actor_1_name'];
			$actor2 = $row['actor_2_name'];
			$duration = $row['duration'];
			$director = $row['director_name'];

		}
		else{
			$errormessage .= "Not Done";
			$errormessage .= mysqli_error($conn);
		}

	}
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include 'components/header.php';?>
		<link href="css/booknow.css" rel="stylesheet">

		<title>BookMyMovie | Ticket Booking</title>
	</head>

	<body>
		<?php include 'components/navbar.php' ?>
 <div class="list-group">



  <a href="#" class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
     <h2 class="mb-1"><strong> <?php echo $title ?></strong></h2>
    </div>
  </a>


	<a href="#" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
		 <h3>GENRE</h3>
		 <h5 class="mb-1"><?php echo $genre ?></h5>
		</div>
	</a>


	<a href="#" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
		 <h3>DURATION</h3>
		 <h5 class="mb-1"><?php echo $duration ?> min</h5>
		</div>
	</a>



	<a href="#" class="list-group-item list-group-item-action">
    <div>
		 <h3>CAST</h3>
		 <h5 class="mb-1"> <?php echo $actor1 ?></h5>
		 <h5 class="mb-1"> <?php echo $actor2 ?></h5>
		</div>
	</a>


	<a href="#" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
		 <h3>DIRECTOR</h3>
		 <h5 class="mb-1"> <?php echo $director ?></h5>
		</div>
	</a>


	<a >

			<?php echo " <h4 class='mb-1'> <a class='mb-1' href= '$description'> ----IMDB Link---- </a> </h4>"; ?>
		</div>
  </a>


  </div>
</body>
</html>

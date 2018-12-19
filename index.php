<?php include 'database.php' ?>
<?php 
	//Create select Query
	$query = "SELECT * FROM shouts ORDER BY id DESC";
	$shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOUT IT!</title>
	<link rel="stylesheet" href="css/futa.css" type="text/css">
</head>
<body>
    <!--Header-->
    <div id="container">
        <header>
            <h1>SHOUT IT! Shoutbox</h1>
        </header>

    <!--Shouts-->
    <div id="shouts">
        <ul>
			<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
				<li class="shout"><span><?php echo $row['time'] ?> - </span><b><?php echo $row['user'] ?>:</b> <?php echo $row['message'] ?></li>
			<?php endwhile; ?>
        </ul>
    </div>

    <!--Inputs-->
    <div id="input">
		<?php if(isset($_GET['error'])) : ?>
			<div class=error" style="background: red; color: #ffffff; padding: 5px; margin-bottom: 20px;"><?php echo $_GET['error']; ?></div>
		<?php endif; ?>
        <form method="POST" action="process.php">
            <input type="text" name="user" placeholder="Enter Your Name">
            <input type="text" name="message" placeholder="Enter a message">
            <br>
            <input type="submit" class="shout-btn" name="submit" value="Shout It Out">
        </form>
    </div>
 </div>
</body>
</html>
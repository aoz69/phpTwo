<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Claires's Cars - <?= $title ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/cars">Showroom</a></li>
			<li><a href="/about">About Us</a></li>
			<li><a href="/contact">Contact us</a></li>
			<li><a href="/opportunity">Claire's Careers</a></li>
			<?php 
			$login = 'logout';
			if(!isset($_SESSION['logger'])) {
				$login = 'login';
			}
			
			?>
			<li><a href="/<?=$login ?>"><?=$login ?></a></li>
		</ul>

	</nav>
<img src="/images/randombanner.php"/>
	<main class="admin">
	<?php 
		if(isset($_SESSION['logger'])) {
			echo '<section class="left">
			<ul>
				<li><a href="/Manufacturer/list">Manufacturers</a></li>
				<li><a href="/cars/list">Cars</a></li>
				<li><a href="/stories/list">stories</a></li>
				<li><a href="/users/list">users</a></li>

			</ul>
		</section>';
		}
	?>
		<?=$output ?>
	
  </main>


	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
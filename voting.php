<!DOCTYLE html> 
<html>
	<head>
		<title>Online Voting System</title>
	
<style type="text/css">
	
body {padding:0; margin:0;}

.container {width:1000px; background:skyblue; margin:0 auto; padding:10px;}

img {padding:20px; border-radius:100%; border:4px solid white;}

img:hover {background:orange;}

input {margin:30px;}

</style>
	</head>
	
<body> 

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1>Click on the candidate you want to Vote for</h2></div>

<div class="container">

<form action="voting.php" method="post" align="center">  
	
	<input type="submit" name="sachin" value="Vote For Olalere Femi"/> 
	
	<input type="submit" name="afridi" value="Vote For Njoku Chukwuma"/> 
	
	
	<input type="submit" name="clark" value="Vote For Danjuma Ahmad"/> 
	

</form>
<?php 
$con = mysqli_connect("localhost","root","","mytest");


if(isset($_POST['sachin'])){
	
	$vote_sachin = "update players set sachin=sachin+1";
	
	$run_sachin = mysqli_query($con, $vote_sachin);
	
	if($run_sachin){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to Olalere Femi!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	
	
	}

}

if(isset($_POST['afridi'])){
	
	$vote_afridi = "update players set afridi=afridi+1";
	
	$run_afridi = mysqli_query($con, $vote_afridi);
	
	if($run_afridi){
	
	echo "<h2 align='center'>Your Vote Has Been Cast to Njoku Chukwuma!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	
	}
}

if(isset($_POST['clark'])){
	
	$vote_clark = "update players set clark=clark+1";
	
	$run_clark = mysqli_query($con, $vote_clark);
	
	if($run_clark){
	echo "<h2 align='center'>Your Vote Has Been Cast to Danjuma Ahmad!</h2>"; 
	echo "<h2 align='center'><a href='voting.php?results'>View Results</a></h2>";
	}
}

if(isset($_GET['results'])){

	$get_votes = "select * from players";
	
	$run_votes = mysqli_query($con, $get_votes); 
	
	$row_votes = mysqli_fetch_array($run_votes); 
	
	$sachin = $row_votes['sachin'];
	$afridi = $row_votes['afridi'];
	$clark = $row_votes['clark']; 
	
	$count = $sachin+$afridi+$clark; 
	
	$per_sachin = round($sachin*100/$count) . "%";
	$per_afridi = round($afridi*100/$count) . "%";
	$per_clark = round($clark*100/$count) . "%";
	
	echo "
	<div style='background:orange; padding:10px; text-align:center;'>
		 
		<center>
		<h2>Results So Far:</h2>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>Olalere Femi:</b> $sachin ($per_sachin)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>Njoku Chukwuma:</b> $afridi ($per_afridi)
		
		</p>
		
		<p style='background:black; color:white; padding:10px; width:500px;'>
		
		<b>Danjuma Ahmad:</b> $clark ($per_clark)
		
		</p>
		</center>
	
	</div>
	
	
	";

}

?>

</div>

<div style="background:black; color:white; text-align:center; width:100%; padding:10px;">
<h1><marquee>Created by: Samson K Okemakinde (170699): Computer Science Department. U.I</marquee></h1></div>


</body>
</html>
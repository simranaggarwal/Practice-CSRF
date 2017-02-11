<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>New Compositions</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<div id=main>
	<h1>Upload Compositions!</h1>
	<form  action="<?php echo $_SERVER["PHP_SELF"];?>">
	<table>
		<tr>
			<td valign="top">Title</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>  
			<td valign="top">Composition</td>
			<td><input type="textarea" name="comp"></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		if(isset($_SESSION['SESS_MEMBER_ID'])){
			$title=$comp="";
		if(isset($_GET['submit'])) {
			$title =$_GET["title"];
			$comp =$_GET["comp"];}
		echo $comp;
		echo "<div align='center'><h2><a href='logout.php'>Log Out</a></h2></div>";
		}
	?>
<footer id="foot01"></footer>
</div>
<script src="script.js"></script>
</body>
</html>
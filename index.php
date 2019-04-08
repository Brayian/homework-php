<!DOCTYPE html>
<html>
<head><title> Friends Book </title></head>
	 <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<div id="h1"><center><p><h1>Friends Boooks</h1></p></center></div><br>
<form action="index.php" method="POST">
Names: <input type="text" name="name"/>
<input type="submit" value="Add new friend"/><br>
</form>



<?php
$friendsArray = array();

echo "<h1>My best friends </h1>" ; 

$filename = 'friends.txt';	

if (isset($_POST['name']) && strlen($_POST['name'])>0) {

	$file = fopen( $filename, "a" );
	$li = fgets($file);
	fwrite( $file, $_POST['name']);
	fwrite($file,"\n");
	$friendsArray[]=$_POST['name'];
	fclose($file);
} 




$file = fopen( $filename, "r" );
$i = 0 ; 


  if( $file !=false ) {
		echo "<ul class = listF >";
    while(!feof($file)) {
			$name = fgets($file);
			if (strlen($name)>0) {
						$friendsArray[] = $name;
						echo ("<li><h3>".$friendsArray[$i]."</h3></li>");
			 }
			 $i++;
		}
		echo ("</ul>");
 	}
	fclose($file);
	 

	?>

	 <form action="index.php" method="POST" >
	 <input type="text" name="nameFilter" >
	 <input type="checkbox" name="startingWith">Only names starting with
	 <input type="submit" value="Filter List"/> <br>
	 </form>


	 <?php


	
echo ("<ul class = listF >");
foreach($friendsArray as $friend){
	if (isset($_POST['nameFilter'])){

			
				
					if (isset($_POST['startingWith'])){
							
						
							if (strpos($friend,$_POST['nameFilter'])===0){ 
									echo ("<li><h3>".$friend."</h3></li>"); 
								 
							 }
							 		
						
				 	}
					else{ 
							if(!empty(strstr($friend,$_POST['nameFilter']))){
								echo ("<li><h3>".$friend."</h3></li>");

							}
					}		
	}
}

echo ("</ul>");
			


?>
<div id="h2"><center><p><h1>Footer</h1></p></center></div>
</body>
</html>








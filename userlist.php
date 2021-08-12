<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>User list</title>
 	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
		table-layout: auto;
		margin-left: auto;
    	margin-right: auto;
	}
</style>
 </head>
 <body>

 	<h1>User List</h1>

 	<?php 
 			include 'getalluser.php';
			if(empty(trim($_GET['username'])))
			{
				$userList = getAllUsers();			
			}
		 	
			else ///////////////////////////////////////////////----------------
			{
				$userList = getUser($_GET['username']);
				$username = $_GET['username'];
 			}

			if(!empty($_GET['uid']))
			{
 				$response = removeUser($_GET['uid']);
				if ($response) 
				{
					echo "User remove successfull"; 
					$userList = getAllUsers(); // auto refresh / update.
				}
				else
					echo "Error while removing user";
			}
 	?>

 	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" mathod = "GET">
 		<input type="text" name="username" value="<?php echo $username  ?>">
 		<input type="submit" name="search" value="Search"><br><br><br>
 	</form>

 	 
  	<table style="width:80%">
		<tr>
			<th>First name</th>
			<th>Last name</th> 
			<th>gender</th>
			<th>dob</th>
			<th>religion</th>
			<th>p_address</th>
			<th>per_add</th>
			<th>phone</th>
			<th>email</th>
			<th>website</th>
			<th>username</th>
 			<th>id</th>
			 
		</tr>

		<?php
		
	 		foreach ($userList as $arr  )
			{
	  			foreach ($arr as $key => $value)
	  			{
	  				if($key != "password")
	  				echo  "<td>".$value."</td>";

	   				if($key == "id")
	   				{
	  					echo  "<tr>"; 
 	   				}
				}
	 		}
		?>

		
		 

	</table>

<!-- 
	<script>
		function fetch()
		{
			var xhttp = new XMLHttpRequest();
			xhttp.onload = function()
			{
				if (this.status === 2000 ) 
				{
				}
			}
			xhttp.open("GET","ajax.php");
			xhttp.send();
		}
	</script>
 -->
 	  
 	
 </body>
 </html>
<html>
	<head>
		<title>Home</title>
	</head>
	<?php
		session_start();
		if(!$_SESSION['user']){
			header("location:login.php");
   	}
		$username = $_SESSION['user'];
	?>
	<body>
		<p>Hello <?php echo "$username"?>!</p>
		<p>Click <a href="logout.php" onclick="return confirm('Are you sure?');">here</a> to logout.</p>
		<a href="welcome.php">Welcome</a>  &nbsp &nbsp
		<a href="password.php">Reset Password</a>  &nbsp &nbsp
		<a href="profile.php">My Profile</a>  &nbsp &nbsp
		<a href="mylist.php">My Collection</a>  &nbsp &nbsp
		<?php
			include("connect.php");
			$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
			while($row = mysqli_fetch_array($query)){
			  $language = $row['language'];
        echo "<a href='language.php?favorite=". $language. "'>Multi. Language</a>  &nbsp &nbsp";
			}
		 ?>
		 <a href="userlist.php">User List</a> &nbsp &nbsp
		<a href="search.php">Search</a> &nbsp &nbsp
		<a href="welcome_dom.html">Welcome(DOM)</a> &nbsp &nbsp
		<a href="bbs.php">Bulletin Board</a>&nbsp &nbsp
		<a href="directory.php?directory=movies">Movies</a>&nbsp &nbsp
		<a href="hash.php">Password Hash</a>
    <br/> <br/>
		<h2 align="left">Public Collection</h2>
		<table border="1px" width="450">
			<tr>
				<!-- <th>Id</th>	 -->
				<th>Item</th>
				<th>Shared by</th>
				<th>Date</th>
			</tr>
			<?php
			  $username = $_SESSION['user'];
			  include("connect.php");
				$query = mysqli_query($con, "SELECT * FROM list WHERE public = 'yes' and delete_flag = ''");
				while($row = mysqli_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="left"><a href="item.php?id='. $row['id'] .'">'. $row['details'].'</a> </td>';
						Print '<td align="center">'. $row['username']. "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
					Print "</tr>";
				}
			?>
		</table>

	</body>
</html>

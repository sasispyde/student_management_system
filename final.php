<?php 
		session_start();
		$id= $_SESSION['id'];
		$servername = "localhost";
		$username = "root";
		$password = "ndot";
		$minmumPassMark =35;
		$Average=0;
		$total=0;

	  	$conn = new mysqli($servername, $username, $password,"SASI");

	  	if ($conn->connect_error) 
	  	{
	      die("Connection failed: " . $conn->connect_error);
	  	}
	  	else
	  	{
	  		echo "";
	  	}


		$sql2="SELECT student_mark.student_id, student_details.id,student_details.student_name
			   FROM student_details
			   LEFT OUTER JOIN student_mark
			   ON student_mark.student_id = student_details.id where student_details.id = $id" ;

		$result = $conn->query($sql2);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) 
				{
				    if($row["id"]==$id)
				    {
				        echo "<h2>"."Name Of The Student : ".$row["student_name"]."</h2>";
				    }
				    else
				    {
				    	echo "";
				    }

				}     
			} 
		else 
		{
			echo "0 results";
		}

	    $sql = "SELECT student_id,tamil,english,maths,science,social_science FROM student_mark ";

	 	$result2 = $conn->query($sql);

	  	$finalRow= $result2->num_rows;

		if ($result2->num_rows == $finalRow) 
		{
			while($row = $result2->fetch_assoc()) 
				{

					if($row["student_id"]==$id)
						{
							$associate =$row;

							array_shift($associate);

							$averageFinder =count($associate);

				        	print "<p></p><p></p><p>";

				        foreach ($associate as $key => $value)
					        {
					        	$total=$total+$value;
					        }

						        echo "<h2>"."Total Marks : ".$total." / 500"."</h2>";

						        print "<p></p><p></p><p>";

						        $Average =$total / $averageFinder;

						        echo "<h2>"."Average : ".$Average." %"."</h2>";
						}
		    		}
				}
		else 
		{
		   	echo "Nothing to show";
		}
?>

<html>
	  <title>Result Page</title>

	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="		sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	  <style type="text/css">

		body
		{
			text-align: center;
			color: black;
			background-image: url("School.jpg");
			width: 100%;
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}

		h2
		{
			color: black;
		}
		table 
		{
			margin-top: 50px;
			text-align: center;
			opacity: 0.7;
		}
		td
		{
			width: 100px;
		}
		thead
		{
			color:white;
		}
		th
		{
			text-align: center;
		}

	  </style>
	<body>
		<table class="table table-striped table-dark table-bordered">
			<thead>
			    <tr>
				     <th >Subject</th>
				     <th >Marks</th>
				     <th >Grade</th>
			   </tr>
			</thead>
			<tbody>
				 <?php foreach ($associate as $key => $value){ ?>
				  <tr>
				    <td>
				     <?php 

				     if($key=="social_science")
				     {
				     	echo "Social Science";
				     }
				     else
				     {
				     	echo ucfirst($key);
				     }

				     ?>
				    </td>
				    <td><?php echo strtoupper($value); ?></td>
				    <td>

				      <?php 
				      if($value<$minmumPassMark)
				      {
				      echo "FAIL";
				      }
				      else
				      {
				      echo "PASS";
				      }
				      ?>

				    </td>

				   </tr>

					  <?php } ?>
			 </tbody>
			</table>
		</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Task3</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css">
      	body{
      		float: left;
      		color:white;
      		margin-left: 200px;
          margin-top: 20px;
      		background-image: url("Black.jpg");
      		width: 100vh;
    		height: 100vh;
    		background-position: center;
    		background-repeat: no-repeat;
    		background-size: cover;
      	}
      	#name {
      		opacity: 0.6;
      		width: 350px;
      		background-color: #8B8B8B;
      		color: white;
      	}
      	#tamil {
      		width: 350px;
      		opacity: 0.6;
      		color: white;
      		background-color: #8B8B8B;
      	}
      	  	#english {
      	  	background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      	}
      	  	#maths {
      	  	background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      	}
      	  	#science {
      	  	background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      	}
      	  	#sscience {
      	  	background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      	}
        #user {
          width: 350px;
        }

  </style>
  <script>
      function checkLength(){
        var fieldVal = document.getElementById('tamil').value;
        //Suppose u want 3 number of character
        if(fieldVal <=100){
          return true;
        }
        else
        {
          var str = document.getElementById("tamil").value;
          str = str.substring(0, str.length - 1);
          document.getElementById('tamil').value = str;
        }
      }
        function checkLength2(){
        var fieldVal = document.getElementById('english').value;
        //Suppose u want 3 number of character
        if(fieldVal <=100){
          return true;
        }
        else
        {
          var str = document.getElementById("english").value;
          str = str.substring(0, str.length - 1);
          document.getElementById('english').value = str;
        }
      }
        function checkLength3(){
        var fieldVal = document.getElementById('maths').value;
        //Suppose u want 3 number of character
        if(fieldVal <=100){
          return true;
        }
        else
        {
          var str = document.getElementById("maths").value;
          str = str.substring(0, str.length - 1);
          document.getElementById('maths').value = str;
        }
      }
        function checkLength4(){
        var fieldVal = document.getElementById('science').value;
        //Suppose u want 3 number of character
        if(fieldVal <=100){
          return true;
        }
        else
        {
          var str = document.getElementById("science").value;
          str = str.substring(0, str.length - 1);
          document.getElementById('science').value = str;
        }
      }
        function checkLength5(){
        var fieldVal = document.getElementById('sscience').value;
        //Suppose u want 3 number of character
        if(fieldVal <=100){
          return true;
        }
        else
        {
          var str = document.getElementById("sscience").value;
          str = str.substring(0, str.length - 1);
          document.getElementById('sscience').value = str;
        }
      }
</script>

</head>
<body>
	<?php

        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "ndot";


        $conn = new mysqli($servername, $username, $password,"SASI");

          // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
          echo "";
        }

        // $sql="SELECT id,student_name FROM student_details";
        // $result = $conn->query($sql);
        // if($result->num_rows >0){
        //   $select= '<select name="select" style="width: 350px;color:black;"; class="dropdown show"">';
        //   $select.='<option value="" name="name">'."Select the Student Name".'</option>';
        // while($rs=$result->fetch_assoc()){
        //       $select.='<option value="'.$rs['id'].'" name="name">'.$rs['student_name'].'</option>';
        //   }
        // }
        // else{
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        //   $select.='</select>';
        // echo $select;
        // echo "<br>";
        // print "<p>".$nameErr."<p>";


      	$minmark=35;
      	$bool=false;
      	$bool1=false;
      	$bool2=false;
      	$nameErr ="";
      	$tamilErr ="";
      	$englishErr ="";
      	$mathsErr ="";
      	$scienceErr ="";
      	$socialErr ="";
      	$name = $tamil =$english = $maths = $science = $sscience = "";
      	$tamilf =$englishf = $mathsf = $sciencef = $ssciencef = "";
      	$marksArray =$_POST[a];
      	$uname=$_POST["name"];


    		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user=$_POST["user"];

          if (empty($_POST["user"])) {
              $nameErr = "Select the name";
            } else {
               $name = $_POST["user"];
               $nameErr="";
          }

    			if ($marksArray[0] =="") {
    		    $tamilErr = "mark is required";
    		  } else {
    		  	 $tamil = $marksArray[0];
    		    if (!preg_match('/^[0-9]*$/',$tamil) || $tamil >100) {
    		      $tamilErr = "Enter valid mark";
    		    }
    		}


    		if ($marksArray[1] =="") {
    		    $englishErr = "mark is required";
    		  } else {
    		  	 $english = $marksArray[1];
    		    if (!preg_match('/^[0-9]*$/',$english) || $english >100) {
    		      $englishErr = "Enter valid mark";
    		    }
    		}


    		if ($marksArray[2] =="") {
    		    $mathsErr = "mark is required";
    		  } else {
    		  	 $maths = $marksArray[2];
    		    if (!preg_match('/^[0-9]*$/',$maths) || $maths >100) {
    		      $mathsErr = "Enter valid mark";
    		    }
    		}


    		if ($marksArray[3] =="") {
    		    $scienceErr = "mark is required";
    		  } else {
    		  	 $science = $marksArray[3];
    		    if (!preg_match('/^[0-9]*$/',$science) || $science >100) {
    		      $scienceErr = "Enter valid mark";
    		    }
    		}


    		if ($marksArray[4] =="") {
    		    $socialErr = "mark is required";
    		  } else {
    		  	 $sscience = $marksArray[4];
    		    if (!preg_match('/^[0-9]*$/',$sscience) || $sscience >100) {
    		      $socialErr = "Enter valid mark";
    		    }
    		}
    			$_SESSION["firstname"]=$uname;
    			$_SESSION["first"]=$marksArray;


    			if(isset($_SESSION['firstname']) && empty($_SESSION['firstname'])) {
    				$bool=false;
    			}
    			else{
    				$bool=true;
    				// header("Location: final.php");
    			}


    			if (in_array("", $marksArray, true)){
    					$bool1=false;
    				}
    				else{
    					$bool1=true;
    			}

          $_SESSION["id"]=$user;
          if($_SESSION["id"]==""){
            $bool2=false;
          }
          else{
            $bool2=true;
          }



    			if($bool&&$bool1&&$bool2){
            $sql = "INSERT INTO student_mark (student_id,tamil,english,maths,science,social_science)
              VALUES ('$user','$tamil','$english','$maths','$science','$sscience')";
              // INSERT INTO `student_mark`(`student_id`, `tamil`, `english`, `maths`, `science`, `social science`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
                if ($conn->query($sql) === TRUE) {
                    header("Location: final.php");
                } else {
                    echo "This student marks are already added";
              }
    			}
    	}
	?>

  
  	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <?php 
          $sql="SELECT id,student_name FROM student_details";
          $result = $conn->query($sql);
      ?>

      <select style="color: black;" id="user" name="user">

          <option value="">Select the name</option>
         <?php while($rs=$result->fetch_assoc()){ ?>
              <option value="<?php echo $rs["id"]; ?>" ><?php echo $rs["student_name"] ?></option>
         <?php }?>

      </select>
      <br>

      <p style="color: white;"><?php echo $nameErr ?></p>


  		<label>Tamil :<input type="text" class="form-control" onInput="checkLength()" id="tamil" value="<?php echo $tamil;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="a[]" "3"></label>
  		<p> <?php echo $tamilErr;?></p>
  		<br>
  		<label>English :<input type="text" class="form-control" onInput="checkLength2()" id="english" value="<?php echo $english;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="a[]" max="3"></label>
  		<p> <?php echo $englishErr;?></p>
  		<br>
  		<label>Maths :<input type="text" class="form-control" onInput="checkLength3()" id="maths" value="<?php echo $maths;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="a[]" max="3"></label>
  		<p> <?php echo $mathsErr;?></p>
  		<br>
  		<label>Science :<input type="text" class="form-control" onInput="checkLength4()" id="science" value="<?php echo $science;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="a[]" max="3"></label>
  		<p> <?php echo $scienceErr;?></p>
  		<br>
  		<label>Social Science :<input type="text" class="form-control" onInput="checkLength5()" id="sscience" value="<?php echo $sscience;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="a[]" max="3"></label>
  		<p> <?php echo $socialErr;?></p>
  		<br>
  		<input type="submit" class="btn btn-default">

  	</form>
</body>
</html>













  
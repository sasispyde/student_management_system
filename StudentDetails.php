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

      body
      {
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
      
      #name 
      {
      		opacity: 0.6;
      		width: 350px;
      		background-color: #8B8B8B;
      		color: white;
      }
      #tamil 
      {
      		width: 350px;
      		opacity: 0.6;
      		color: white;
      		background-color: #8B8B8B;
      }
      #english 
      {
      	  background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      }
      #maths 
      {
      	  background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      }
      #science 
      {
      	  background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      }
      #sscience 
      {
      	  background-color: #8B8B8B;
      		color: white;
      		opacity: 0.6;
      		width: 350px;
      }

  </style>

  <script>
      function checkLength()
      {
            var fieldVal = document.getElementById('tamil').value;
            if(fieldVal <=9999999999)
            {
              return true;
            }
            else
            {
              var str = document.getElementById("tamil").value;
              str = str.substring(0, str.length - 1);
              document.getElementById('tamil').value = str;
            }
        }

      function checkLength2()
      {
            var fieldVal = document.getElementById('english').value;
            if(fieldVal <=999999)
            {
                return true;
            }
            else
            {
              var str = document.getElementById("english").value;
              str = str.substring(0, str.length - 1);
              document.getElementById('english').value = str;
            }
        }

</script>

</head>
    <body>
    	<?php
            $servername = "localhost";
            $username = "root";
            $password = "ndot";

            $conn = new mysqli($servername, $username, $password,"SASI");

            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
            else
            {
              echo "";
            }

          	$minmark=35;
          	$bool=false;
          	$bool1=false;
          	$bool2=false;
            $bool3=false;
            $bool4=false;
            $bool5=false;
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

        		if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
          		  if (empty($_POST["name"])) 
                {
          		    $nameErr = "Name is required";
          		  }
                else
                 {
          		  	$name = $_POST["name"];
          		    if (!preg_match("/^[a-zA-Z ]*$/",$name) || strlen($name)>50) 
                  {
          		      $nameErr = "Please Enter Valid name"; 
          		    }
          		}


        			 if ($marksArray[0] =="") 
                 {
          		      $tamilErr = "Phone Number Is Required";
          		   } 
                else 
                {
          		  	$tamil = $marksArray[0];

          		    if (!preg_match('/^[0-9]*$/',$tamil) || strlen($tamil) < 10) 
                  {
          		      $tamilErr = "Enter Valid Phone Number";
          		    }
          		}


        		if ($marksArray[1] =="") {
        		    $englishErr = "Reg Number Is Required";
        		  } else {
        		  	 $english = $marksArray[1];
        		    if (!preg_match('/^[0-9]*$/',$english) || strlen($english) < 6) {
        		      $englishErr = "Enter Valid Register Number";
        		    }
        		}


        		if ($marksArray[2] =="") {
        		    $mathsErr = "Address Is Required";
        		  } else {
        		  	 $maths = $marksArray[2];
        		    if (!preg_match("/^[a-zA-Z ]*$/",$maths) && strlen($maths)>200){
        		      $mathsErr = "Enter Valid Address";
        		    }
        		}
        			$_SESSION["firstname"]=$uname;
        			$_SESSION["first"]=$marksArray;


        			if(isset($_SESSION['firstname']) && empty($_SESSION['firstname'])) {
        				$bool=false;
        			}
        			else{
        				$bool=true;
        			}

              if(strlen($tamil) < 10){
                $bool2=false;
              }
              else{
                $bool2=true;
              }

              if(strlen($english) < 6){
                $bool3=false;
              }
              else{
                $bool3=true;
              }

              if(strlen($maths)>250){
                $bool4=false;
              }
              else{
                $bool4=true;
              }


        			if (in_array("", $marksArray, true)){
        					$bool1=false;
        				}
        				else{
        					$bool1=true;
        			}

              if(strlen($name)>50){
                $nameErr="The Name Is Too Long";
                $bool5=false;
              }
              else{
                $bool5=true;
              }

              if($bool&&$bool1&&$bool2&&$bool3&&$bool4&&$bool5){

                $sql = "INSERT INTO student_details (student_name,phone_number,reg_number,address)
                  VALUES ('$name','$tamil','$english','$maths')";

                    if ($conn->query($sql) === TRUE) {

                        header("Location: StudentMarks.php");
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                  }
              }
          }
    	?>

      
      	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      		<label>Student Name :<input id="name" class="form-control" type="text" name="name" maxlength="50" value="<?php echo $name;?>"></label>
      		<p> <?php echo $nameErr;?></p>
      		<br><br>
      		<label>Phone Number :<input type="text" class="form-control" onInput="checkLength()" id="tamil" value="<?php echo $tamil;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="10" name="a[]" "3"></label>
      		<p> <?php echo $tamilErr;?></p>
      		<br><br>
      		<label>Reg Number :<input type="text" class="form-control" onInput="checkLength2()" id="english" value="<?php echo $english;?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="6" name="a[]" max="3"></label>
      		<p> <?php echo $englishErr;?></p>
      		<br><br>
      		<label>Address :<textarea type="text" maxlength="250" class="form-control"  id="maths" value="<?php echo $maths;?>" " maxlength="250" name="a[]" max="3"><?php echo $maths; ?></textarea></label>
      		<p> <?php echo $mathsErr;?></p>
      		<br><br>
      		<input type="submit" class="btn btn-default">

      	</form>
    </body>
</html>
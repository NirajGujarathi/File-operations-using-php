<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $titleErr = $OrganisedErr = $JCErr = "";
$name = $title = $Organised = $JC = $role = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  } else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
  {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["title"])) 
  {
    $titleErr = "title is required";
  } else 
  {
    $title = test_input($_POST["title"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) 
  {
      $titleErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["Organised"])) 
  {
    $OrganisedErr = "Organised is required";
  } else 
  {
    $Organised = test_input($_POST["Organised"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$Organised)) 
  {
      $OrganisedErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["JC"])) 
  {
    $JCErr = "Journal/Conference is required";
  } else 
  {
    $JC = test_input($_POST["JC"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$JC)) 
  {
      $JCErr = "Only letters and white space allowed"; 
    }
  }
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

/*echo $name."<br>";
echo $title."<br>";
echo $Organised."<br>";
echo $JC."<br>"; 
echo $role."<br>"; 
 */
?>

<div class="main-container col-md-6" >
<p><span class="error">* required field.</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

	<div class="form-group" >
		<label for="name">Name: </label>
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span>
	</div> 

	<div class="form-group" >
		<label for="name">Titles Paper: </label>
		<input type="text" class="form-control" id="title" name="title" value="<?php echo $title;?>"> <span class="error">* <?php echo $titleErr;?></span>
	</div> 
	
	<div class="form-group" >
		<label for="name">Name of Journal/Conference: </label>
		<input type="text" class="form-control" id="JC" name="JC" value="<?php echo $JC;?>"><span class="error">* <?php echo $JCErr;?></span>
	</div> 
	
  <div class="form-group" >
    <label for="name">Details of program/Your role: </label>
    <input type="text" class="form-control" id="role" name="role" value="">
  </div> 

	<div class="form-group" >
		<label for="name">Organised by: </label>
		<input type="text" class="form-control" id="Organised" name="Organised" value="<?php echo $Organised;?>"><span class="error">* <?php echo $OrganisedErr;?></span>
	</div> 
	
  <div class="form-group" >
    <label for="name">Paper details: role/issue/pp/isbn/issn (as applicable): </label>
    <input type="text" class="form-control" id="JC" name="JC" value="">
  </div> 

  

  Duration: From <input type = "date" name = "sdate"> To <input type = "date" name = "edate">
  
  <div class="col-offset-2">
    <div class="radio-inline">
      <label><input type = "radio" name = "type1" value = "Journal"> Journal </label>
    </div>
    <div class="radio-inline">
      <label><input type = "radio" name = "type1" value = "Conference"> Conference </label>
    </div>  
  </div>

  <div class="col-offset-2">
    <div class="radio-inline">
      <label><input type = "radio" name = "type2" value = "National"> National </label>
    </div>
    <div class="radio-inline">
      <label><input type = "radio" name = "type2" value = "International"> International </label>
    </div> 
  </div>
 


    Invitaion mail/letter: <input type="file" name="pic1" accept="image/*">
  <br><br>
  Certificate/Copy: <input type="file" name="pic2" accept="image/*">
  <br><br>

  
    <button type="submit" name="submit" class="btn btn-success">Submit</button>  
</form>

</div>
</body>
</html>
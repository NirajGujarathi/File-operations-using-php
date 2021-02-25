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

echo $name."<br>";
echo $title."<br>";
echo $Organised."<br>";
echo $JC."<br>"; 
echo $role."<br>"; 
 
?>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Titles Paper: <input type = "text" name = "title" value = "<?php echo $title;?>"> 
   <span class="error">* <?php echo $titleErr;?></span>
  <br><br>
  Duration: From <input type = "date" name = "sdate"> To <input type = "date" name = "edate">
   <br><br>  
  <input type = "radio" name = "type1" value = "Journal"> Journal <?php echo "\t"; ?>
  <input type = "radio" name = "type1" value = "Conference"> Conference <br>
  <input type = "radio" name = "type2" value = "National"> National <?php echo "\t"; ?>
  <input type = "radio" name = "type2" value = "International"> International <br>
  <br>
  Name of Journal/Conference <input type = "text" name = "JC" value = "<?php echo $JC;?>"> 
   <span class="error">* <?php echo $JCErr;?></span>
  <br><br>
  Details of program/Your role: <input type = "textarea" rows="4" cols="50" name = "role">
  <br><br>  
   Organised by <input type = "text" name = "Organised" value = "<?php echo $Organised;?>"> 
   <span class="error">* <?php echo $OrganisedErr;?></span>
  <br><br>
  Paper details: role/issue/pp/isbn/issn (as applicable) <input type = "text" >
  <br><br>
    Invitaion mail/letter: <input type="file" name="pic1" accept="image/*">
  <br><br>
  Certificate/Copy: <input type="file" name="pic2" accept="image/*">
  <br><br>

  
    <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
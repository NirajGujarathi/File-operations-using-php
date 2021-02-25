
<?php
$nameErr = $titleErr = $OrganisedErr = $JCErr = "";
$name = $title = $Organised = $JC = $role = "";


if ($_SERVER["REQUEST_METHOD"] == "GET") 
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

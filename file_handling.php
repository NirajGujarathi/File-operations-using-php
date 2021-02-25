<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$my_file = 'file.txt';
	//create file
	if (isset($_POST['create_file']))
	{
		//$my_file = 'file.txt';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
		echo "<br> file is created";
		fclose($handle);
	}
	//Open a File
	if (isset($_POST['open_file']))
	{
		
		if(file_exists($my_file))
		{
		$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
		echo "<br> opening file in reading mode ";
		$filesize = filesize( $my_file );
			if($filesize)
			{
				echo "<br> reading....<br>";
				$data = fread($handle,$filesize);
				echo $data."<br>";
			}
			else
			{	
				echo "<br> there is nothig inside the file....";
				echo "<br> write some content into the write textbox";
			}
		fclose($handle);
		}
		else
		{
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //open file for writing ('w','r','a')...
			echo "<br> file created and opening it in writing mode...";
		}
		   /*$filedisplay="file.txt";
   		   $filename="file.txt";
		   header('Content-type:application/txt');
		   header('Content-disposition: inline; filename="'.$filename.'"');
		   header('content-Transfer-Encoding:binary');
		   header('Accept-Ranges:bytes');
		  @readfile($filedisplay);*/
	}
	//Read a File
	else if (isset($_POST['read_file']))
	{
		if(file_exists($my_file))
		{
			$handle = fopen($my_file, 'r');
			$filesize = filesize( $my_file );
			echo "<br>file size is:---".$filesize."<br>";
			if($filesize)
			{
				$data = fread($handle,$filesize);
				echo $data."<br>";
				echo "<br> reading file content";
			}
			else
			{	
				echo "<br> there is nothig inside the file....";
				fclose($handle);
			}
		}
		else
		{
			echo "<br> you need to create a file";
		}


	}
	//Write to a File changing content to
	else if (isset($_POST['write_file']))
	{
		//$my_file = 'file.txt';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data= 'hello world default text...';
			if(isset($_POST['data']))
			{
				$data = $_POST['data'];
			}
		fwrite($handle, $data);
		fclose($handle);
		$handle = fopen($my_file, 'r');
		$content = fread($handle,filesize( $my_file ));
		echo $content."<br>";
		echo "<br> writing above content \"$data\" into the file";
	}
	//Append to a File
	else if (isset($_POST['append_file']))
	{
		if(file_exists($my_file))
		{
			$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
		}
		else
		{
			echo "<br>no file..so we created file ....then opening in write mode <br>";
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		}
		$data= 'hello world default text...';
			if(isset($_POST['append']))
			{
				$data = $_POST['append'];
			}
		fwrite($handle, $data);
		fclose($handle);
		$handle = fopen($my_file, 'r');
		$content = fread($handle,filesize( $my_file ));
		echo $content."<br>";
		echo "<br> \" $data \" Appended successfully...<br> ";
	}
	//Close a File

	else if(isset($_POST['close_file']))
	{
		if(file_exists($my_file))
		{
			$handle =fopen($my_file, 'w')  or die('Cannot open file:  '.$my_file);
			//write some data here
			echo "<br> erasing all data ";
			fclose($handle);
		}
		else
		{
			echo "<br>  NO such file exists needs to create it first....";
		}

		
	}
	
	//Delete a File
	else if(isset($_POST['delete_file']))
	{
		if(file_exists($my_file))
		{
			unlink($my_file);
			echo "<br> file deleted...";
		}
		else
		{
			echo "<br>  NO such file exists need to create it first....";
		}
	}
	else
	{
		//fclose($handle);
	}
	//echo "<a href='index.html'> back to menu </a>";
}
?>
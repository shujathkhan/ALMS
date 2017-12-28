<?php
//load the database configuration file
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","it");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());

if(isset($_POST['importSubmit'])){

    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email   //    HERE
		//------------------------------------------------------------------------------------------------------------------		
$role=$_POST['role'];    
$gname=$_POST['groupname'];	
	if($role=='Students' || $role=='Student'|| $role=='student'){
		$table='overallstudent';
		$id='studentid';
		
	}else{
		$table='overallfaculty';
		$id='staffid';
	}

        $prevQuery = sprintf("SELECT $id FROM $table WHERE $id = '".$line[2]."'");
                $prevResult = mysqli_query($conn,$prevQuery);
				$rows=mysqli_num_rows($prevResult);
                if($rows > 0){
                    
                   $query=sprintf("UPDATE $table SET firstname = '".$line[0]."', lastname = '".$line[1]."', $id = '".$line[2]."', emailid = '".$line[3]."', contactno = '".$line[4]."', username = 'uname', password = '".$line[6]."', role = $role, groupname = $gname WHERE $id = '".$line[2]."'");
				   $res=mysqli_query($conn,$query);
					echo $query;
        }else{
                    echo "insert member data into database";
                       $query=sprintf("INSERT INTO $table(firstname,lastname,$id,emailid,contactno,username,password,role,groupname) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','$role','$gname')");
					   
					   $res=mysqli_query($conn,$query);
			}
            }
fclose($csvFile);
 $message= 'success';	
 echo "<script>alert('$message'); location.href='AddUser.php';</script>";
 }else
{
$message = 'invalid file';
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
            
}

//redirect to the listing page
header("Location: AddUser.php".$qstring);
?>
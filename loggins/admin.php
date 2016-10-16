<html>
<head>
<style type="text/css">
 input{
 border:1px solid red;
 border-radius:5px;
 }
 h1{
  color:darkblue;
  font-size:22px;
  text-align:center;
 }
</style>
</head>
<body>
<h1>Add or Remove a User<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>User id:</td><td><input type='text' name='name'/></td></tr>
<tr><td>Password:</td><td><input type='text' name='pwd'/></td></tr>
<tr><td>Add, Edit Or Delete?:</td><td><input type='text' name='actn'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>

</form>
<?php
session_start();

//require("db.php");
//$db = get_db();
if(isset($_POST['submit']))
{



 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 $actn =$_POST['actn'];

 //if a name and password were inputted do the followin
 if($name!=''&&$pwd!=''&& $actn!='')
 {
 //check to see if the name and pasword match the database with lvl 0 clearance
   //$query=mysql_query("select * from login_details where id='".$name."' and password='".$pwd."'and level = 0") or die(mysql_error());
   //$res=mysql_fetch_row($query);
   if($actn= Add ||$actn= add )
   {
       require_once("db.php");
     $db = get_db();  
     $sql = "INSERT INTO login_details (column1,column2) VALUES ($name,$pwd);";
     $db->query($sql);
     
   }
   
   }
   
   
   //if yes proceed to the advisor page 
   

 }
 else
 {
  echo'Enter ID, password and ( Add or Remove)';
 }

?>

    
    
    
    
    
<?php
//session_start();

if(isset($_SESSION["access_level"]) && $_SESSION["access_level"]==1)
    
    {
//database connection class
    require("db.php");
$name = $_SESSION['id'];

//upade the database to show that the user is logged in.
$db = get_db();
$sql = "UPDATE  login_details SET logged='1' WHERE id='$name'";
 $db->query($sql);
 




 

 
 echo "<br><br><br><br><br>Hello $name, This your admin page<br/><a href='logout.php'>Logout</a>";
 
 
 
}
else{
 header("Location:index.php?err=2");
 }
?>
</body>
</html>

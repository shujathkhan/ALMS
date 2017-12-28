<html>
<?php
$host="localhost";
$username="root";
$password="";
$db_name="test";
$tbl_name="student";
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
<script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
<table width="600" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="" onSubmit="return validate();">
<table width="500" border="0" cellpadding="3" cellspacing="1" bgcolor="#ddd">
<tr>
<td>&nbsp;</td>
<td colspan="4"><strong>Delete Multiple Records using Checkbox in PHP</strong> </td>
</tr>
<tr><td></td></tr>
<tr>
<td></td>
<td style=" width:10%"><strong>Id</strong></td>
<td style=" width:30%"><strong>Name</strong></td>
<td style=" width:20%"><strong>Class</strong></td>
<td style=" width:40%"><strong>Email</strong></td>

</tr>

<?php
while($rows=mysql_fetch_array($result)){
?>

<tr>
<td><input name="checkbox[]" type="checkbox" id="checkbox[]" 
value="<?php echo $rows['id']; ?>"></td>
<td><?php echo $rows['id']; ?></td>
<td><?php echo $rows['name']; ?></td>
<td><?php echo $rows['class']; ?></td>
<td><?php echo $rows['email']; ?></td>
</tr>

<?php
}
?>

<tr>
<td><input name="delete" type="submit" id="delete" value="Delete"></td>
</tr>

<?php

// Check if delete button active, start this
if(isset($_POST['delete'])){
for($i=0;$i<count($_POST['checkbox']);$i++){
$del_id=$_POST['checkbox'][$i];
$sql = "DELETE FROM $tbl_name WHERE id='$del_id'";
$result = mysql_query($sql);
}
// if successful redirect to delete_multiple.php
if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=deletemultiple.php\">";
}
}
mysql_close();
?>
</table>
</form>
</td>
</tr>
</table>
</html>
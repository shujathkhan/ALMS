

function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var country=document.getElementById("country_row"+no);
 var age=document.getElementById("age_row"+no);
 var sage=document.getElementById("sage_row"+no);
 var sname=document.getElementById("sname_row"+no);
 var ename=document.getElementById("ename_row"+no);
 var cname=document.getElementById("cname_row"+no);
 var uname=document.getElementById("uname_row"+no);
 var pname=document.getElementById("pname_row"+no); 
	
 var name_data=name.innerHTML;
 var country_data=country.innerHTML;
 var age_data=age.innerHTML;
var sage_data=sage.innerHTML;
 var sname_data=name.innerHTML;
 var ename_data=name.innerHTML;
 var cname_data=name.innerHTML;
 var uname_data=name.innerHTML;
 var pname_data=name.innerHTML;
 
 name.innerHTML="<input type='text' class='col-sm-12' id='name_text"+no+"' value='"+name_data+"'>";
 country.innerHTML="<input type='text' class='col-sm-12' id='country_text"+no+"' value='"+country_data+"'>";
 age.innerHTML="<input type='text' class='col-sm-12' id='age_text"+no+"' value='"+age_data+"'>";
 sage.innerHTML="<input type='text' class='col-sm-12' id='sage_text"+no+"' value='"+sage_data+"'>";
sname.innerHTML="<input type='text' class='col-sm-12' id='sname_text"+no+"' value='"+sname_data+"'>";
 ename.innerHTML="<input type='text' class='col-sm-12' id='ename_text"+no+"' value='"+ename_data+"'>";
 cname.innerHTML="<input type='text' class='col-sm-12' id='cname_text"+no+"' value='"+cname_data+"'>";
 uname.innerHTML="<input type='text' class='col-sm-12' id='uname_text"+no+"' value='"+uname_data+"'>";
 pname.innerHTML="<input type='text' class='col-sm-12' id='pname_text"+no+"' value='"+pname_data+"'>";
 
 }

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var country_val=document.getElementById("country_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;
var sage_val=document.getElementById("sage_text"+no).value;
var sname_val=document.getElementById("sname_text"+no).value;
var ename_val=document.getElementById("ename_text"+no).value;
var cname_val=document.getElementById("cname_text"+no).value;
var uname_val=document.getElementById("uname_text"+no).value;
var pname_val=document.getElementById("pname_text"+no).value;

 
 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("country_row"+no).innerHTML=country_val;
 document.getElementById("age_row"+no).innerHTML=age_val;
document.getElementById("sage_row"+no).innerHTML=sage_val;
document.getElementById("sname_row"+no).innerHTML=sname_val;
document.getElementById("ename_row"+no).innerHTML=ename_val;
document.getElementById("cname_row"+no).innerHTML=cname_val;
document.getElementById("uname_row"+no).innerHTML=uname_val;
document.getElementById("pname_row"+no).innerHTML=pname_val;
 
 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("new_name").value;
 var new_country=document.getElementById("new_country").value;
 var new_age=document.getElementById("new_age").value;
 var new_sage=document.getElementById("new_sage").value;
var snew_name=document.getElementById("snew_name").value;
var enew_name=document.getElementById("enew_name").value;
var cnew_name=document.getElementById("cnew_name").value;
var unew_name=document.getElementById("unew_name").value;
var pnew_name=document.getElementById("pnew_name").value;

 
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td class='col-xs-1' id='name_row"+table_len+"'>"+new_name+"</td><td class='col-xs-2' id='country_row"+table_len+"'>"+new_country+"</td><td class='col-xs-1' id='age_row"+table_len+"'>"+new_age+"</td><td class='col-xs-2' id='sage_row"+table_len+"'>"+new_sage+"</td><td class='col-xs-1' id='sname_row"+table_len+"'>"+new_sname+"</td><td class='col-xs-1' id='ename_row"+table_len+"'>"+new_ename+"</td><td class='col-xs-1' id='cname_row"+table_len+"'>"+new_cname+"</td><td class='col-xs-1' id='uname_row"+table_len+"'>"+new_uname+"</td><td class='col-xs-1' id='pname_row"+table_len+"'>"+new_pname+"</td><td class='col-xs-1'><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_country").value="";
 document.getElementById("new_age").value="";
 document.getElementById("new_sage").value="";
document.getElementById("snew_name").value="";
document.getElementById("enew_name").value="";
document.getElementById("cnew_name").value="";
document.getElementById("unew_name").value="";
document.getElementById("pnew_name").value="";

 }


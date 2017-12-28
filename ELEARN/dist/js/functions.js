
$(function(){
	//Add, Save, Edit and Delete functions code
	$(".btnEdit").bind("click", Edit);
	$(".btnDelete").bind("click", Delete);
	$("#btnAdd").bind("click", Add);
});



function Add(){
	$("#tblData tbody").append(
		"<tr>"+
		"<td><input type='text'/></td>"+
		"<td><input type='text'/></td>"+
		"<td><input type='text'/></td>"+
		"<td><img src='images/disk.png' class='btnSave'><img src='images/delete.png' class='btnDelete'/></td>"+
		"</tr>");
	
		$(".btnSave").bind("click", Save);		
		$(".btnDelete").bind("click", Delete);
}; 
function Save(){
	var par = $(this).parent().parent(); //tr
	var tdName = par.children("td:nth-child(1)");
	var tdPhone = par.children("td:nth-child(2)");
	var tdEmail = par.children("td:nth-child(3)");
	var tdButtons = par.children("td:nth-child(4)");

	tdName.html(tdName.children("input[type=text]").val());
	tdPhone.html(tdPhone.children("input[type=text]").val());
	tdEmail.html(tdEmail.children("input[type=text]").val());
	tdButtons.html("<img src='images/delete.png' class='btnDelete'/><img src='images/pencil.png' class='btnEdit'/>");

	$(".btnEdit").bind("click", Edit);
	$(".btnDelete").bind("click", Delete);
}; 

function Edit(){
	var par = $(this).parent().parent(); //tr
	var tdName = par.children("td:nth-child(1)");
	var tdPhone = par.children("td:nth-child(2)");
	var tdEmail = par.children("td:nth-child(3)");
	var tdButtons = par.children("td:nth-child(4)");

	tdName.html("<input type='text' id='txtName' value='"+tdName.html()+"'/>");
	tdPhone.html("<input type='text' id='txtPhone' value='"+tdPhone.html()+"'/>");
	tdEmail.html("<input type='text' id='txtEmail' value='"+tdEmail.html()+"'/>");
	tdButtons.html("<img src='images/disk.png' class='btnSave'/>");

	$(".btnSave").bind("click", Save);
	$(".btnEdit").bind("click", Edit);
	$(".btnDelete").bind("click", Delete);
};
function Delete(){
	var par = $(this).parent().parent(); //tr
	par.remove();
}; 
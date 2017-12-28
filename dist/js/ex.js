
	function selectRow(row) {
    if (row.className.indexOf("selected") != -1) {
        row.className = row.className.replace("selected", "");
    } else {
        row.className += " selected";
    }
}

function deleteRow(tableID) {
    try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];
           /* var chkbox = row.cells[0].childNodes[0];
            if (null != chkbox && true == chkbox.checked)*/

            if (row.getElementsByTagName("input")[0].className.indexOf("selected")!=-1) {
               
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
    } catch (e) {
        alert(e);
    }
    //getValues();
}

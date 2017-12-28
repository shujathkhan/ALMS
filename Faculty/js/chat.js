function sendMsg() {
var chMsg = $("#msgfield").val();	
var chname = $("#name").val();
if (chMsg != "" && chname != "") {
chMsg = encodeURI(chMsg);
chname = encodeURI(chname);
$("#chatbox").load("chataction.php?msg="+chMsg+"&name="+chname);
$("#msgfield").val("");
$("#msgfield").focus();
} else {
alert("Please enter your name & message!");	
$("#msgfield").focus();
}
$("#chatbox").animate({ scrollTop: $(document).height() }, "slow");
}
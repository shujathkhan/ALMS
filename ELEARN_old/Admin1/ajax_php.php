<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#form').on('click', function (event) {
var tc = $(this).closest("form").find("input[name='delete']").val();
var tce = $(this).closest("form").find("input[name='submit']").val();
    console.log(tce);      
event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'php.php',
            data: $('#form').serialize(),
            success: function (data) {
              alert(data);
            }
          });

        });
      });
    </script>
  </head>
  <body>
    <form id="form">
      <input name="time" value="00:00:00.00"><br>
      <input name="date" value="0000-00-00"><br>
      <input name="delete" type="submit" value="Delete">
	  <input name="submit" type="submit" value="Submit">
      
      <input name="submit" type="submit" value="Edit">
    </form>
  </body>
</html>
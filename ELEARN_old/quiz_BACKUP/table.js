
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  
  

  
  
  

  

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>

  

  

  

  
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  

  

  <style type="text/css">
    
  </style>

  <title></title>

  
    




<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(".use-address").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".nr").text(); // Find the text
    
    // Let's test it out
    alert($text);
});
});//]]> 

</script>

  
</head>

<body>
  <table id="choose-address-table" class="ui-widget ui-widget-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Name/Nr.</th>
            <th>Street</th>
            <th>Town</th>
            <th>Postcode</th>
            <th>Country</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="nr"><span>50</span>
            </td>
            <td>Some Street 1</td>
            <td>Glasgow</td>
            <td>G0 0XX</td>
            <td>United Kingdom</td>
            <td>
                <button type="button" class="use-address" />
            </td>
        </tr>
        <tr>
            <td class="nr">49</td>
            <td>Some Street 2</td>
            <td>Glasgow</td>
            <td>G0 0XX</td>
            <td>United Kingdom</td>
            <td>
                <button type="button" class="use-address" />
            </td>
        </tr>
    </tbody>
</table>
  
  <script>
  // tell the embed parent frame the height of the content
  if (window.parent && window.parent.parent){
    window.parent.parent.postMessage(["resultsFrame", {
      height: document.body.getBoundingClientRect().height,
      slug: "UW38e"
    }], "*")
  }
</script>

</body>

</html>


<!DOCTYPE html>
<html>
<head>
	<link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body>


<td>
	<a href= "javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
</td>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script type="text/javascript">
	
$(document).ready(function(){
  $('.delete_btn_ajax').click(function (e){
	e.preventDefault();
   	console.log("click Hello");
   	});
});

</script>
</body>
</html>
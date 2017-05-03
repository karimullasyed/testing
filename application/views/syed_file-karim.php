<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Ajax Form</title>
	
</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

	
	$(document).ready(function()
	{
		$('#mobile').change(function(){
			
        var mob_no = $('#mobile').val();
		alert(mob_no);
        $.ajax({     
				type : "POST",
				url: "<?php echo base_url('ajax_form/exist_mobile');?>?mob_no="+mob_no,
				//data:mob_no,
				success:function(res){
					if(res==1){
					alert("Mobile no already exists.");
					$('#mobile').val("");	
					} 
				}, 
			});
	});
		
		$("#f_id").submit(function(e)
		{
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('ajax_form/getdata'); ?>",
				data: $("#f_id").serialize(), 
				success: function(res){ alert(res); },
				error: function() { alert("Faild"); }
		   });
		});
		
		
	});
	
	
</script>
<body>
<form name="a_form"  id="f_id" method = "post">

<table  align="center" style="border-collapse:collapse" align="center">
<caption>Ajax Form</caption>

<tr>
<td>Name</td><td><input type="text" name="name" required></td>
</tr>

<tr>
<td>Mobile</td><td><input type="text" name="mobile" id="mobile" required></td>
</tr>

<tr>
<td>Email</td><td><input type="text" name="email" required></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" > 
</tr>
</table>
</form>
</body>
</html>
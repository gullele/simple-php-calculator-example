<html>
<head>
	<title>Calculate Home</title>
	<style type="text/css">
	.left{
	float:left;
	}
	.right{
	float:right;
	}
	</style>
</head>
<body>
<h2>We are number magicians</h2>
<form>
<input type="hidden" name = "controller" value="calculator" />
<input type="hidden" name = "action" value="calculate" />
<div>
	<div style="width:30%">
		<div class="left">First Number</div>
		<div class="right"><input id='param1' name='param1' /></div>
	</div>
	<div style="width:30%; clear:both;">
		<div class="left">second Number</div>
		<div class="right"><input id='param2' name='param2' /></div>
	</div>
	<div style="width:30%; clear:both;">
		<div class="left">Task</div>
		<div class="right">
			<select id="task" name="task">
				<option value="add">Add</option>
				<option value="multiply">Multiply</option>
				<option value="divide">Divide</option>
				<option value="subtract">Subtract</option>
			</select>
		</div>
	</div>	
	<div style="width:30%; clear:both">
		<input type="submit" value="calculate" id="calculate" name="calculate" />
	</div>
</div>	
</form>
</body>
</html>
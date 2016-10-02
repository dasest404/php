<?php
if(isset($_POST['submit'])){
	process_form();
}else{
	show_form();
}

function show_form(){
?>
<!doctype html>
<html>
<head>
<title>Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Apply for our seminar</h1>
<form action="2-5.php" method="post">
<table>
<tr>
	<th>Name</th>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<th>Tel</th>
	<td><input type="text" name="tel"></td>
</tr>
<tr>
	<th>Email</th>
	<td><input type="text" name="email"></td>
</tr>
<tr>
	<th>Which Seminar?</th>
	<td>
		<label><input type="radio" name="seminar" value="PHP Seminar on 15th April at 11:00">PHP Seminar on 15th April at 11:00</label><br>
		<label><input type="radio" name="seminar" value="HTML Seminar on 16th April at 11:00">HTML Seminar on 16th April at 11:00</label><br>
		<label><input type="radio" name="seminar" value="CSS Seminar on 17th April at 11:00">CSS Seminar on 17th April at 11:00</label>
	</td>
</tr>
<tr>
	<th>State</th>
	<td>
		<select name="state">
			<option selected="selected" value="">----</option>
			<option value="KARNATAKA">KARNATAKA</option>
			<option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
			<option value="ASSAM">ASSAM</option>
			<option value="BIHAR">BIHAR</option>
			<option value="CHANDIGARH">CHANDIGARH</option>
			<option value="CHHATISGARH">CHHATISGARH</option>
			<option value="GOA">GOA</option>
			<option value="GUJARAT">GUJARAT</option>
			<option value="HARYANA">HARYANA</option>
			<option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
			<option value="JAMMU & KASHMIR">JAMMU & KASHMIR</option>
			<option value="JHARKHAND">JHARKHAND</option>
			<option value="KARNATAKA2">KARNATAKA</option>
			<option value="KERALA">KERALA</option>
			<option value="MADHYA PRADESH">MADHYA PRADESH</option>
			<option value="MAHARASHTRA">MAHARASHTRA</option>
			<option value="MEGHALAYA">MEGHALAYA</option>
			<option value="NEW DELHI">NEW DELHI</option>
			<option value="ORISSA">ORISSA</option>
			<option value="PUNJAB">PUNJAB</option>
			<option value="RAJASTHAN">RAJASTHAN</option>
			<option value="TAMIL NADU">TAMIL NADU</option>
			<option value="UTTAR PRADESH">UTTAR PRADESH</option>
			<option value="UTTARAKHAND">UTTARAKHAND</option>
			<option value="WEST BENGAL">WEST BENGAL</option>
		</select>
	</td>
</tr>
<tr>
	<th>What is your interest?</th>
	<td>
		<label><input type="checkbox" name="interest[]" value="Technology">Technology</label>
		<label><input type="checkbox" name="interest[]" value="Presentation">Presentation</label>
		<label><input type="checkbox" name="interest[]" value="Products">Products</label>
	</td>
</tr>
<tr>
	<th>Comment</th>
	<td><textarea col="30" rows="5" name="comment"></textarea></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="send" name="submit"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

function process_form(){
	$customer_message=<<<THANKS
Dear $_POST[name]
Thank you very much for applying our seminar.
We are looking forward to seeing you in the $_POST[seminar].

--
Warm Regards,
Internet Academy
THANKS;

	$staff_message=<<<INFORMATION
Name : $_POST[name]
TEL : $_POST[tel]
Email : $_POST[email]
Seminar : $_POST[seminar]
State : $_POST[state]
Comment : $_POST[comment]
INFORMATION;

//mail($_POST['email'],'Thank you',$customer_message);
//mail('j_yamada@internetacademy.co.jp','Seminar Apply',$staff_message);

?>
<!doctype html>
<html>
<head>
<title>Thank you!</title>
</head>
<body>
<p>Thank you very much for your apply.</p>
<p>Your information is as following.</p>
<ul>
<li>Name : <?php echo $_POST['name']; ?></li>
<li>TEL : <?php echo $_POST['tel']; ?></li>
<li>Email : <?php echo $_POST['email']; ?></li>
<li>Seminar : <?php echo $_POST['seminar']; ?></li>
<li>State : <?php echo $_POST['state']; ?></li>
<li>Interest : <?php foreach($_POST['interest'] as $values){echo $values." ";} ?></li>
<li>Comment : <?php echo $_POST['comment']; ?></li>
</ul>
</body>
</html>
<?php
}
?>
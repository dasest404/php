<?php
if(isset($_POST['submit'])){
	if($form_errors = validate_form()){
		show_form($form_errors);
	}else{
		process_form();
	}
}else{
	show_form();
}

function show_form($errors=''){
	if($errors){
		$error_text = '<tr class="errors"><th>You need to correct the following errors:';
		$error_text .= '</th><td><ul><li>';
		$error_text .= implode('</li><li>',$errors);
		$error_text .= '</li></ul></td></tr>';
	}else{
		$error_text ='';
	}
?>
<!doctype html>
<html>
<head>
<title>Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Apply for our seminar</h1>
<form action="2-6.php" method="post">
<table>
<?php echo $error_text; ?>
<tr>
	<th>Name (Required)</th>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<th>Tel (Required | Only Number)</th>
	<td><input type="text" name="tel"></td>
</tr>
<tr>
	<th>Email (Required)</th>
	<td><input type="text" name="email"></td>
</tr>
<tr>
	<th>Which Seminar? (Required)</th>
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
	$name = htmlentities($_POST['name'],ENT_QUOTES,'UTF-8');
	$tel = htmlentities($_POST['tel'],ENT_QUOTES,'UTF-8');
	$email = htmlentities($_POST['email'],ENT_QUOTES,'UTF-8');
	$seminar = htmlentities($_POST['seminar'],ENT_QUOTES,'UTF-8');
	$state = htmlentities($_POST['state'],ENT_QUOTES,'UTF-8');
	$interest = htmlentities(implode(', ',$_POST['interest']),ENT_QUOTES,'UTF-8');
	$comment = htmlentities($_POST['comment'],ENT_QUOTES,'UTF-8');


	$customer_message=<<<THANKS
Dear $name
Thank you very much for applying our seminar.
We are looking forward to seeing you in the $seminar.

--
Warm Regards,
Internet Academy
THANKS;


	$staff_message=<<<INFORMATION
Application for Seminar
Name : $name
TEL : $tel
Email : $email
Seminar : $seminar
State : $state
Interest : $interest
Comment : $comment
INFORMATION;


mail($email,'Thank you',$customer_message);
mail('j_yamada@internetacademy.co.jp','Seminar Apply',$staff_message);

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
<li>Name : <?php echo $name; ?></li>
<li>TEL : <?php echo $tel; ?></li>
<li>Email : <?php echo $email; ?></li>
<li>Seminar : <?php echo $seminar; ?></li>
<li>State : <?php echo $state; ?></li>
<li>Interest : <?php echo $interest; ?></li>
<li>Comment : <?php echo $comment; ?></li>
</ul>
</body>
</html>
<?php
}

function validate_form(){

	$error_array = array();
	if(! strlen(trim($_POST['name'])) || strlen(trim($_POST['name']))>40){
		$error_array[] = 'Please fill in your name. (max 40 characters)';
	}
	if(! preg_match('/^\d{8,12}?$/',$_POST['tel'])){
		$error_array[] = 'Please fill in correct number. Hyphen is not required.';
	}
	if(! preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i',$_POST['email'])){
		$error_array[] = 'Please fill in correct email ID.';
	}
	
	return $error_array;
}

?>
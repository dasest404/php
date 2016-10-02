<?php
require 'form_parts.php';

$india_state = array('ANDHRA PRADESH','ASSAM','BIHAR','CHANDIGARH','CHHATISGARH','GOA','GUJARAT','HARYANA','HIMACHAL PRADESH','JAMMU & KASHMIR','JHARKHAND','KARNATAKA','KERALA','MADHYA PRADESH','MAHARASHTRA','MEGHALAYA','NEW DELHI','ORISSA','PUNJAB','RAJASTHAN','TAMIL NADU','UTTAR PRADESH','UTTARAKHAND','WEST BENGAL');

if(array_key_exists('check_submit',$_POST)){
	if($form_errors = validate_form()){
		show_form($form_errors);
	}else{
		process_form();
	}
}else{
	show_form();
}

function show_form($errors=''){
	if(array_key_exists('check_submit',$_POST)){
		$defaults = $_POST;
	}else{
		$defaults = array(
			"name"=>"",
			"tel"=>"",
			"email"=>"",
			"seminar"=>"",
			"state"=>"",
			"interest"=>"",
			"comment"=>""
		);
	}
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
<form action="2-5-3.php" method="post">
<table>
<?php echo $error_text; ?>
<tr>
	<th>Name (Required)</th>
	<td><?php input_text('name',$defaults); ?></td>
</tr>
<tr>
	<th>Tel (Required)</th>
	<td><?php input_text('tel',$defaults); ?></td>
</tr>
<tr>
	<th>Email (Required)</th>
	<td><?php input_text('email',$defaults); ?></td>
</tr>
<tr>
	<th>Which Seminar? (Required)</th>
	<td>
		<label><?php input_radio('seminar',$defaults,'PHP Seminar on 15th April at 11:00'); ?>PHP Seminar on 15th April at 11:00</label><br>
		<label><?php input_radio('seminar',$defaults,'HTML Seminar on 16th April at 11:00'); ?>HTML Seminar on 16th April at 11:00</label><br>
		<label><?php input_radio('seminar',$defaults,'CSS Seminar on 17th April at 11:00'); ?>CSS Seminar on 17th April at 11:00</label>
	</td>
</tr>
<tr>
	<th>State</th>
	<td><?php input_select('state',$defaults,$GLOBALS['india_state']); ?></select>
	</td>
</tr>
<tr>
	<th>What is your interest?</th>
	<td>
		<label><?php input_check('interest',$defaults,'Technology'); ?>Technology</label>
		<label><?php input_check('interest',$defaults,'Presentation'); ?>Presentation</label>
		<label><?php input_check('interest',$defaults,'Products'); ?>Products</label>
	</td>
</tr>
<tr>
	<th>Comment</th>
	<td><?php input_textarea('comment',$defaults); ?></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="send"></td>
</tr>
</table>
<input type="hidden" name="check_submit" value="1">
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

	try{
		$pdo = new PDO("mysql:host=localhost;dbname=test1;charset=utf8","root","ia223");
		$sql = "INSERT INTO seminar_customer(name, tel, email, seminar, state, interest, comment) VALUES(?,?,?,?,?,?,?)";
		$result = $pdo->prepare($sql);
		$result->execute(array($name,$tel,$email,$seminar,$state,$interest,$comment));
	}catch(PDOException $e){
		die('Cannot connect:'.$e->getMessage());
	}

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


mail($_POST['email'],'Thank you',$customer_message);
mail('j_yamada@internetacademy.co.jp','Seminar Apply',$staff_message);

echo <<<THANKS
Thank you very much for your apply.<br>
Your application was sent to us.
THANKS;
}

function validate_form(){

	$error_array = array();
	if(!strlen(trim($_POST['name'])) || strlen(trim($_POST['name']))>40){
		$error_array[] = 'Please fill in your name. (max 40 characters)';
	}
	if(! preg_match('/^\d{8,12}?$/',$_POST['tel'])){
		$error_array[] = 'Please fill in correct number.';
	}
	if(! preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i',$_POST['email'])){
		$error_array[] = 'Please fill in correct email ID.';
	}
	
	return $error_array;
}

?>
<?php 
	
	$name_exists = (isset($_REQUEST['name']) && !empty($_REQUEST['name']));
	$section_exists = (isset($_REQUEST['section']) && !empty($_REQUEST['section']));
	$card_exists = (isset($_REQUEST['credit_card']) && !empty($_REQUEST['credit_card'])); 
	$card_type_exists = (isset($_REQUEST['card_type']) && !empty($_REQUEST['card_type']));
	if(!($name_exists && $section_exists && $card_type_exists && $card_exists)){
		$error = true;
	}else{
		$error = false;
		$data = implode(';', $_REQUEST);
		file_put_contents("suckers.txt", "\n".$data, FILE_APPEND);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
<?php if(!$error){ ?>
		<h1>Buy Your Way to a Better Education!</h1>

		<p>
			The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for money.  That's right!  All you need to get a 4.0 in this course is cold, hard, cash.
		</p>
		
		<hr />
		
		<h2>Give Us Your Money</h2>
		<dl>
			<dt>Name</dt>
			<dd>
				<?=$_POST['name']?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?=$_POST['section']?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<?=$_POST['credit_card']?>
				(<?=$_POST['card_type']?>)
			</dd>
		</dl>
		
		<div>
			<p>Here are all the suckers who have submitted here:</p>
		
			<pre>
				<?php 
					print(file_get_contents("suckers.txt"));
				?>
			</pre>
		</div>

		<?php }else{ ?>
			<h1>Sorry</h1>

			<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
		<?php } ?>
	</body>
</html>
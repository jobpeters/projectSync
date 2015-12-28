<div class="content">
	<div id="loginBox">
		<div id="header">
			<p>login</p>
		</div>
		<form name="loginForm" method="POST" enctype="multipart/form-data" >
			<input placeholder="email" class="email" type="email" name="email" value="<?php echo($_GET['e']); ?>" autofocus>
			<input placeholder="password" class="password" type="password" name="password" value="<?php echo($_GET['p']); ?>">
			<input name="submit" value="true" type="hidden">
			<input id="submit" value="Aanmelden" type="submit">
		</form>
		<div class="extra">
			<span onclick="location.href='index.php?page=register'">Nog geen account?</span>
			<span onclick="location.href='index.php?page=forgot'">Wachtwoord vergeten?</span>
		</div>
	</div>
</div>
<?php
// $_SESSION['STATUS'] = 0
if (isset($_GET['e']) AND isset($_GET['p'])) {
	echo "<h1><h1>log in dan!!!!!</h1></h1>";
	isset($_POST);
	$_POST["email"] = $_GET['e'];
	$_POST["password"] = $_GET['p'];
	$_POST["submit"] = "true";
	echo(var_dump($_POST));
}
if(isset($_POST)) {
	$error = "";
	$email = $_POST['email'];
	$password = $_POST['password'];
	try{
		$sql = "SELECT * FROM consultants WHERE Email = ?";
		$stmt = $db->prepare($sql);
		$stmt->execute(array($email));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result) {	
			$admin = json_decode($result['Admin']);
			$_SESSION['ADMIN'] = $admin;
			$hash = $result['Wachtwoord'];
			if(password_verify($password, $hash)){ 
				$_SESSION['ID'] = $result['C_ID'];
				$_SESSION['STATUS'] = 1;
				$_SESSION['NAAM'] = $result['Naam'];
				if (!($admin === 1)) {
					echo "<script>location.href='index.php?page=about-us';</script>";
				} else {
					echo "<script>location.href='index.php?page=dashboard';</script>";
				}
			} 
			else {
				$error .= "Deze gegevens zijn niet bij ons bekend.<br>";
			}
		} 
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
}
if ($error) {
	echo $error;
}
?>
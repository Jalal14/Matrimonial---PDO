<?php
  	$loggedAdmin = $_SESSION['loggedAdmin'];
?>
<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<fieldset>
        		<legend>PROFILE</legend>
	        	<form method="POST">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td rowspan="7">
								<img width="128" src="<?= APP_ROOT."/asset/".$loggedAdmin['propic']; ?>"/>
							</td>
							<td>First name: </td>
		          			<td><input type="text" name="fname" value="<?= $loggedAdmin['fname']; ?>">
		          			</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Middle name: </td>
							<td><input type="text" name="mname" value=
		          				<?php
			          				if (isset($loggedAdmin['mname'])) {
										echo $loggedAdmin['mname'];
									}
								?>>
		          			</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Last name: </td>
							<td><input type="text" name="lname" value="<?= $loggedAdmin['lname']; ?>">
		          			</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>DOB: </td>
							<td><input type="date" name="dob" value= 
								<?php
									if (isset($loggedAdmin['dob'])) {
										echo $loggedAdmin['dob'];
									}
								?> >
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>
								<?php
									foreach ($genderList as $gender) {
										if (isset($loggedAdmin['gender'])) 
										{
											if ($gender['id']==$loggedAdmin['gender']) {
												echo "<input type='radio' name='gender' value=".$gender['id']." checked> ".$gender['gender']." |";
											}
											else{
												echo "<input type='radio' name='gender' value=".$gender['id']."> ".$gender['gender']." |";
											}
										}
										else{
											echo "<input type='radio' name='gender' value=".$gender['id']."> ".$gender['gender']." |";
										}
									}
								?>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Blood group</td>
							<td>:</td>
							<td>
								<select name='blood'>
									<?php
										foreach ($bloodList as $blood) {
											if (isset($loggedAdmin['blood'])) {
												if ($blood['id']==$loggedAdmin['blood']['id']) {
													echo "<option value=".$blood['id']." selected > ".$blood['bgroup']."</option>";
												}else{
													echo "<option value=".$blood['id']." > ".$blood['bgroup']."</option>";
												}
											}
											else{
												echo "<option value=".$blood['id']." > ".$blood['bgroup']."</option>";
											}
										}
							 		?>
								</select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="text" name="email" value=
								<?php
									if (isset($loggedAdmin['email'])) {
										echo $loggedAdmin['email']; 
									}
								?> >
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td>
								<input type="text" name="number1" value=
									<?php
										if (isset($loggedAdmin['number1'])) {
											echo $loggedAdmin['number1'];
										}
									?>
								><br><br>
								<input type="text" name="number2" value=
									<?php
										if (isset($loggedAdmin['number2'])) {
											echo $loggedAdmin['number2'];
										}
									?>
								>
							</td>
							</tr>
						<tr><td colspan="3"><hr/></td></tr>
					</table>
					<input type="submit" value="Update"><br><br>
					<?php
						if (isset($errorMsg)) {
							echo $errorMsg;
						}
					?>
				</form>
			</fieldset>
		</td>
    </tr>
    <tr>
    	<td></td>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

<?php
  	$loggedUser = $_SESSION['loggedUser'];
?>
<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<form method="POST">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td rowspan="7">
							<img width="128" src="<?= APP_ROOT."/asset/".$loggedUser['propic']; ?>"/>
						</td>
						<td>First name: </td>
	          			<td><input type="text" name="fname" value=
	          				<?php
		          				if (isset($loggedUser['fname'])) {
									echo $loggedUser['fname'];
								}
							?> >
	          			</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Middle name: </td>
						<td><input type="text" name="mname" value=
	          				<?php
		          				if (isset($loggedUser['mname'])) {
									echo $loggedUser['mname'];
								}
							?> >
	          			</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Last name: </td>
						<td><input type="text" name="lname" value=
	          				<?php
		          				if (isset($loggedUser['lname'])) {
									echo $loggedUser['lname'];
								}
							?> >
	          			</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>DOB: </td>
						<td><input type="date" name="dob" value= 
							<?php
								if (isset($loggedUser['dob'])) {
									echo $loggedUser['dob'];
								}
							?> >
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" name="email" value=
							<?php
								if (isset($loggedUser['email'])) {
									echo $loggedUser['email']; 
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
									if (isset($loggedUser['gender'])) 
									{
										if ($gender['id']==$loggedUser['gender']['id']) {
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
						<td>Religion</td>
						<td>:</td>
						<td>
							<select name='religion'>
							<?php
								foreach ($religionList as $religion) {
									if (isset($loggedUser['religion'])) {
										if ($religion['id']==$loggedUser['religion']['id']) {
											echo "<option value=".$religion['id']." selected > ".$religion['name']."</option>";
										}else{
											echo "<option value=".$religion['id']." > ".$religion['name']."</option>";
										}
									}
									else{
										echo "<option value=".$religion['id']." > ".$religion['name']."</option>";
									}
								}
						 	?>
						</select>
					</tr>
					<tr>
						<td></td>
					</tr>
				</table>
				<hr>
				<fieldset>
					<legend>Additional information</legend>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Height</td>
							<td>:</td>
							<td><input type="text" name="height" value=
								<?php
									if (isset($loggedUser['height'])) {
										echo $loggedUser['height']; 
									}
								?> >
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Weight</td>
							<td>:</td>
							<td><input type="text" name="weight" value=
								<?php
									if (isset($loggedUser['weight'])) {
										echo $loggedUser['weight'];
									}
								?> >
								&nbsp;Kg
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
											if (isset($loggedUser['blood'])) {
												if ($blood['id']==$loggedUser['blood']['id']) {
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
							<td>Contact</td>
							<td>:</td>
							<td>
								<input type="text" name="number1" value=
									<?php
										if (isset($loggedUser['number1'])) {
											echo $loggedUser['number1'];
										}
									?>
								><br><br>
								<input type="text" name="number2" value=
									<?php
										if (isset($loggedUser['number2'])) {
											echo $loggedUser['number2'];
										}
									?>
								>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Complexion</td>
							<td>:</td>
							<td>
								<select name='complexion'>
									<?php
										foreach ($complexionList as $complexion) {
											if (isset($loggedUser['complexion'])) {
												if ($complexion['id']==$loggedUser['complexion']['id']) {
													echo "<option value=".$complexion['id']." selected > ".$complexion['type']."</option>";
												}else{
													echo "<option value=".$complexion['id']." > ".$complexion['type']."</option>";
												}
											}
											else{
												echo "<option value=".$complexion['id']." > ".$complexion['type']."</option>";
											}
										}
							 		?>
							 ?>
							 </select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Marital status</td>
							<td>:</td>
							<td>
								<select name='marital_status'>
									<?php 
										foreach ($maritalList as $marital) {
											if (isset($loggedUser['marital_status'])) {
												if ($marital['id']==$loggedUser['marital_status']['id']) {
													echo "<option value=".$marital['id']." selected> ".$marital['status']."</option>";
												}else{
													echo "<option value=".$marital['id']."> ".$marital['status']."</option>";
												}
											}
											else{
												echo "<option value=".$marital['id']."> ".$marital['status']."</option>";
											}
										}
									 ?>
								 </select>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Children</td>
							<td>:</td>
							<td><input type="number" name="children" value=
								<?php
									if (isset($loggedUser['children'])) {
										echo $loggedUser['children'];
									}
								?>>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Bio</td>
							<td>:</td>
							<td>
								<textarea  name="bio" placeholder=
									<?php 
										if (isset($loggedUser['bio'])) {
											echo $loggedUser['bio'];
										}
									?>
								></textarea>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
					</table>
				</fieldset>
				<input type="submit" value="Update"><br><br>
				<?php
					if (isset($errorMsg)) {
						echo $errorMsg;
					}
				?>
			</form>
		</td>
    </tr>
    <tr>
    	<td></td>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

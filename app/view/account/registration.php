<table width="60%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td valign="middle" height="70">
			<table width="100%">
				<tr>
          			<td>
						<a href=<?= APP_ROOT."/"; ?>>
							<img height="48" src="<?= APP_ROOT."/asset/defaultpic/ring.png"; ?>">
						</a>
					</td>
					<td align="right">
						<a href=<?= APP_ROOT."/"; ?>>Home</a>&nbsp;|
						<a href=<?= APP_ROOT."/?account_login"; ?>>Login</a>&nbsp;|
						<a href=<?= APP_ROOT."/?account_registration";?>>Registration</a>
					</td>
				</tr>
			</table>
        </td>
    </tr>
    <tr>
        <td>
			<fieldset>
			    <legend><b>REGISTRATION</b></legend>
				<form method="POST">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>First name</td>
							<td>:</td>
							<td><input name="fname" type="text"></td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Middle name</td>
							<td>:</td>
							<td><input name="mname" type="text"></td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Last name</td>
							<td>:</td>
							<td><input name="lname" type="text"></td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>User name</td>
							<td>:</td>
							<td><input name="uname" type="text"></td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td valign="top">Date of Birth</td>
							<td valign="top">:</td>
							<td>
								<input name="dob" type="date">
								<br/>
								<font size="2"><i>(dd/mm/yyyy)</i></font>
							</td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Blood group</td>
							<td>:</td>
							<td>
								<select name="blood">
									<?php
										foreach ($bloodList as $blood) {
											echo "<option value=". $blood['id'] .">".$blood['bgroup'];
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>
								<?php
									foreach ($genderList as $gender) {
										echo "<input name='gender' type='radio' value=". $gender['id'] ." checked>".$gender['gender'];
									}

								?>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input name="email" type="text">
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>
								<select name="religion">
									<?php
										foreach ($religionList as $religion) {
											echo "<option value=". $religion['id'] .">".$religion['name'];
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td>
								<input name="contact" type="text">
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input name="password" type="password"></td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Confirm Password</td>
							<td>:</td>
							<td><input name="confirmPassword" type="password"></td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" value="Submit">
					<input type="reset">
				</form>
				<?php
					if (isset($errorMsg)) {
						echo $errorMsg;
					}
				?>
			</fieldset>
		</td>
    </tr>
    <tr>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

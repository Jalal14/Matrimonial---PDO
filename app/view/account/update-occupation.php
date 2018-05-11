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
					</tr>
				</table>
				<hr>
				<fieldset>
					<legend>Additional information</legend>
					<table cellpadding="0" cellspacing="0">
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Occupation</td>
							<td>:</td>
							<td>
								Designation: <input type="text" name="designation" value=
									<?php
										if (isset($loggedUser['job']['designation'])) {
											echo $loggedUser['job']['designation'];
										}
									?>><br><br>
								Company <input type="text" name="company" value=
									<?php
										if (isset($loggedUser['job']['company'])) {
											echo $loggedUser['job']['company'];
										}
									?>><br><br>
								Joinning date: <input type="date" name="joinning_date" value=
								<?php
									if (isset($loggedUser['job']['joinning_date'])) {
										echo $loggedUser['job']['joinning_date'];
									}
								?>>

							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Annual income</td>
							<td>:</td>
							<td>
								<input type="number" name="annual_income" value=
									<?php
										if (isset($loggedUser['annual_income'])) {
											echo $loggedUser['annual_income'];
										}
									?>>
							</td>
						</tr>
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

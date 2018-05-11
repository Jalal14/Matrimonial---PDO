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
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td rowspan="7">
						<img width="128" src="<?= APP_ROOT."/asset/".$loggedAdmin['propic']; ?>"/>
					</td>
					<td>Name</td>
					<td>:</td>
					<td>
						<?php
							if (isset($loggedAdmin['fname'])) {
								echo $loggedAdmin['fname']." ";
							}
							if (isset($loggedAdmin['mname'])) {
								echo $loggedAdmin['mname']." ";
							}
							if (isset($loggedAdmin['lname'])) {
								echo $loggedAdmin['lname'];
							}
						?>
					</td>
				</tr>
				<tr><td colspan="3"><hr/></td></tr>
				<tr>
					<td>Age</td>
					<td>:</td>
					<td> 
						<?php 
						if (isset($loggedAdmin['age'])) {
							echo $loggedAdmin['age'];
						}
					 	?> 
					</td>
				</tr>
				<tr><td colspan="3"><hr/></td></tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td> 
						<?php
							if (isset($loggedAdmin['gender_name'])) {
								echo $loggedAdmin['gender_name'];
							}
						?>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			<hr>
			<fieldset>
				<legend>Additional information</legend>
				<table cellpadding="0" cellspacing="0">
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Blood group</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedAdmin['bgroup'])) {
									echo $loggedAdmin['bgroup'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedAdmin['email'])) {
									echo $loggedAdmin['email'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Contact</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedAdmin['number1'])) {
									echo $loggedAdmin['number1'];
								}
					 		?>
					 		<br>
					 		<?php
								if (isset($loggedAdmin['number2'])) {
									echo $loggedAdmin['number2'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Joinning date</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedAdmin['joinning_date'])) {
									echo $loggedAdmin['joinning_date'];
								}
					 		?>
						</td>
					</tr>
				</table>
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

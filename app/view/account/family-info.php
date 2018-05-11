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
        	<table cellpadding="0" cellspacing="0">
				<tr>
					<td rowspan="7">
						<img width="128" src="<?= APP_ROOT."/asset/".$loggedUser['propic']; ?>"/>
					</td>
				</tr>
			</table>
			<fieldset>
			    <legend><b>Family information</b></legend>
				<form method="POST">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Family type</td>
							<td>:</td>
							<td>
								<select name="family_type">
									<?php
										foreach ($familyTypeList as $familyType) {
											if (isset($loggedUser['family'])) {
												if ($familyType['id']==$loggedUser['family']['type']) {
													echo "<option value=".$familyType['id']." selected > ".$familyType['type']."</option>";
												}else{
													echo "<option value=".$familyType['id']." > ".$familyType['type']."</option>";
												}
											}
											else{
												echo "<option value=".$familyType['id']." > ".$familyType['type']."</option>";
											}
										}
									?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Father's name</td>
							<td>:</td>
							<td>
								<input type="text" name="father_name" value=
									<?php
				          				if (isset($loggedUser['family']['father_name'])) {
											echo $loggedUser['family']['father_name'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Father's Occupation</td>
							<td>:</td>
							<td>
								<input type="text" name="father_occupation" value=
									<?php
				          				if (isset($loggedUser['family']['father_occupation'])) {
											echo $loggedUser['family']['father_occupation'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Father's Annual income</td>
							<td>:</td>
							<td>
								<input type="number" name="father_income" value=
									<?php
				          				if (isset($loggedUser['family']['father_income'])) {
											echo $loggedUser['family']['father_income'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Mother's name</td>
							<td>:</td>
							<td>
								<input type="text" name="mother_name" value=
									<?php
				          				if (isset($loggedUser['family']['mother_name'])) {
											echo $loggedUser['family']['mother_name'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Mother's Occupation</td>
							<td>:</td>
							<td>
								<input type="text" name="mother_occupation" value=
									<?php
				          				if (isset($loggedUser['family']['mother_occupation'])) {
											echo $loggedUser['family']['mother_occupation'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Mother's annual income</td>
							<td>:</td>
							<td>
								<input type="number" name="mother_income" value=
									<?php
				          				if (isset($loggedUser['family']['mother_income'])) {
											echo $loggedUser['family']['mother_income'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td>
								<input type="text" name="contact" value=
									<?php
				          				if (isset($loggedUser['family']['contact'])) {
											echo $loggedUser['family']['contact'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Siblings</td>
							<td>:</td>
							<td>
								<input type="number" name="siblings" value=
									<?php
				          				if (isset($loggedUser['family']['siblings'])) {
											echo $loggedUser['family']['siblings'];
										}
									?>
								>
							</td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" value="Update">
					<input type="reset">
				</form>
			</fieldset>
			<?php
				if (isset($errorMsg)) {
					echo $errorMsg;
				}
			?>
		</td>
    </tr>
    <tr>
    	<td></td>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

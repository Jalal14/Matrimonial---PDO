<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<fieldset>
        		<legend>UPDATE POLICE STATION</legend>
	        	<form method="POST">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Police station name</td>
							<td>:</td>
                            <td><input type='text' name='name' value="<?=$policeStation['name'];?>"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>District</td>
							<td>:</td>
							<td>
								<select name="district">
									<?php
										foreach ($districtList as $district) {
											if ($district['id'] == $policeStation['district']) {
												echo "<option value=".$district['id']." selected>".$district['name']."</option>";
											}else{
												echo "<option value=".$district['id'].">".$district['name']."</option>";
											}
										}
									?>
								</select>
							</td>
						</tr>
					</table>
					<input type="submit" value="UPDATE"><br><br>
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
<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<fieldset>
        		<legend>UPDATE DISTRICT</legend>
	        	<form method="POST">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>District name</td>
							<td>:</td>
                            <td><input type='text' name='name' value="<?=$district['name'];?>"></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Division</td>
							<td>:</td>
							<td>
								<select name="division">
									<?php
										foreach ($divisionList as $division) {
											if ($division['id'] == $district['division']) {
												echo "<option value=".$division['id']." selected>".$division['name']."</option>";
											}else{
												echo "<option value=".$division['id'].">".$division['name']."</option>";
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
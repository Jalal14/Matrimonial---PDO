<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<fieldset>
        		<legend>ADD DIVISION</legend>
	        	<form method="POST">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>Division name</td>
							<td>:</td>
		          			<td><input type="text" name="name"></td>
						</tr>
					</table>
					<input type="submit" value="Add"><br><br>
					<?php
						if (isset($errorMsg)) {
							echo $errorMsg;
						}
					?>
				</form>
			</fieldset>
			<fieldset>
        		<legend>UPDATE DISTRICT</legend>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<?php
							foreach ($divisionList as $division) {
								echo "<tr>";
								echo "<td>".$division['name']."</td><td><td>";
								echo "<td><a href='".APP_ROOT."/?admin_update-division&".$division['id']."'>Update</a></td>";
								echo "</tr>";
							}
						?>
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
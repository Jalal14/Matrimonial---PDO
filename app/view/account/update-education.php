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
					<legend>EDUCATIONAL INFORMATION</legend>
					<table cellpadding="0" cellspacing="5">
						<tr>
							<td>Degree</td>
							<td>:</td>
							<td>
								<select name='degree'>
									<?php
										foreach ($degreeList as $degree) {
											if (isset($loggedUser['education']['degree'])) {
												if ($degree['id']==$loggedUser['education']['degree']) {
													echo "<option value=".$degree['id']."  selected> ".$degree['degree']."</option>";
												}else{
													echo "<option value=".$degree['id']." > ".$degree['degree']."</option>";
												}
											}
											else{
												echo "<option value=".$degree['id']." > ".$degree['degree']."</option>";
											}
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Field</td>
							<td>:</td>
							<td><input type="text" name="field" value=
									<?php
										if (isset($loggedUser['education']['field'])) {
											echo $loggedUser['education']['field'];
										}
									?>>
							</td>
						</tr>
						<tr>
							<td>Institute</td>
							<td>:</td>
							<td>
								<input type="text" name="institution" value=
								<?php
									if (isset($loggedUser['education']['institution'])) {
										echo $loggedUser['education']['institution'];
									}
								?>>
							</td>
						</tr>
						<tr>
							<td>Passing year</td>
							<td>:</td>
							<td>
								<input type="date" name="passing_year" value=
								<?php
									if (isset($loggedUser['education']['passing_year'])) {
										echo $loggedUser['education']['passing_year'];
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

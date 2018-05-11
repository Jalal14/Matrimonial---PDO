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
				<fieldset>
					<legend>PRESENT ADDRESS</legend>
					<table cellpadding="0" cellspacing="0">
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Present address</td>
							<td>:</td>
							<td>
								House: <input type="text" name="pr_house" value=
								<?php
									if (isset($loggedUser['pr_address']['pr_house'])) {
										echo $loggedUser["pr_address"]['pr_house'];
									}
								?>><br><br>
								Road: <input type="text" name="pr_road" value=
									<?php
										if (isset($loggedUser['pr_address']['pr_road'])) {
											echo $loggedUser['pr_address']['pr_road']; 
										}
									?>><br><br>
								Area: <input type="textarea" name="pr_area" value=
									<?php
										if (isset($loggedUser['pr_address']['pr_area'])) {
											echo $loggedUser['pr_address']['pr_area'];
										}
									?>><br><br>
								Police station: 
								<select name='pr_police_station'>
									<?php
										if (!isset($loggedUser['pr_address']['pr_police_station'])) {
											echo "<option value= null>-</option>";
										}
										foreach ($policeStationList as $policeStation) {
											if (isset($loggedUser['pr_address']['police_station_id'])) {
												if ($policeStation['id']==$loggedUser['pr_address']['police_station_id']) {
													echo "<option value=".$policeStation['id']." selected> ".$policeStation['name']."</option>";
												}else{
													echo "<option value=".$policeStation['id']."> ".$policeStation['name']."</option>";
												}
											}
											else{
												echo "<option value=".$policeStation['id']."> ".$policeStation['name']."</option>";
											}
										}
									?>
								</select><br><br>
								District: 
								<select name='pr_district'>
									<?php
										if (!isset($loggedUser['pr_address']['district_id'])) {
											echo "<option value= null>-</option>";
										}
										foreach ($districtList as $district) {
											if (isset($loggedUser['pr_address']['district_id'])) {
												if ($district['id']==$loggedUser['pr_address']['district_id']) {
													echo "<option value=".$district['id']." selected> ".$district['name']."</option>";
												}else{
													echo "<option value=".$district['id']."> ".$district['name']."</option>";
												}
											}
											else{
												echo "<option value=".$district['id']."> ".$district['name']."</option>";
											}
										}
									?>
								</select><br><br>
								Division:
								<select name='pr_division'>
									<?php
										if (!isset($loggedUser['pr_address']['division_id'])) {
											echo "<option value= null>-</option>";
										}
										foreach ($divisionList as $division) {
											if (isset($loggedUser['pr_address']['division_id'])) {
												if ($district['id']==$loggedUser['pr_address']['division_id']) {
													echo "<option value=".$division['id']." selected> ".$division['name']."</option>";
												}else{
													echo "<option value=".$division['id']."> ".$division['name']."</option>";
												}
											}
											else{
												echo "<option value=".$division['id']."> ".$division['name']."</option>";
											}
										}
									?>
								</select><br><br>
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

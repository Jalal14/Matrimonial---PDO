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
					<td>Name</td>
					<td>:</td>
					<td>
						<?php
							if (isset($loggedUser['fname'])) {
								echo $loggedUser['fname']." ";
							}
							if (isset($loggedUser['mname'])) {
								echo $loggedUser['mname']." ";
							}
							if (isset($loggedUser['lname'])) {
								echo $loggedUser['lname'];
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
						if (isset($loggedUser['age'])) {
							echo $loggedUser['age'];
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
							if (isset($loggedUser['gender_name'])) {
								echo $loggedUser['gender_name'];
							}
						?>
					</td>
				</tr>
				<tr><td colspan="3"><hr/></td></tr>
				<tr>
					<td>Religion</td>
					<td>:</td>
					<td>
						<?php
							if (isset($loggedUser['religion']['name'])) {
								echo $loggedUser['religion']['name'];
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
					<tr>
						<td>Height</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['height'])) {
									echo $loggedUser['height'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Weight</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['weight'])) {
									echo $loggedUser['weight']." Kg";
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Blood group</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['blood']['bgroup'])) {
									echo $loggedUser['blood']['bgroup'];
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
								if (isset($loggedUser['email'])) {
									echo $loggedUser['email'];
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
								if (isset($loggedUser['number1'])) {
									echo $loggedUser['number1'];
								}
					 		?>
					 		<br>
					 		<?php
								if (isset($loggedUser['number2'])) {
									echo $loggedUser['number2'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Complexion</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['complexion']['type'])) {
									echo $loggedUser['complexion']['type'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Marital status</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['marital_status']['status'])) {
									echo $loggedUser['marital_status']['status'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Children</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['children'])) {
									echo $loggedUser['children'];
								}
					 		?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Permanent address</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['per_address'])) {
									echo "House: ". $loggedUser['per_address']['per_house'].", Road: ".$loggedUser['per_address']['per_road'].", ".$loggedUser['per_address']['police_station_name'].", ".$loggedUser['per_address']['district_name'].", ".$loggedUser['per_address']['division_name'];
								}
							?>	
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Present address</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['pr_address'])) {
									echo "House: ". $loggedUser['pr_address']['pr_house'].", Road: ".$loggedUser['pr_address']['pr_road'].", Area: ".$loggedUser['pr_address']['pr_area'].", ".$loggedUser['pr_address']['police_station_name'].", ".$loggedUser['pr_address']['district_name'].", ".$loggedUser['pr_address']['division_name'];
								}
							?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Occupation</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['job']['designation'])) {
									echo $loggedUser['job']['designation']." at ";
								}
								if (isset($loggedUser['job']['company'])) {
									echo $loggedUser['job']['company'];
								}
							?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Annual income</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['annual_income']) && $loggedUser['annual_income'] != 0) {
									 echo $loggedUser['annual_income']; 
								}
							?>
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Education</td>
						<td>:</td>
						<td>
							<?php
								if (isset($loggedUser['education']['field']) && $loggedUser['education']['field'] != '') {
									echo $loggedUser['education']['field']." from ";
								}
								if (isset($loggedUser['education']['institution']) && $loggedUser['education']['institution'] != '') {
									echo $loggedUser['education']['institution']." in ";
								}
								if (isset($loggedUser['education']['passing_year']) && $loggedUser['education']['passing_year'] != '') {
									echo $loggedUser['education']['passing_year'];
								}
							?>	
						</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
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

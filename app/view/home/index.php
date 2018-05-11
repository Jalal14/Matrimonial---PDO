<table width="60%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td valign="middle" height="70">
			<table width="100%">
				<tr>
					<td>
						<a href=<?php echo APP_ROOT; ?>>
							<img height="48" src=<?= APP_ROOT."/asset/defaultpic/ring.png"; ?>>
						</a>
					</td>
					<td align="right">
						<a href=<?= APP_ROOT; ?>>Home</a>&nbsp;|
						<a href=<?= APP_ROOT."/?account_login"; ?>>Login</a>&nbsp;|
						<a href=<?= APP_ROOT."/?account_registration"; ?>>Registration</a>
					</td>
				</tr>
			</table>
        </td>
    </tr>
    <tr>
        <td>
          <fieldset>
				<legend><b>Search</b></legend>
				<form method="POST">
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Age:</td>
							<td>Min <input type="number" name="minAge"> &nbsp;Max: <input type="number" name="maxAge"></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Height:</td>
							<td>Min <input type="text" name="minHeight"> &nbsp;Max: <input type="text" name="maxHeight"></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Religion:</td>
                            <td>
                                <select name="religion">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($religionList as $religion) {
                                        echo "<option value=".$religion['id']."> ".$religion['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <?php
                                    foreach ($genderList as $gender) {
                                        echo "<input type='radio' name=gender value=".$gender['id'].">".$gender['gender'];
                                    }
                                ?>
                            </td>
                        </tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Search"></td>
						</tr>
					</table>

				</form>
			</fieldset>
			<?php
            if (isset($suggestUserList)) {
                foreach ($suggestUserList as $suggestUser) { ?>
                    <fieldset>
                        <legend><b>PROFILE</b></legend>
                        <br/>
                        <table cellpadding="0" cellspacing="0">
                    
                            <tr>
                                <td rowspan="7">
                                    <img width="128" src="<?= APP_ROOT."/asset/".$suggestUser['propic'];?>">
                                </td>
                                <td>Name</td>
                                <td>:</td>
                                <td> <?php echo $suggestUser['fname']." ".$suggestUser['mname']." ".$suggestUser['lname']; ?> </td>
                                <tr><td colspan="3"><hr/></td></tr>
                                <tr>
                                    <td>Age</td>
                                    <td>:</td>
                                    <td><?php echo $suggestUser['age'];?> </td>
                                </tr>
                                <tr><td colspan="3"><hr/></td></tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>:</td>
                                    <td><?php echo $suggestUser['gender_name'];?> </td>
                                </tr>
                                <tr><td colspan="3"><hr/></td></tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>:</td>
                                    <td><?php echo $suggestUser['religion_name'];?> </td>
                                </tr>
                            </tr>
                        <tr>
                            <td></td>
                            <td><a href=
                                <?php
                                    echo APP_ROOT."/?account_login";
                                ?>
                                >View details</a></td>
                        </tr>
                    </table>
                </fieldset>
            <?php }}
            else{
                echo "User not found for searched criteria.";
            }
            ?>
		</td>
    </tr>
    <tr>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

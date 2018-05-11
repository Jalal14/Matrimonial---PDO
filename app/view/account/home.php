<table width="60%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
		<?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <td>
			<fieldset>
				<legend><b>Search</b></legend>
				<form>
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
							<td>Rwligion:</td>
							<td>
								<select>
									<option>Muslim</option>
									<option>Hindu</option>
									<option>Christian</option>
									<option>Buddha</option>
								</select>
							</td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Gender:</td>
							<td>
								<input type="radio" name="gender">Male
								<input type="radio" name="gender">Female
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
			<fieldset>
			    <legend><b>PROFILE</b></legend>
				<form>
					<br/>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td rowspan="7">
								<img width="128" src="user.png"/>
							</td>
							<td>Name</td>
							<td>:</td>
							<td>Bob</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td>23</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>Male</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>Christian</td>
						</tr>
						<tr>
							<td></td>
							<td><a href="login.html">View details</a></td>
						</tr>
					</table>
				</form>
			</fieldset>
			<fieldset>
			    <legend><b>PROFILE</b></legend>
				<form>
					<br/>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td rowspan="7">
								<img width="128" src="user.png"/>
							</td>
							<td>Name</td>
							<td>:</td>
							<td>Bob</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td>23</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>Male</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td>Christian</td>
						</tr>
						<tr>
							<td></td>
							<td><a href="login.html">View details</a></td>
						</tr>
					</table>
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

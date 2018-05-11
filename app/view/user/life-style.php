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
			    <legend><b>Life style</b></legend>
				<form method="POST">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Hobby</td>
							<td>:</td>
							<td>
								<?php
									foreach ($hobbyList as $hobby) {
										$match=false;
										if (isset($loggedUser['hobbies'])) {
											foreach ($loggedUser['hobbies'] as $userHobby) {
												if ($userHobby['hobby']==$hobby['id']) {
													$match=true;
												}
											}
										}
										if ($match) {
											echo "<input type='checkbox' name='hobbyList[]' value=".$hobby['id']." checked>".$hobby['name']."<br>";
										}else{
											echo "<input type='checkbox' name='hobbyList[]' value=".$hobby['id'].">".$hobby['name']."<br>";
										}
									}
								?>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Interest</td>
							<td>:</td>
							<td>
								<?php
									foreach ($interestList as $interest) {
										$match=false;
										if (isset($loggedUser['interests'])) {
											foreach ($loggedUser['interests'] as $userInterest) {
												if ($userInterest['interest']==$interest['id']) {
													$match=true;
												}
											}
										}
										if ($match) {
											echo "<input type='checkbox' name='interestList[]' value=".$interest['id']." checked>".$interest['name']."<br>";
										}else{
											echo "<input type='checkbox' name='interestList[]' value=".$interest['id'].">".$interest['name']."<br>";
										}
									}
								?>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Music</td>
							<td>:</td>
							<td>
								<?php
									foreach ($musicList as $music) {
										$match=false;
										if (isset($loggedUser['musics'])) {
											foreach ($loggedUser['musics'] as $userMusic) {
												if ($userMusic['music']==$music['id']) {
													$match=true;
												}
											}
										}
										if ($match) {
											echo "<input type='checkbox' name='musicList[]' value=".$music['id']." checked>".$music['name']."<br>";
										}else{
											echo "<input type='checkbox' name='musicList[]' value=".$music['id'].">".$music['name']."<br>";
										}
									}
								?>
							</td>
							<td></td>
						</tr>
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Sports</td>
							<td>:</td>
							<td>
								<?php
									foreach ($sportList as $sport) {
										$match=false;
										if (isset($loggedUser['sports'])) {
											foreach ($loggedUser['sports'] as $userSport) {
												if ($userSport['sport']==$sport['id']) {
													$match=true;
												}
											}
										}
										if ($match) {
											echo "<input type='checkbox' name='sportList[]' value=".$sport['id']." checked>".$sport['name']."<br>";
										}else{
											echo "<input type='checkbox' name='sportList[]' value=".$sport['id'].">".$sport['name']."<br>";
										}
									}
								?>
							</td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" value="Save">
				</form>
				<?php echo $errorMsg; ?>
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

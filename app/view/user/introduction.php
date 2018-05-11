<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
			<fieldset>
			    <legend><b>Personal information</b></legend>
				<form>
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Introduction</td>
							<td>:</td>
							<td><textarea name="intro"></textarea></td>
						</tr>
					</table>
					<hr/>
					<a href="personal-info.html"><input type="button" value="previous"></a>
					<input type="reset">
					<a href="education.html"><input type="button" value="Next"></a>
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

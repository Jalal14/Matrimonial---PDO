<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
			<fieldset>
			    <legend><b>PROFILE PICTURE</b></legend>
			    <form>
			        <table>
			            <tr>
			                <td>User Name</td>
							<td>:</td>
			                <td><input type="text"></td>
			            </tr>
			            <tr>
			                <td>Picture</td>
							<td>:</td>
			                <td><input type="file"></td>
			            </tr>
			        </table>
			        <hr />
			        <input type="submit" value="Submit">
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

<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
          <fieldset>
            <legend>UPDATE HOBBY</legend>
            <form method="POST">
              <table cellpadding="0" cellspacing="0">
                <tr>
                  <td>Hobby name</td>
                  <td>:</td>
                    <td><input type='text' name='name' value="<?=$hobby['name'];?>"></td>
                </tr>
              </table>
              <input type="submit" value="UPDATE"><br><br>
            </form>
            <?php
              if (isset($errorMsg)) {
                echo $errorMsg;
              }
            ?>
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
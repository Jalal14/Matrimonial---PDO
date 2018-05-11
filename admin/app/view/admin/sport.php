<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
          <fieldset>
            <legend>ADD SPORT</legend>
            <form method="POST">
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td>Sport name</td>
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
            <legend>UPDATE SPORT</legend>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <?php
              foreach ($sportList as $sport) {
                echo "<tr>
                <td>".$sport['name']."</td><td><td>
                <td><a href='".APP_ROOT."/?admin_update-sport&".$sport['id']."'>Update</a></td>
                </tr>";
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
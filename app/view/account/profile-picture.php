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
                <legend><b>PROFILE PICTURE</b></legend>
                <form method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Picture</td>
                            <td>:</td>
                            <td><input type="file" name="propic"></td>
                        </tr>
                    </table>
                    <hr />
                    <input type="submit" value="Submit">
                </form>
                <?php if (isset($errorMsg)) {
                  echo $errorMsg;
                } ?>
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

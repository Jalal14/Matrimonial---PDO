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
            <fieldset>
                <legend><b>CHANGE PASSWORD</b></legend>
                <form method="POST">
                    <table>
                        <tr>
                            <td><font size="3">Current Password</font></td>
                            <td>:</td>
                            <td><input type="password" name="oldPass" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><font size="3" color="green">New Password</font></td>
                            <td>:</td>
                            <td><input type="password" name="newPass1" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><font size="3" color="red">Retype New Password</font></td>
                            <td>:</td>
                            <td><input type="password" name="newPass2" /></td>
                            <td></td>
                        </tr>
                    </table>
                    <hr />
                    <input type="submit" value="Submit" />
                    <br/>
                    <?php 
                    if (isset($errorMsg)) {
                        echo $errorMsg;
                    }
                     ?>
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

<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
			<fieldset>
                <legend><b>User info</b></legend>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Total user</td>
                        <td>:</td>
                        <td>
                            <?php
                                if (isset($numOfUser)) {
                                    echo $numOfUser;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr><td colspan="3"><hr/></td></tr>
                    <tr>
                        <td>Active user</td>
                        <td>:</td>
                        <td>
                            <?php
                                if (isset($numOfActiveUser)) {
                                    echo $numOfActiveUser;
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
		</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

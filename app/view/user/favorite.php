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
            <?php
            if (isset($favoriteList)) {
                foreach ($favoriteList as $favorite) {?>
                    <fieldset>
                        <legend><b>PROFILE</b></legend>
                        <br/>
                        <form method="POST">
                            <input type="hidden" name="friendId" value=<?= $favorite['uid']; ?>>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td rowspan="7">
                                        <img width="128" style="padding: 20px;" src=<?= APP_ROOT."/asset/".$favorite['propic']; ?>>
                                    </td>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td> <?php echo $favorite['fname']." ".$favorite['mname']." ".$favorite['lname']; ?> </td>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>:</td>
                                        <td><?= $favorite['age'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?= $favorite['gender_name'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><?= $favorite['religion_name'];?> </td>
                                    </tr>
                                </tr>
                                <tr>
                                <td></td>
                                <td><a href="<?= APP_ROOT."/?user_public-profile&".$favorite['uid']; ?>">View details</a></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="removeFavorite" value="Remove favorite"></td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
            <?php }}
                if (isset($errorMsg)) {
                    echo $errorMsg;
                }
             ?>
		</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

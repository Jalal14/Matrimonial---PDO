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
            if (isset($friendList)) {
                foreach ($friendList as $friend) {?>
                    <form method="POST">
                        <fieldset>
                            <legend><b>PROFILE</b></legend>
                            <br/>
                            <input type="hidden" name="friendId" value=<?= $friend['uid'];?>>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td rowspan="7">
                                        <img width="128" style="padding: 20px;" src=<?= APP_ROOT."/asset/".$friend['propic'];?>>
                                    </td>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td> <?= $friend['fname']." ".$friend['mname']." ".$friend['lname']; ?> </td>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>:</td>
                                        <td><?= $friend['age'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?= $friend['gender_name'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><?= $friend['religion_name'];?> </td>
                                    </tr>
                                </tr>
                                <tr><td colspan="3"><br/></td></tr>
                                <tr>
                                <td></td>
                                <td><a href=<?= APP_ROOT."/?user_public-profile&".$friend['uid'];?>>View details</a></td>
                                    <?php
                                        if (isset($unseen)) {
                                            foreach ($unseen as $message) {
                                                if ($message['sender']==$friend['uid']) {
                                                    echo $message['number']." new message";
                                                }
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="unFriend" value="Unfriend"></td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
            <?php }}
            else{
                if (isset($errorMsg)) {
                    echo $errorMsg;
                }
             }?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

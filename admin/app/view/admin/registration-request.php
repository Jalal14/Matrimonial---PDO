<?php
    $loggedAdmin = $_SESSION['loggedAdmin'];
?>
<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
            <?php
            if (isset($userReqList)) {
                foreach ($userReqList as $userReq) {?>
                    <form method="POST">
                        <fieldset>
                            <legend><b>PROFILE</b></legend>
                            <br/>
                            <input type="hidden" name="userId" value=
                                <?php
                                    echo $userReq['uid'];
                                ?>
                            >
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td> <?php echo $userReq['fname']." ".$userReq['mname']." ".$userReq['lname']; ?> </td>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>:</td>
                                        <td><?php echo $userReq['age'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?php echo $userReq['gender_name'];?> </td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><?php echo $userReq['religion_name'];?> </td>
                                    </tr>
                                </tr>
                                <tr><td colspan="3"><br/></td></tr>
                                <tr>
                                    <td></td>
                                    <td><a href=
                                        <?php
                                            echo APP_ROOT."/?admin_public-profile&".$userReq['uid'];
                                        ?>
                                        >View details</a></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="accept" value="Accept request"></td>
                                    <td><input type="submit" name="reject" value="Reject request"></td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
            <?php }}
            if (isset($errorMsg)) {
                echo $errorMsg;
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

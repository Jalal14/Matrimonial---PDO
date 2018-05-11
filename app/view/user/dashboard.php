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
                <legend><b>Search</b></legend>
                <form method="POST">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Age:</td>
                            <td>Min <input type="number" name="minAge"> </td>
                            <td>&nbsp;</td>
                            <td>Max: <input type="number" name="maxAge"></td>
                        </tr>
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Height:</td>
                            <td>Min <input type="text" name="minHeight"></td>
                            <td>&nbsp;</td>
                            <td>Max: <input type="text" name="maxHeight"></td>
                        </tr>
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Religion:</td>
                            <td>
                                <select name="religion">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($religionList as $religion) {
                                        echo "<option value=".$religion['id']."> ".$religion['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <?php
                                    foreach ($genderList as $gender) {
                                        echo "<input type='radio' name=gender value=".$gender['id'].">".$gender['gender'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Search"></td>
                        </tr>
                    </table>

                </form>
            </fieldset>
            <?php
            if (isset($preSearchedList)) { ?>
                <fieldset>
                <legend><b>YOUR BEST MATCHES</b></legend>
                <?php foreach ($preSearchedList as $preSearched) {
                    if ($preSearched['uid'] != $loggedUser['uid']) {?>
                            <br/>
                            <fieldset style="background-color: lightgray; border-radius: 5px;">
                            <legend><h2><?php echo $preSearched['fname']; ?></h2></legend>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td rowspan="7" style="margin: 5px;">
                                        <a href= <?php echo APP_ROOT."/?user_public-profile&".$preSearched['uid']; ?>>
                                            <img width="128"  style="padding: 20px; border: 1px solid gray; border-radius: 10px; margin-right: 30px;" src="<?= APP_ROOT."/asset/".$preSearched['propic']; ?>">
                                    </a>
                                    </td>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><b><?= $preSearched['fname']." ".$preSearched['mname']." ".$preSearched['lname']; ?></b></td>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>:</td>
                                        <td><b><?= $preSearched['age'];?></b></td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><b><?= $preSearched['gender_name'];?></b></td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><b><?= $preSearched['religion_name'];?></b></td>
                                    </tr>
                                </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?= APP_ROOT."/?user_public-profile&".$preSearched['uid']; ?>">View details</a></td>
                            </tr>
                        </table>
                    </fieldset>
            <?php }} ?>
            </fieldset>
            <?php } ?>
            <fieldset>
            <legend><h3>YOU MAY LOOKING FOR</h3></legend>
            <?php
            if (isset($suggestUserList)) {
                foreach ($suggestUserList as $suggestUser) {
                    if ($suggestUser['uid'] != $loggedUser['uid']) {?>
                        <fieldset style="background-color: lightgray; border-radius: 5px;">
                            <legend><h2><?= $suggestUser['fname']; ?></h2></legend>
                            <br/>
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td rowspan="7">
                                        <a href= <?php echo APP_ROOT."/?user_public-profile&".$suggestUser['uid']; ?>>
                                        <img width="128" style="padding: 20px; border: 1px solid gray; border-radius: 10px; margin-right: 30px;" src="<?= APP_ROOT."/asset/".$suggestUser['propic']; ?>"></a>
                                    </td>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><b><?= $suggestUser['fname']." ".$suggestUser['mname']." ".$suggestUser['lname']; ?></b></td>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>:</td>
                                        <td><b><?= $suggestUser['age'];?></b></td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><b><?= $suggestUser['gender_name'];?></b></td>
                                    </tr>
                                    <tr><td colspan="3"><hr/></td></tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>:</td>
                                        <td><b><?= $suggestUser['religion_name'];?></b></td>
                                    </tr>
                                </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?= APP_ROOT."/?user_public-profile&".$suggestUser['uid']; ?>">View details</a></td>
                            </tr>
                        </table>
                    </fieldset>
            <?php }}}
            else{
                echo "User not found for searched criteria.";
             }?>
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

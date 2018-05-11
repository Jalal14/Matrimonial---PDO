<?php
	$loggedUser = $_SESSION['loggedUser'];
?>
<script type="text/javascript" src=<?php echo APP_ROOT."/asset/js/jquery-3.2.1.js"; ?>></script>
<script type="text/javascript" src=<?php echo APP_ROOT."/asset/js/chat.js"; ?>></script>
<link rel="stylesheet" type="text/css" href=<?= APP_ROOT."/asset/css/stylesheet.css"; ?>>
<table width="65%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\top-panel.php"; ?>
    </tr>
    <tr>
        <?php require_once SERVER_ROOT."\\app\\view\\left-panel.php"; ?>
        <td valign="top">
        	<form method="POST">
	        	<fieldset>
	        		<legend>Personal information</legend>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<input type="hidden" name="friendId" id="friendId" value=<?php echo $searchedUser['uid']; ?>>
							<input type="hidden" name="userId" id="userId" value=<?php echo $loggedUser['uid']; ?>>
							<td rowspan="7">
								<img width="128" style="padding: 20px;" src="<?= APP_ROOT."/asset/".$searchedUser['propic']; ?>"/>
							</td>
							<td>Name</td>
							<td>:</td>
							<td><?php 
								if (isset($searchedUser['fname'])) {
									echo $searchedUser['fname']." ";
								}
								if (isset($searchedUser['mname'])) {
									echo $searchedUser['mname']." ";
								}
								if (isset($searchedUser['lname'])) {
									echo $searchedUser['lname'];
								}
							 ?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Age</td>
							<td>:</td>
							<td><?php
								if (isset($searchedUser['age'])) {
									echo $searchedUser['age'];
								}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td><?php
								if (isset($searchedUser['gender_name'])) {
									echo $searchedUser['gender_name'];
								}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Blood</td>
							<td>:</td>
							<td><?php 
							if (isset($searchedUser['bgroup'])) {
								echo $searchedUser['bgroup'];
							}?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Religion</td>
							<td>:</td>
							<td><?php 
							if (isset($searchedUser['religion_name'])) {
							 	echo $searchedUser['religion_name'];
							 } ?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Height</td>
							<td>:</td>
							<td><?php 
							if (isset($searchedUser['height'])) {
								echo $searchedUser['height'];
							}
							 ?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Weight</td>
							<td>:</td>
							<td><?php
							if (isset($searchedUser['weight'])) {
								echo $searchedUser['weight'];
							}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Complexion</td>
							<td>:</td>
							<td><?php
							if (isset($searchedUser['complexion_name'])) {
								echo $searchedUser['complexion_name'];
							}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Marital status</td>
							<td>:</td>
							<td><?php
							if (isset($searchedUser['marital_status'])) {
								echo $searchedUser['marital_status'];
							}
							if (isset($searchedUser['marital_status_name'])) {
								echo $searchedUser['marital_status_name'];
							}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Children</td>
							<td>:</td>
							<td><?php
							if (isset($searchedUser['children'])) {
								echo $searchedUser['children'];
							}
							?></td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Bio</td>
							<td>:</td>
							<td><?php
							if (isset($searchedUser['bio'])) {
								echo $searchedUser['bio'];
							}
							?></td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<legend>Additional information</legend>
					<table cellpadding="0" cellspacing="0">
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Occupation</td>
							<td>:</td>
							<td>
							<?php
							if (isset($searchedUser['designation'])) {
								echo $searchedUser['designation'];
							}
							if (isset($searchedUser['company'])) {
								echo ' at '.$searchedUser['company'];
							}
							?>
							</td>
						</tr>
						<tr><td colspan="3"><hr/></td></tr>
						<tr>
							<td>Education</td>
							<td>:</td>
							<td>
							<?php 
							if (isset($searchedUser['field']) && $searchedUser['field'] != '') {
								echo $searchedUser['field'];
							}
							if (isset($searchedUser['institution']) && $searchedUser['institution'] != '') {
								echo ' from '.$searchedUser['institution'];
							}
							?></td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</table>
				</fieldset>
				<?php
					if (isset($isFriend) && $isFriend){
						echo "<input type='submit' name='unFriend' value='Unfriend'>";
					}else if (isset($wantFriend) && $wantFriend) {
						echo "<input type='submit' name='accept' value='Accept friend request'> &nbsp;";
						echo "<input type='submit' name='reject' value='Reject friend request'> &nbsp;";
						if (isset($isFavorite) && $isFavorite){
							echo "<input type='submit' name='removeFavorite' value='Remove favorite'> &nbsp;";
						}else{
							echo "<input type='submit' name='addFavorite' value='Add to favorite'> &nbsp;";
						}
					}
					else if (isset($isReqSent) && $isReqSent) {
						echo "<input type='submit' name='cancelReq' value='Cancel friend request'> &nbsp;";
						if (isset($isFavorite) && $isFavorite){
							echo "<input type='submit' name='removeFavorite' value='Remove favorite'> &nbsp;";
						}else{
							echo "<input type='submit' name='addFavorite' value='Add to favorite'> &nbsp;";
						}
					}
					else{
						echo "<input type='submit' name='addFriend' value='Add friend'> &nbsp;";
						if (isset($isFavorite) && $isFavorite){
							echo "<input type='submit' name='removeFavorite' value='Remove favorite'> &nbsp;";
						}else{
							echo "<input type='submit' name='addFavorite' value='Add to favorite'> &nbsp;";
						}
					}
				?>
			</form>
			<?php
				echo $errorMsg;
			?>
		</td>
        <?php if (isset($isFriend) && $isFriend){ ?>
            <td valign="top">
                <div id="conversation">
                    <?php
                    $userImage = APP_ROOT."/asset/".$_SESSION['loggedUser']['propic'];
                    if (isset($isFriend) && $isFriend) { ?>
                            <div id="message-body">
                                <?php
                                if (isset($messages)) {
                                    foreach ($messages as $message) {
                                        if ($message['message']!=null) {
                                            if ($message['sender']==$_SESSION['loggedUser']['uid']) {
                                                echo "<span style='float:right'><b><img style='height :20px; width :20px; border-radius: 20px;' src='$userImage'></b></span>";
                                                echo "<span style='float:right'>".$message['message']."&nbsp;</span><br><br>";
                                            }else{
                                                echo "<span style='float:left'><b><img style='height :20px; width :20px; border-radius: 20px;' src=".APP_ROOT."/asset/".$searchedUser['propic']."></b></span>";
                                                echo "<span style='float:left'>&nbsp;".$message['message']."</span><br><br>";
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <hr>
                    <?php } ?>
                </div>
            </td>
        <?php } ?>
    </tr>
    <tr>
        <td></td>
        <td align="center">
            Copyright &copy; 2017
        </td>
        <?php if (isset($isFriend) && $isFriend){ ?>
        <td>
            <form method="POST" id="text-area">
                <input style="width: 100%" type="text" name="message" id="message"><br>
                <input style="float: right;" type="submit" name="send" value="Send" id="send-button">
            </form>
        </td>
        <?php } ?>
    </tr>
</table>
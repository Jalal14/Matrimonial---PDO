<td colspan="3" valign="middle" height="100">
	<table width="100%">
    <tr>
      <td>
          <a href=<?php echo APP_ROOT."/?user_dashboard";?>>
              <img height="80" style="border-radius: 40px" src="<?= APP_ROOT."/asset/".$loggedUser['propic']; ?>">
          </a>
      </td>
        <td align="right"><a href=<?php echo APP_ROOT."/?user_friend-list";?>><b>
          <?php if (isset($unseen)) {
            echo sizeof($unseen);
          }else{
            echo "0";
          }
        ?> new message</b></a> |
        <a href=<?php echo APP_ROOT."/?user_friend-request";?>><b>Request (
          <?php if (isset($request)) {
            echo $request;
          }else{
            echo "0";
          }
        ?>)</b></a> |
        <a href=<?php echo APP_ROOT."/?user_full-profile";?>>Profile</a>&nbsp;|
        <a href=<?php echo APP_ROOT."/?account_logout";?>>Logout</a>
      </td>
    </tr>
	</table>
</td>
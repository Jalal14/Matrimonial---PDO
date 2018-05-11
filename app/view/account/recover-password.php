<table width="60%" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
      <td valign="middle" height="70">
        <table width="100%">
          <tr>
            <td>
              <a href=<?php echo APP_ROOT."/"; ?>>
                <img height="48" src=<?= APP_ROOT."/asset/defaultpic/ring.png"; ?>>
              </a>
            </td>
            <td align="right">
              <a href=<?= APP_ROOT."/"; ?>>Home</a>&nbsp;|
              <a href=<?= APP_ROOT."/?account_login"; ?>>Login</a>&nbsp;|
              <a href=<?= APP_ROOT."/?account_registration";?>>Registration</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
        <td>
            <form method="post">
              <fieldset>
                  <legend><b>RECOVER PASSWORD</b></legend>
                  <form method="POST">
                      <table>
                          <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td><input type="text" name="email"></td>
                          </tr>
                          <tr>
                              <td>Date of birth</td>
                              <td>:</td>
                              <td><input type="date" name="dob"></td>
                          </tr>
                          <tr>
                              <td>Password</td>
                              <td>:</td>
                              <td><input type="password" name="password"></td>
                          </tr>
                          <tr>
                              <td>Retype password</td>
                              <td>:</td>
                              <td><input type="password" name="password2"></td>
                          </tr>
                      </table>
                      <hr />
                      <input name="remember" type="checkbox">Remember Me
                      <br/><br/>
                      <input type="submit" value="Submit"> <br/>
                      <?php
                        if(isset($errorMsg)){
                           echo $errorMsg;
                        }
                      ?>
                  </form>
              </fieldset>
            </form>
        </td>
    </tr>
    <tr>
        <td align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

          

            <div id="error-container">
              <h4>Login</h4>
              <p style="color:#fff">We're are happy to see you return! Please login to continue</p>
          <?=(isset($error))? "<p class='alert alert-error'>".$error."</p>": null;?>
            </div>

              <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="<?=base_url('main/login')?>">
               <div class="fields">
                <div class="control-group">
                    <div class="controls">
                          <div class="main_input_box">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" name="userlogin" id="userlogin" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="userauth" id="userauth" />
                        </div>
                    </div>
                </div>
               </div>
                <div class="btn-container">
                    <p class="remember"><input type="checkbox" name="rememberme" id="rememberme" /> Remember me on this computer</p>
                    <button type="submit" name="usersubmit" id="login-btn" class="button primary pull-left">Login</button>
                   <a href="<?=base_url('main/forgot')?>" class="pull-right" style="margin-top: 10px;color:#b1b1b1">Forgot Password?</a>
                    <br class="clear" />
                </div>
              <br class="clear" />
            </form>
       
        </div>

          <div class="forgot-password">
         
        </div>


           
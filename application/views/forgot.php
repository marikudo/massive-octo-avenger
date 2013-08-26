
            <div id="error-container">
            <h4>Forgot password</h4>
             <p style="color:#fff">Can't remember your password? Please enter your email to reset your password.</p>
          <?=(isset($error))? "<p class='alert alert-error'>".$error."</p>": null;?>
            </div>

               <div id="loginbox">            
		            <form id="loginform" class="form-vertical" method="POST" action="<?=base_url('main/forgot')?>">
		               <div class="fields">
					   <div class="control-group">
		                    <div class="controls">
		                        <div class="main_input_box">
		                            <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="Email" name="userlogin" id="userlogin" />
		                        </div>
		                    </div>
		                </div>
		         
		               </div>
						<div class="btn-container" style="margin: 5px 0px 15px 0px;">
								<button type="submit" name="forgot" class="button primary">Reset</button>
								<a href="<?=base_url('main/login')?>" class="button" >Cancel</a>
						</div>
		            
		            </form>
				</div>
				
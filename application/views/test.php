

<!Doctype html>
<html lang="eng">
<head>
<link href="<?=base_url('public');?>/css/normalize.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/google-datepicker.css" rel="stylesheet">
<link href="<?=base_url('public');?>/css/default.css" rel="stylesheet">
<link href="<?=base_url('public');?>/js/prettify/prettify.css" rel="stylesheet">
<style type="text/css">
      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrapper {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -41px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 30px;
      }
      #footer {
        border-top:1px solid #f5f5f5;
		padding-top: 10px;
		text-align:center;
      }
#logo{margin: 0;
height: 13px;
text-indent: 41px;
background: url('http://localhost/octo/public/img/brand.png')no-repeat 1px -2px;
font: bold 10px 'arial';
padding-top: 27px;
color: rgb(124, 124, 124);
text-transform: uppercase;
margin-right: 15px;}
.clear{clear:both}
.login-user{font:bold 12px 'Arial'}

.nav-custom-top{height:35px;margin-bottom:0!important;margin-top:-7px}
.nav-custom-bar{
  background-color: #fafafa;
  background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2));
  background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -o-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
  *zoom: 1;
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
     -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
          box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
		  height: 38px;
}
</style>

<script src="<?=base_url('public');?>/js/jquery.js"></script>
<script type="text/javascript">
//jquery section
$(document).ready(function(){
	
});
</script>
</head>
<body>
<div id="wrapper">
 <div class="navbar nav-custom-top navbar-inverse" >
      <div class="navbar-inner" >
        <div class="container-fluid" style="padding:0">
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-left">
              <strong>IP Address: </strong><?=$_SERVER['REMOTE_ADDR']?>
				<strong style="margin-left:10px">Date and Time : </strong> September 1, 2013 12:00:00 PM
			  </p>
           
             <ul class="nav pull-right" role="navigation">
                    <li class="dropdown">
                      <a id="user-dropdown" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" style="background:none;padding-right:0;margin-right:0">Logged in as <strong><?=$info['email_address']?></strong> <i class="icon-cog icon-white"></i></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown" style="margin:-7px 0 0 !important">
                        <li><a href="<?=base_url('xadmin/account/information')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('xadmin/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
                    </li>
         
                  </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div id="header">
		<div class="custom-container nav-custom-bar">
			<div class="header">
				  <h2 id="logo" class="pull-left">Content Management System</h2>
					<ul class="nav nav-tabs pull-left" style="margin-top:12px;margin-bottom:0">
					  <li class="<?=(_controller()=='main')? 'active' : null?> right">
						<a href="<?=base_url('xadmin/main');?>"><i class="icon-home" style="margin-top:-1px"></i> Dashboard</a>
					  </li>
					  <li class="<?=(_controller()=='xadminsettings')? 'active' : null?>"><a href="#"><i class="icon-cog"></i> xadmin Settings</a></li>
					  <li class="<?=(_controller()=='others')? 'active' : null?>"><a href="#"><i class="icon-tasks"></i> Others</a></li>
					</ul>
				<br class="clear" />
			</div>
		</div>
	</div>
	
	
	 <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3" style="min-width:200px;max-width:225px">
          <div class="well sidebar-nav" style="border-radius: 0;padding: 0;background: none;border: 0;margin-top: 15px;box-shadow: none;">
            <ul class="nav nav-list left-nav" style="font: bold 12px 'arial';">
              <li class="nav-header">System Settings</li>
              <li><a href="#"><i class="custom-icon-small-users" style="margin-top: -3px;"></i> Users</a></li>
              <li><a href="#">Role</a></li>
              <li><a href="#">Link</a></li>
              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9" style="margin-left:10px;margin-right:0">
		
		
	

	

			</div>
		</div>
	</div>
	
	
	
	
<div id="push"></div>
</div>
<!--wrapper end//-->
    <div id="footer">
      <div class="container">
        <p class="muted credit">&copy; 2013 dev.station</p>
      </div>
    </div>

    <script src="<?=base_url('public');?>/js/bootstrap-transition.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-alert.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-modal.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-tab.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-popover.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-button.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-collapse.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-carousel.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_url('public');?>/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url('public');?>/js/prettify/prettify.js"></script>
    <script src="<?=base_url('public');?>/js/jmethods.js"></script>
    <script src="<?=base_url('public');?>/js/additional-methods.js"></script>
    <script src="<?=base_url('public');?>/js/jquery.alphanumeric.js"></script>
    <script src="<?=base_url('public');?>/js/jquery.form.js"></script>
    <script src="<?=base_url('public');?>/js/jquery.maskedinput-1.2.2.min.js"></script>
    <script src="<?=base_url('public');?>/js/jquery.validate.js"></script>

  </body>
</html>
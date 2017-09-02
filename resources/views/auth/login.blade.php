<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Área Administrativa</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
  <link href="{{url('/')}}/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
  <link href="{{url('/')}}/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{url('/')}}/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <!-- BEGIN LOGO -->
  <div class="logo">
    <!-- PUT YOUR LOGO HERE -->
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="form-vertical login-form" action="{{route('login')}}" method="post">
    {{csrf_field()}}
      <h3 class="form-title">Sistema Adminsitrativo</h3>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>Entre com seu E-Mail</span>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">E-Mail</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="E-Mail" name="email"/>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Senha</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
            <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="password"/>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <label class="checkbox">
        <input type="checkbox" name="remember" value="1"/> Lembre-me
        </label>
        <button type="submit" class="btn blue pull-right">
        Entrar <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
      <div class="forget-password">
        <h4>Esqueceu sua senha ?</h4>
        <p>
          Não se preocupe, clique <a href="javascript:;"  id="forget-password">aqui</a>
          para recupera-la
        </p>
      </div>
      
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="form-vertical forget-form" action="{{url('password/email')}}" method="post">
    {{csrf_field()}}
      <h3 >Recuperação de seua senha </h3>
      <p>Entre com seu E-Mail para enviarmos o reset de senha</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-envelope"></i>
            <input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" autocomplete="off" name="email" />
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
        <i class="m-icon-swapleft"></i> Voltar  
        </button>
        <button type="submit" class="btn blue pull-right">
        Submit <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->   <script src="{{url('/')}}/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="{{url('/')}}/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
  <script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
  <!--[if lt IE 9]>
  <script src="{{url('/')}}/assets/plugins/excanvas.min.js"></script>
  <script src="{{url('/')}}/assets/plugins/respond.min.js"></script>  
  <![endif]-->   
  <script src="{{url('/')}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
  <script src="{{url('/')}}/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="{{url('/')}}/assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="{{url('/')}}/assets/plugins/select2/select2.min.js"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{url('/')}}/assets/scripts/app.js" type="text/javascript"></script>
  <script src="{{url('/')}}/assets/scripts/login-soft.js" type="text/javascript"></script>      
  <!-- END PAGE LEVEL SCRIPTS --> 
  <script>
    jQuery(document).ready(function() {     
      App.init();
      Login.init();
    });
  </script>
  <!-- END JAVASCRIPTS -->
  <div style="position:absolute; bottom:0px; left:0px; "><a href="http://www.justukfreebies.co.uk/website-templates/free-responsive-login-form-template/">Free Website Templates</a></div>
</body>
<!-- END BODY -->
</html>
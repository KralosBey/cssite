<?php
error_reporting(0);
?>
<?php
//------------------------------------------------------------------------------------------------------------+
  require "../cs_lgsl_system/lgsl_config.php";
session_start();
ob_start();
  if (empty($lgsl_config['admin']['user']) || empty($lgsl_config['admin']['pass']))
  {
    exit("Kullanıcı adınız ve şifrenizi config bölümünden yapılandırın!");
  }
  elseif ($lgsl_config['admin']['pass'] == "123")
  {
    exit("Yönetici parolasını lütfen değiştirin. Standart şifre kullanmayınız!");
  }

  $auth   = md5($_SERVER['REMOTE_ADDR'].md5($lgsl_config['admin']['user'].md5($lgsl_config['admin']['pass'])));
  $cookie = isset($_COOKIE['lgsl_admin_auth']) ? $_COOKIE['lgsl_admin_auth'] : "";

  if (isset($_POST['lgsl_user']) && isset($_POST['lgsl_pass']) && $lgsl_config['admin']['user'] == $_POST['lgsl_user'] && $lgsl_config['admin']['pass'] == $_POST['lgsl_pass'])
  {
    setcookie("lgsl_admin_auth", $auth, (time() + (60 * 60 * 24)), "/");
    define("LGSL_ADMIN", TRUE);
  }
  elseif ($cookie == $auth)
  {
    setcookie("lgsl_admin_auth", $auth, (time() + (60 * 60 * 24)), "/");
    define("LGSL_ADMIN", TRUE);
  }

  header("Content-Type:text/html; charset=utf-8");
//------------------------------------------------------------------------------------------------------------+
?>
<!DOCTYPE html>
<html lang="tr" xmlns='http://www.w3.org/1999/xhtml'>
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>LiderCs.Net | Counter-Strike Admin Paneli</title>
  <!-- Google Web Fonts
  ================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Exo+2:400,700,700i|Roboto:400,400i" rel="stylesheet">
  <!-- CSS
  ================================================== -->
  <!-- Preloader CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Vendor CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="../assets/css/style.css" rel="stylesheet">
  
  <!-- Custom CSS-->
  <link href="../assets/css/custom.css" rel="stylesheet">
<style rel="stylesheet">.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{color:#fff;margin-bottom:1.5rem}.h1,h1{font-size:3rem}.h2,h2{font-size:2.35rem}.h3,h3{font-size:1.75rem}.h4,h4{font-size:1.32rem}.h5,h5{font-size:1.02rem}.h6,h6{font-size:.88rem}.display-1{font-size:4.7rem}.display-2{font-size:4.2rem}.display-3{font-size:3.7rem}.display-4{font-size:3.2rem}.nk-decorated-h,.nk-decorated-h-2{display:-ms-flexbox;display:flex}.nk-decorated-h-2>a,.nk-decorated-h-2>span,.nk-decorated-h>a,.nk-decorated-h>span{display:block;-ms-flex:auto;flex:auto;padding-right:20px;padding-left:20px}.nk-decorated-h-2:after,.nk-decorated-h-2:before,.nk-decorated-h:after,.nk-decorated-h:before{content:'';display:block;-ms-flex:100;flex:100;border-bottom:4px solid;-ms-transform:translateY(-10px);transform:translateY(-10px)}.nk-decorated-h-2:before,.nk-decorated-h:before{min-width:20px;width:20px;-ms-flex:20px;flex:20px}.nk-decorated-h-2:after,.nk-decorated-h-2:before{border-bottom-color:#313d46}.nk-decorated-h-3{display:-ms-flexbox;display:flex}.nk-decorated-h-3>a,.nk-decorated-h-3>span{display:block;-ms-flex:auto;flex:auto;padding-right:20px}.nk-decorated-h-3:after{content:'';display:block;-ms-flex:100;flex:100;border-bottom:4px solid #dd163b;-ms-transform:translateY(-4px);transform:translateY(-4px)}.nk-title{z-index:1}.nk-sub-title{font-weight:400;font-style:italic;font-family:"Open Sans",sans-serif;font-size:1.1rem;color:#dd163b;z-index:1}.nk-title+.nk-sub-title{margin-top:1rem}.nk-title-back{color:inherit;font-size:6rem;opacity:.1;margin-bottom:0}.nk-title-sep-icon:after,.nk-title-sep-icon:before,.nk-title-sep:after{vertical-align:middle;border-bottom:1px dotted;opacity:.4;content:''}.nk-title-back+*{margin-top:-40px}.nk-title-back+.nk-sub-title{margin-top:-50px}.nk-title-sep,.nk-title-sep-icon{margin:30px auto;color:inherit;line-height:0}.nk-title-sep{display:block}.nk-title-sep:after{width:80%;max-width:80px;display:inline-block}.nk-feature-1 .nk-feature-icon img,.nk-feature-2 .nk-feature-icon img,.nk-img,.nk-img-fit{max-width:100%}.nk-title-sep-icon{display:block}.nk-title-sep-icon .icon{font-size:1.9rem;vertical-align:middle}.nk-title-sep-icon:after,.nk-title-sep-icon:before{display:inline-block;width:60px}.nk-title-sep-icon:before{margin-right:20px}.nk-title-sep-icon:after{margin-left:20px}.nk-mega-item>.dropdown>ul li>label{font-family:Montserrat,sans-serif}.nk-sidebar-sticky-parent{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}.nk-sidebar-sticky-parent>.nk-sidebar{-ms-flex:1;flex:1}.row.vertical-gap>[class*=col-]{padding-top:30px}.row.vertical-gap{margin-top:-30px}.row.sm-gap{margin-left:-10px;margin-right:-10px}.row.sm-gap>[class*=col-]{padding-right:10px;padding-left:10px}.row.sm-gap.vertical-gap>[class*=col-]{padding-top:20px}.row.sm-gap.vertical-gap{margin-top:-20px}.row.md-gap{margin-left:-22.5px;margin-right:-22.5px}.row.md-gap>[class*=col-]{padding-right:22.5px;padding-left:22.5px}.row.md-gap.vertical-gap>[class*=col-]{padding-top:45px}.row.md-gap.vertical-gap{margin-top:-45px}.row.lg-gap{margin-left:-30px;margin-right:-30px}.row.lg-gap>[class*=col-]{padding-right:30px;padding-left:30px}.row.lg-gap.vertical-gap>[class*=col-]{padding-top:65px}.modal-body,.modal-footer,.modal-header{padding:20px 25px}.row.lg-gap.vertical-gap{margin-top:-65px}.thead-default th{color:#303e47;background-color:#f7f7f7}.table td,.table th,.table thead th{border-color:#f2f2f2}.modal-content{background-color:#171e22}.modal-content .close{color:#fff;text-shadow:none}.modal-header{border-bottom-color:#273138}.modal-footer{border-top-color:#273138}.text-main-1{color:#dd163b!important}.text-main-2{color:#a714b9!important}.text-main-3{color:#38a220!important}.text-main-4{color:#22a2b1!important}.text-main-5{color:#1464d2!important}.text-main-6{color:#ef9e2b!important}.text-primary{color:#0275D8!important}.text-success{color:#38a220!important}.text-info{color:#22a2b1!important}.text-warning{color:#ef9e2b!important}.text-danger{color:#e2361f!important}.text-white{color:#fff!important}.text-black{color:#000!important}.text-dark-1{color:#171e22!important}.text-dark-2{color:#273138!important}.text-dark-3{color:#313d46!important}.text-dark-4{color:#303e47!important}.bg-main-1{background-color:#dd163b!important}.bg-main-2{background-color:#a714b9!important}.bg-main-3{background-color:#38a220!important}.bg-main-4{background-color:#22a2b1!important}.bg-main-5{background-color:#1464d2!important}.bg-main-6{background-color:#ef9e2b!important}.bg-primary{background-color:#0275D8!important}.bg-success{background-color:#38a220!important}.bg-info{background-color:#22a2b1!important}.bg-warning{background-color:#ef9e2b!important}.bg-danger{background-color:#e2361f!important}.bg-white{background-color:#fff!important}.bg-black{background-color:#000!important}.bg-dark-1{background-color:#171e22!important}.bg-dark-2{background-color:#273138!important}.bg-dark-3{background-color:#313d46!important}.bg-dark-4{background-color:#303e47!important}</style>
<style rel="stylesheet">button {
    font-family: exo 2,sans-serif;
    font-size: 1em;
}</style>
</head>
<?php
//------------------------------------------------------------------------------------------------------------+
  if (defined("LGSL_ADMIN"))
  {
    global $output;
    $output = "";
    require "../cs_lgsl_system/lgsl_admin.php";
    echo $output;
  }
  else
  {
    echo "
<div class='page-heading'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-4 col-md-offset-0'>
                <h1 class='page-heading__title'><span class='highlight'>Yönetici</span> Girişi</h1>
                <center>
                    <ol class='page-heading__breadcrumb breadcrumb'>
                        <li><a href='../index.php'>Ana Sayfa</a></li>
                        <li class='active'>Yönetici Girişi</li>
                    </ol>
					<div class='info-block__item info-block__item--social'>
                <ul class='social-links social-links--circle'>
                  <li class='social-links__item'>
                    <a href='https://www.facebook.com/mrstipfan' class='social-links__link'><i class='fa fa-facebook'></i></a>
                  </li>
                  <li class='social-links__item'>
                    <a href='https://www.twitter.com/onurmaslci' class='social-links__link'><i class='fa fa-twitter'></i></a>
                  </li>
                  <li class='social-links__item'>
                    <a href='https://www.instagram.com/onurmaslci' class='social-links__link'><i class='fa fa-instagram'></i></a>
                  </li>
                  <li class='social-links__item'>
                    <a href='https://www.facebook.com/mrstipfandesigner' class='social-links__link'><i class='fa fa-rss'></i></a>
                  </li>
                </ul>
              </div>
                </center>
            </div>
        </div>
    </div>
</div>

<div class='site-content'>
    <div class='container'>
	
	 <div style='text-align:right'>
	  <div style='color:#ffffff; margin:0px 0 0 0px;'><script type='text/javascript'>function makeArray() {for (i = 0; i<makeArray.arguments.length; i++)this[i + 1] = makeArray.arguments[i];}var months = new makeArray('Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık');var date = new Date();var day = date.getDate();var month = date.getMonth() + 1;var yy = date.getYear();var year = (yy < 1000) ? yy + 1900 : yy;var now = new Date();var yr = now.getYear();var mName = now.getMonth() + 1;var dName = now.getDay() + 1;var dayNr = ((now.getDate()<10) ? '0' : '')+ now.getDate();if(dName==1) Day = 'Pazar';if(dName==2) Day = 'Pazartesi';if(dName==3) Day = 'Salı';if(dName==4) Day = 'Çarşamba';if(dName==5) Day = 'Perşembe';if(dName==6) Day = 'Cuma';if(dName==7) Day = 'Cumartesi';var todaysDate =(' - '+Day+'');document.write(day+' '+months[month]+' ');document.open();document.write(todaysDate);</script></font></div></div>
	<h1 class='nk-decorated-h-2'><span><span class='text-main-1'>MrStipFan</span> Designer</span></h1>
                <div class='card'>
                    <div class='card__header'>
                        <h4>Hesabınıza giriş yapın</h4>
                        <div style='text-align:right'><a href='../index.php' class='btn btn-default btn-outline btn-sm'>AnaSayfa'ya Geri Dön</a></div>
                    </div>
                    <div class='card__content'>
                        <form name='form' id='form' class='form-horizontal' enctype='multipart/form-data' method='post' action=''>
                            <div class='form-group'>
                                <label for='login-name'>Kullanıcı Adı</label>
								<input id='user' type='text' class='form-control' name='lgsl_user' value='' placeholder='Kullanıcı Adınız...'>
                            </div>
                            <div class='form-group'>
                                <label for='login-password'>Şifreniz</label>
								<input id='password' type='password' class='form-control' name='lgsl_pass' placeholder='Kullanıcı Şifreniz...'>
                            </div>
                            <div class='form-group form-group--sm'>
                                <button type='submit' name='lgsl_admin_login' class='btn btn-primary-inverse btn-lg btn-block'><i class='glyphicon glyphicon-log-in'></i> Oturumu Aç</button>
                            </div>
                        </form>
                    </div>
                </div>
                <center><h2 class='nk-decorated-h-1'><span>© 2013 - 2018 Tüm Hakları Sakldıır.<br><span class='text-main-1'><a href='https://www.facebook.com/mrstipfandesigner'>MRSTİPFAN</a></span> designer</span></h2></center>
    </div>
</div>";}
//------------------------------------------------------------------------------------------------------------+
?>
<div id="particles"></div>
</body>
</html>

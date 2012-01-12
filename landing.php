<!DOCTYPE html>
<html>
<head>
<title>SomebodyNu</title>
<link href="res/css/main.css" rel="stylesheet" type="text/css"/>
<link href="res/css/landing.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-248621-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<script src="res/js/jquery-1.7.1.min.js"></script>

<body>
<div id="HeaderContainer" onclick="window.location='.'"><img src="res/images/logo.png"/ alt="logo"></div>
<div id="MainContainer"> 
	<div id="DescriptionContainer">
        <div id="Description">
		<div style="margin:auto;text-align:center;">
			<img src="res/images/smallLogo.png" />
			<div style="padding:25px 0px 0px 25px;text-align:center;">
			Want to do something, but can't find people to do it with?
		    Now you can!</div>
		</div>
        </div>
        <div id="LoginButtonContainer">
            <div id="fb-login">      
                <div id="fb-root"></div>
                    <script>
                        window.fbAsyncInit = function() {
                            FB.init({
                                appId      : '<?php echo Config::appId(); ?>',
                                status     : true, 
                                cookie     : true,
                                xfbml      : true,
                                oauth      : true,
                            });

                            FB.Event.subscribe('auth.login', function(response) {
                                setTimeout( function() { window.location.reload() }, 500 );
                            });
                        };

                        (function(d){
                         var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                         js = d.createElement('script'); js.id = id; js.async = true;
                         js.src = "//connect.facebook.net/en_US/all.js";
                         d.getElementsByTagName('head')[0].appendChild(js);
                        }(document));
                    </script>      
                <div class="fb-login-button" size="large"
data-scope="email,user_location,user_about_me">Login with Facebook</div>
            </div>
        </div>
        <div style="clear:both;"></div>
	</div>
</div>



</body>
</html>

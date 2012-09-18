<!DOCTYPE html>
<html lang="es">
<head>
	<title>Who is Who</title>
	<meta charset="utf-8" />
	<link rel='stylesheet' type='text/css' href='/css/layout.css' />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '444936682216984', // App ID
      //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
	<nav id="breadcrumb">
		<ul class="inner">
			<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="item">
				<a href="http://www.example.com/dresses" itemprop="url">
					<span itemprop="title">WiW</span>
				</a> >
			</li>
		</ul>
		<fb:login-button>Login with Facebook</fb:login-button>
	</nav>
	

	<div id="container" >
		<header class="page_title">
			<h1>WHO is WHO</h1>
			<img src="img/star.png" width="360px" height="360px" class="logo" alt=""/>
		</header>		
		<ul>
		    <?php foreach($friends as $friend){
		   echo '<li><img src="https://graph.facebook.com/'.$friend['id'].'/picture"><a href="/index.php/friends/select/?friend_id='.$friend['id'].'">'.$friend['name']."</a></li>";
		    }?>
		    </ul>
		<section class="clearfix">
			<div class="destacados">
				<ul>
					<li>
						<h2>Pregunta</h2>
						<p>Realiza una pregunta que se pueda contestar con SI o NO</p>
					</li>
					<li>
						<h2>Encuentra</h2>
						<p>Descarta a los contactos que no encagen</p>
					</li>
				</ul>	
			</div>
		</section>
		<!--<aside id="sidebar">
			<p>Lateral</p>
		</aside>-->
	</div>
	
</body>
</html>
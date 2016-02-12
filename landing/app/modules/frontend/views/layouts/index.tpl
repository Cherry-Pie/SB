<!DOCTYPE html>
<html>
	<head>
		<title>Scan backlinks</title>
		<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
		<link rel="stylesheet" href="/css/main.less" type='text/less'>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js' type='text/javascript'></script>
	</head>
	<body>
		<header class='header'>
			<div class="content">
				<a href="/" class='logo'></a>
				<div class="sign_wrapper">
					{foreach $pages as $page}
						<a href="/page/{$page.id}">{$page.name}</a>
					{/foreach}
					<a href="price">price</a>
					<a href="#">sign in</a>
					<span>or</span>
					<a href="#">sign up</a>
				</div>
			</div>
		</header>
		{$content}
		<footer class='footer'>
		<div class="shares">
			<a href="{$data->hrefs->href.0}" class="share fa fa-facebook-official"></a>
			<a href="{$data->hrefs->href.1}" class="share fa fa-twitter-square"></a>
			<a href="{$data->hrefs->href.2}" class="share fa fa-google-plus-square"></a>
		</div>
		<div class="copyrything">
			<span>Copyrything 2015</span>
			<span>All right reserved</span>
		</div>
		</footer>
	</body>
</html>
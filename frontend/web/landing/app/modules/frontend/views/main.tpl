<div class="head_wrapper">
	<header class='header'>
		<div class="content">
			<a href="#" class='logo'></a>
			<div class="sign_wrapper">
				{foreach $pages as $page}
					<a href="page/{$page.id}">{$page.name}</a>
				{/foreach}
				<a href="price">price</a>
				<a href="#">sign in</a>
				<span>or</span>
				<a href="#">sign up</a>
			</div>
		</div>
	</header>
	<div class="main">
		<h1>{$data->titles.1}</h1>
		<h2>{$data->titles.2}</h2>
		<h3>{$data->titles.3}</h3>
		<form class="main_form">
			<div class="input_wrapper">
				<input type="text" placeholder='Enter URL to analyze backlink profile'>
			</div>
			<button type="submit">get report now !</button>
		</form>
		<div class="tablet"></div>
	</div>
</div>
<div class="how_work">
	<div class="text">
		How does <span>Scan<span>Backlinks</span></span> work:
	</div>
	<div class="how_works_img"></div>
</div>
<div class="helper"></div>
<div class="service">
	<div class="title">
		For Whom This Service
	</div>
	<ul>
		<li>
			<div class="ico seo"></div>
			<div class="texts">
				<div class="title_li">
					{$data->for_whom_this_service->title.0}
				</div>
				<div class="text">
					{$data->for_whom_this_service->body.0}
				</div>
			</div>
		</li>
		<li>
			<div class="ico pc"></div>
			<div class="texts">
				<div class="title_li">
					{$data->for_whom_this_service->title.1}
				</div>
				<div class="text">
					{$data->for_whom_this_service->body.1}
				</div>
			</div>
		</li>
		<li>
			<div class="ico usr"></div>
			<div class="texts">
				<div class="title_li">
					{$data->for_whom_this_service->title.2}
				</div>
				<div class="text">
					{$data->for_whom_this_service->body.2}
				</div>
			</div>
		</li>
	</ul>
</div>

<div class="expample">
	<div class="wr_bg_ex">
		<div class="sm_ex">
			<div class="head">
				<div class="img"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span>{$data->servise->ahrefs.0}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span>{$data->servise->ahrefs.1}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span>{$data->servise->ahrefs.2}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="fu_ex">
			<div class="head">
				<div class="img"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span>{$data->servise->scanbacklinks.0}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span>{$data->servise->scanbacklinks.1}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span>{$data->servise->scanbacklinks.2}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="sm_ex">
			<div class="head">
				<div class="img majestic"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span>{$data->servise->majestic.0}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span>{$data->servise->majestic.1}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span>{$data->servise->majestic.2}</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<a href="#" class='full_plan'>
		full plan comparasion
	</a>
</div>

<div class="reviews">
	<div class="title">
		Reviews
	</div>
	<ul>
		<li>
			<div class="title_author">
				{$data->reviews->title.0} <span>says</span>
			</div>
			<div class="text">
				{$data->reviews->body.0}
			</div>
		</li>
		<li>
			<div class="title_author">
				{$data->reviews->title.1} <span>says</span>
			</div>
			<div class="text">
				{$data->reviews->body.1}
			</div>
		</li>
		<li>
			<div class="title_author">
				{$data->reviews->title.2} <span>says</span>
			</div>
			<div class="text">
				{$data->reviews->body.2}
			</div>
		</li>
	</ul>
</div>

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
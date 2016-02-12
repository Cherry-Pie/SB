<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />
			<h2>Scanbacklinks ADMIN</h2>
			<h5>Вход в админ панель</h5>
			<br />
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				{if $error}
					<div class="panel-heading">
	           			<strong style='color: red;'>{$error}</strong>
	                </div>
                {/if}
				<div class="panel-body">
					<form method='POST'>
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
							<input type="text" class="form-control" name='login' placeholder="Логин" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
							<input type="password" class="form-control" name='password' placeholder="Пароль" />
						</div>
						<div class="form-group">
						</div>
						<input type="submit" class="btn btn-primary " value='Войти'>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
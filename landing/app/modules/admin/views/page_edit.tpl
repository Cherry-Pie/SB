<div class="col-md-12">
	{if $success}
		<div class="alert alert-success" role="alert">{$success}</div>
	{/if}
	<form method='post'>
		<div class="form-group">
			<input type="text" name='page[name]' class="form-control"  value='{$page.name}' placeholder='Page name' required>
		</div>
		<textarea name="page[body]" id="page_editor"  class='form-controll' >{$page.body}</textarea>
		<input type="submit" class='form-controll' value='Сохранить'>
	</form>
</div>
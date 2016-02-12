<div class="col-md-12">
	<h1>Страници</h1>
	<div class="panel panel-default">
        <div class="panel-heading">
            Страници
        </div>
        {if $success}
            <div class="alert alert-success" role="alert">{$success}</div>
        {/if}
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Ред.</th>
                            <th>Удалить.</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $pages}
                            {foreach $pages as $page}
                                <tr>
                                    <td>{$page.id}</td>
                                    <td>{$page.name}</td>
                                    <td><a class="btn btn-primary" href='/admin/pages/edit/{$page.id}'><i class="fa fa-edit "></i> Редактировать</a></td>
                                    <td><a class="btn btn-danger" href='/admin/pages/delete/{$page.id}'> Удалить</a></td>
                                </tr>
                            {/foreach}
                        {else}
                            <h3>Страниц нет</h3>
                        {/if}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="/admin/pages/edit" class="btn btn-primary">Добавить новую</a>
</div>
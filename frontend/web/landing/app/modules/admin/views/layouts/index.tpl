<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$page_title}</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/font-awesome.css" rel="stylesheet">
        <link href="/js/morris/morris-0.4.3.min.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <script src="/js/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
        <script src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
        <script src="/js/kernel.js"></script>
    </head>
    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Scanbacklinks</a>
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                <a href="/admin?logout=1" class="btn btn-danger square-btn-adjust">Выход</a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                       <a {if $controller == 'MainController' || $controller == 'ProjectController'}class="active-menu"{/if} href="/admin"><i class="fa fa-dashboard fa-3x"></i> Главная</a>
                    </li>
                    <li>
                       <a {if $controller == 'PagesController' || $controller == 'PageController'}class="active-menu"{/if} href="/admin/pages"><i class="fa fa-dashboard fa-3x"></i> Страници</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                {$content}
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.metisMenu.js"></script>
    <script src="/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/js/morris/morris.js"></script>
    <script src="/js/custom.js"></script>



    </body>
</html>

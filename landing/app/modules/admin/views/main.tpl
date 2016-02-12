
<div class="col-md-12">
    <h1>Тексты</h1>
    <form action="" method='post'>
        <h3>Titles</h3>
        <div class="form-group">
            <label for="comment">Page title</label>
            <input type='text' class='form-control' name='titles[]' value='{$data->titles.0}' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">First landing title (h1)</label>
            <input type='text' class='form-control' name='titles[]' value='{$data->titles.1}' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">Second landing title</label>
            <input type='text' class='form-control' name='titles[]' value='{$data->titles.2}' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">Third landing title</label>
            <input type='text' class='form-control' name='titles[]' value='{$data->titles.3}' placeholder='Title'>
        </div>




        <h3>For Whom This Service</h3>
        <div class="form-group">
            <label for="comment">first</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='{$data->for_whom_this_service->title.0}' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text">{$data->for_whom_this_service->body.0}</textarea>
        </div>
        <div class="form-group">
            <label for="comment">second</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='{$data->for_whom_this_service->title.1}' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text">{$data->for_whom_this_service->body.1}</textarea>
        </div>
        <div class="form-group">
            <label for="comment">third</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='{$data->for_whom_this_service->title.2}' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text">{$data->for_whom_this_service->body.2}</textarea>
        </div>

        <h3>Reviews</h3>
        <div class="form-group">
            <label for="comment">first</label>
            <input  value='{$data->reviews->title.0}' type='text'  class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea  class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'>{$data->reviews->body.0}</textarea>
        </div>
        <div class="form-group">
            <label for="comment">second</label>
            <input value='{$data->reviews->title.1}'  type='text' class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'>{$data->reviews->body.1}</textarea>
        </div>
        <div class="form-group">
            <label for="comment">third</label>
            <input value='{$data->reviews->title.2}' type='text' class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'>{$data->reviews->body.2}</textarea>
        </div>

        <h3>Social network</h3>
        <div class="form-group">
            <label for="comment">Twitter href</label>
            <input value='{$data->hrefs->href.0}' type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>
        <div class="form-group">
            <label for="comment">Google+ href</label>
            <input value='{$data->hrefs->href.1}'  type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>
        <div class="form-group">
            <label for="comment">Facebook href</label>
            <input value='{$data->hrefs->href.2}' type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>

        <h3>Ahrefs service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='{$data->servise->ahrefs.0}' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='{$data->servise->ahrefs.1}' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='{$data->servise->ahrefs.2}' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <h3>Scanbacklinks service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='{$data->servise->scanbacklinks.0}' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='{$data->servise->scanbacklinks.1}' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='{$data->servise->scanbacklinks.2}' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <h3>Majestic service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='{$data->servise->majestic.0}' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='{$data->servise->majestic.1}' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='{$data->servise->majestic.2}' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <input type="submit" class='form-controll' value='Сохранить'>
    </form>
</div>
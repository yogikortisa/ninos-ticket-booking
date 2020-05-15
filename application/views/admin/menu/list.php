<h3 class="heading_b uk-margin-bottom">Menu Lists</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
    	<div align="right"><a href="<?= admin_url('menu/create') ?>"><button class="md-btn md-btn-primary" type="button" data-uk-button="" aria-pressed="false" id="create">Create</button></a></div>
        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th>Icon</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($get_menu as $val) {
                        if($val->id != 1) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $val->title ?></td>
                    <td><?= $val->link ?></td>
                    <td><?= $val->icon ?></td>
                    <td><?= $val->parent ?></td>
                    <td>
                        <a href="<?= admin_url('menu/edit/'.$val->id) ?>">
                            <button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button>
                        </a>
                        <a href="<?= admin_url('menu/delete/'.$val->id) ?>">
                            <button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-remove uk-icon-small"></i></button>
                        </a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>
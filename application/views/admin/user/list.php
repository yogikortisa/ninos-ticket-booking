<h3 class="heading_b uk-margin-bottom">User Lists</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
    	<div align="right"><a href="<?= admin_url('user/create') ?>"><button class="md-btn md-btn-primary" type="button" data-uk-button="" aria-pressed="false" id="create">Create</button></a></div>
        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($get_user->result() as $val) {
                        if($val->id != 1) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $val->username ?></td>
                    <td><?= $val->email ?></td>
                    <td><a href="<?= admin_url('user/edit/'.$val->id) ?>"><button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button></a>
                        <a href="<?= admin_url('user/delete/'.$val->id) ?>"><button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-remove uk-icon-small"></i></button></a></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>
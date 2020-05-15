<h3 class="heading_b uk-margin-bottom">Ticket Category</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
    	<div align="right"><a href="<?= admin_url('ticket_category/create') ?>"><button class="md-btn md-btn-primary" type="button" data-uk-button="" aria-pressed="false" id="create">Create</button></a></div>
        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Name</th>
                    <th>Age Range</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($get_ticket as $val) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $val->name ?></td>
                    <td><?= $val->age_range ?></td>
                    <td><a href="<?= admin_url('ticket_category/edit/'.$val->id) ?>"><button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

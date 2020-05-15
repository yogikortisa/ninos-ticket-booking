<h3 class="heading_b uk-margin-bottom">Session Lists</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
    	<div align="right"><!-- <a href="<?= base_url('session/create') ?>"> --><button class="md-btn md-btn-primary" type="button" data-uk-button="" aria-pressed="false" id="create">Create</button><!-- </a> --></div>
        <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th>No</th>
                    <th>Name</th>
                    <th>Day</th>
                    <th>Session 1</th>
                    <th>Session 2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($get_session->result() as $val) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $val->name ?></td>
                    <td><?= ($val->type == 3 ? count(json_decode($val->holiday)) : count(json_decode($val->day))) ?></td>
                    <td><?= json_decode($val->session1)[2] ?> hours</td>
                    <td><?= ($val->type == 1 ? '-' : json_decode($val->session2)[2].' hours') ?></td>
                    <td><a href="<?= admin_url('session/edit/'.$val->id_session) ?>"><button class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    
<script>

    $('#create').on("click", function(){
        $.ajax({
            type: "POST",
            // dataType: "json",
            url: "<?= admin_url('session/check') ?>",
            // data: values ,
            success: function (response) {
                console.log(response);
                if(response == 1)
                {
                    UIkit.modal.alert("All session type has been created!");
                    return false;
                }
                else
                {
                    window.location.href = '<?= admin_url('session/create') ?>';
                }
            }
        });
    })
</script>
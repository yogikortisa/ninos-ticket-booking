<h3 class="heading_b uk-margin-bottom">Create Quota Ticket</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-width-1-1">
            <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                <li class="uk-active"><a href="#">List</a></li>
                <!-- <li><a href="#">Active</a></li>
                <li class="named_tab"><a href="#">Non-Active</a></li> -->
            </ul>
            <ul id="tabs_1_content" class="uk-switcher uk-margin">
                <li>
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <button class="md-btn md-btn-primary" data-uk-modal="{target:'#modal_form_create'}">Create</button>
                        <thead>
                            <tr>
                                <th>Tanggal Ticket</th>
                                <th>category Ticket</th>
                                <th>Quota Session 1</th>
                                <th>Quota Session 2</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_quota as $key => $value) { ?>
                            <tr>
                                <td><?=$value->ticket_date;?></td>
                                <td><?=$value->name;?></td>
                                <td><?=$value->quota_sess1;?></td>
                                <td><?=$value->quota_sess2;?></td>
                                <td>
                                    <a href="<?= admin_url('') ?>" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="uk-width-medium-1-3">
    <div class="uk-modal" id="modal_form_create">
        <div class="uk-modal-dialog uk-modal-dialog-medium">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-modal-header">
                <h3 class="uk-modal-title">Create Quota</h3>
            </div>
            <!-- ########### -->
            <div class="md-card-content large-padding">
                <form id="form_validation" action="<?= admin_url('quota_ticket/save_quota') ?>" method="post" class="uk-form-stacked">
                    <table>
                        <thead>
                            <tr>
                                <th>category Ticket</th>
                                <th>Quota Session 1</th>
                                <th>Quota Session 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($category_id as $key => $value) { ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id_category[]" value="<?=$value->id?>" data-md-icheck required/>
                                    <label class="inline-label"><?=$value->name?></label>        
                                </td>
                                <td>
                                    <input name="qtysession1[]" data-parsley-type="integer" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" type="number" min="1" class="md-input" placeholder="Qty*" required />
                                </td>
                                <td>
                                     <input name="qtysession2[]" data-parsley-type="integer" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" type="number" min="1" class="md-input" placeholder="Qty*" required />
                                </td>
                            </tr>
                            <?php } ?>
                            
                                
                            </tbody>
                        </table>
                        <br>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-large-1-2 uk-width-1-1">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon">From :</span>
                                    <input type="date" name="from" id="weekend-calendar1" required>
                                </div>
                            </div>
                            <!-- <div class="uk-width-large-1-2 uk-width-medium-1-1">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon">To :</span>
                                    <input type="date" name="to" id="weekend-calendar2">
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- ############# -->
                    <div class="uk-modal-footer uk-text-right">
                        <!-- <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button> -->
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <!-- <button type="button" class="md-btn md-btn-warning uk-modal-close">Close</button> -->
                                <button type="submit" class="md-btn md-btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    $( document ).ready(function() 
    {

       $('#id_category').prop('checked', true).iCheck('update');


       $("#weekend-calendar1").kendoDatePicker({
                format: "dd.MM.yyyy",
                min: new Date(),
            });


         $("#weekend-calendar2").kendoDatePicker({
                format: "dd.MM.yyyy",
                min: new Date(),
            });

    })

   
</script>


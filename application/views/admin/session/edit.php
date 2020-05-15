<?= form_open(base_url('session/update_data/'.$get_data->id)) ?>
<div class="md-card">
    <div class="md-card-content">

        <h3 class="heading_a">Edit Session</h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="session" id="session" data-md-selectize disabled="disabled">
                        <option value="">Select Session..</option>
                        <?php
                            foreach ($session_list as $val) 
                            {
                                if($val->id == $get_data->type)
                                {
                                    echo '<option value="'.$val->id.'" selected>'.$val->name.'</option>';
                                }
                                else
                                {
                                    echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Sesi 1</label>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-2">
                            <input id="start1" name="start[]" type="number" class="uk-form-width-medium" placeholder="start" value="<?= json_decode($get_data->session1)[0] ?>" />
                        </div>
                        <div class="uk-width-large-1-2">
                            <input id="end1" name="end[]" type="number" class="uk-form-width-medium" placeholder="end" />
                        </div>
                    </div>
                    <p style="marin-top: 5px" id="duration1">Duration: <b><?= json_decode($get_data->session1)[2] ?> Hours</b></p>
                    <input type="hidden" id="duration_val1" name="duration[]" value="<?= json_decode($get_data->session1)[2] ?>">
                </div>
            </div>
            <div class="uk-width-medium-1-2" id="sesi2">
                <div class="uk-form-row">
                    <label>Sesi 2</label>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-2">
                            <input id="start2" type="number" name="start[]" class="uk-form-width-medium" placeholder="start" />
                        </div>
                        <div class="uk-width-large-1-2">
                            <input id="end2" type="number" name="end[]" class="uk-form-width-medium" placeholder="end" />
                        </div>
                    </div>
                    <p style="marin-top: 5px" id="duration2">Duration: <b>
                        <?php 
                            if($get_data->session2 == '[]')
                            {
                                $get_data->session2 = array('','','');
                                $get_data->session2 = json_encode($get_data->session2);
                                echo json_decode($get_data->session2)[2];
                            }
                            else
                            {
                                echo json_decode($get_data->session2)[2];
                            }
                        ?> Hours</b></p>
                    <input type="hidden" id="duration_val2" name="duration[]" value="<?= json_decode($get_data->session2)[2] ?>">
                </div>
            </div>
        </div>

    <?php if($get_data->type != 3) { ?>
        <div class="uk-grid" id="selectday" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Select Day</h3>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium">
                                <span class="icheck-inline">
                                    <input type="checkbox" value="1" name="days[]" id="checkbox_demo_inline_1" data-md-icheck />
                                    <label for="checkbox_demo_inline_1" class="inline-label">Monday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="2" name="days[]" id="checkbox_demo_inline_2" data-md-icheck />
                                    <label for="checkbox_demo_inline_2" class="inline-label">Tuesday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="3" name="days[]" id="checkbox_demo_inline_3" data-md-icheck />
                                    <label for="checkbox_demo_inline_3" class="inline-label">Wednesday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="4" name="days[]" id="checkbox_demo_inline_4" data-md-icheck />
                                    <label for="checkbox_demo_inline_4" class="inline-label">Thursday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="5" name="days[]" id="checkbox_demo_inline_5" data-md-icheck />
                                    <label for="checkbox_demo_inline_5" class="inline-label">Friday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="6" name="days[]" id="checkbox_demo_inline_6" data-md-icheck />
                                    <label for="checkbox_demo_inline_6" class="inline-label">Saturday</label>
                                </span>
                                <span class="icheck-inline">
                                    <input type="checkbox" value="7" name="days[]" id="checkbox_demo_inline_7" data-md-icheck />
                                    <label for="checkbox_demo_inline_7" class="inline-label">Sunday</label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if($get_data->type == 3) { ?>
        <div class="uk-grid" id="holiday">
            <div class="uk-width-1-1">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                        </div>
                        <h3 class="md-card-toolbar-heading-text">
                            Holiday Date
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <?php 
                                $holidaylist = json_decode($get_data->holiday); 
                                $i = 0;
                                foreach ($holidaylist as $val) { 
                            ?>
                                <div class="uk-grid form_section">
                                    <div class="uk-width-1-1">
                                        <div class="uk-input-group">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-large-1-3 uk-width-1-1">
                                                    <div class="uk-input-group">
                                                        <?= $i+1 ?>
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_start">Start Date</label>
                                                        <input class="md-input uk_dp_start" value="<?= $val[0] ?>" name="uk_dp_start[]" type="text" id="uk_dp_start<?= $i ?>">
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_end">End Date</label>
                                                        <input class="md-input uk_dp_end" value="<?= $val[1] ?>" name="uk_dp_end[]" type="text" id="uk_dp_end<?= $i ?>">
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-pencil"></i></span>
                                                        <label for="info">Information</label>
                                                        <input class="md-input" value="<?= $val[2] ?>" name="info[]" type="text" id="info<?= $i ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; } ?>

                            <?php $j = 12 - $i; for ($i=$i+1; $i<13; $i++) { ?>
                                <div class="uk-grid form_section">
                                    <div class="uk-width-1-1">
                                        <div class="uk-input-group">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-large-1-3 uk-width-1-1">
                                                    <div class="uk-input-group">
                                                        <?= $i ?>
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_start">Start Date</label>
                                                        <input class="md-input uk_dp_start" name="uk_dp_start[]" type="text" id="uk_dp_start<?= $i ?>">
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                        <label for="uk_dp_end">End Date</label>
                                                        <input class="md-input uk_dp_end" name="uk_dp_end[]" type="text" id="uk_dp_end<?= $i ?>">
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-pencil"></i></span>
                                                        <label for="info">Information</label>
                                                        <input class="md-input" name="info[]" type="text" id="info<?= $i ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Save</button></div>

    </div>
</div>
<?php form_close() ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('input[name="days[]"]').each(function() 
        {
            // console.log(<?= json_encode($get_data->day) ?>);
            // console.log($.inArray(parseInt($(this).val()), [5,6]));
            if($.inArray($(this).val(), <?= json_encode($get_data->day) ?>) != -1)
            {
                $(this).iCheck('check');
            }
        })
    });

    var intval = 1;
    $('input[name="start[]"]').each(function() 
    {
        function startChange() {
          var startTime = start.value();
          if (startTime) {
            startTime = new Date(startTime);
            end.max(startTime);
            startTime.setMinutes(startTime.getMinutes() + this.options.interval);
            end.min(startTime);
            // end.value(startTime);
          }
        }
        var start = $('#start'+intval).kendoTimePicker({
            format: "HH:mm",
            change: startChange
        }).data("kendoTimePicker");

        var end = $('#end'+intval).kendoTimePicker({format: "HH:mm"}).data("kendoTimePicker");

        start.min("8:00 AM");
        start.max("6:00 PM");

        end.min("8:00 AM");
        end.max("7:30 AM");
        intval++;
    });

    //Set default value
    $("#start1").data("kendoTimePicker").value("<?= json_decode($get_data->session1)[0] ?>");
    $("#end1").data("kendoTimePicker").value("<?= json_decode($get_data->session1)[1] ?>");
    $("#start2").data("kendoTimePicker").value("<?= json_decode($get_data->session2)[0] ?>");
    $("#end2").data("kendoTimePicker").value("<?= json_decode($get_data->session2)[1] ?>");


    //Get Duration
    $('#start1, #end1').change(function() {
        var start = $('#start1').val().split(':');
        var start1 = parseInt(start[0]);
        var start2 = parseInt(start[1]);
        var totstart = (start1 * 60) + start2;

        var end   = $('#end1').val().split(':');
        var end1 = parseInt(end[0]);
        var end2 = parseInt(end[1]);
        var totend = (end1 * 60) + end2;

        var total = (totend - totstart) / 60;
        (isNaN(total) ? total = 0 : total);
        $('#duration1').html('Duration: <b>'+total+' hours</b>');
        $('#duration_val1').val(total);
        console.log(totstart);
        console.log(totend);
        console.log(total);
    })

    $('#start2, #end2').change(function() {
        var start = $('#start2').val().split(':');
        var start1 = parseInt(start[0]);
        var start2 = parseInt(start[1]);
        var totstart = (start1 * 60) + start2;

        var end   = $('#end2').val().split(':');
        var end1 = parseInt(end[0]);
        var end2 = parseInt(end[1]);
        var totend = (end1 * 60) + end2;
        
        var total = (totend - totstart) / 60;
        (isNaN(total) ? total = 0 : total);
        $('#duration2').html('Duration: <b>'+total+' hours</b>');
        $('#duration_val2').val(total);
    })

    var count = 0;
    $('input[name="uk_dp_start[]"]').each(function() 
    {
        var $dp_start = $('#uk_dp_start'+count),
            $dp_end = $('#uk_dp_end'+count);

        var start_date = UIkit.datepicker($dp_start, {
            format:'DD.MM.YYYY'
        });

        var end_date = UIkit.datepicker($dp_end, {
            format:'DD.MM.YYYY'
        });

        $dp_start.on('change',function() {
            end_date.options.minDate = $dp_start.val();
            setTimeout(function() {
                $dp_end.focus();
            },300);
        });

        $dp_end.on('change',function() {
            start_date.options.maxDate = $dp_end.val();
        });
        count++;
    });

    $('#session').on("change", function ()
    {
        if($(this).val() == 3)
        {
            $('#holiday').show();
            $('#selectday').hide();
        }
        else
        {
            $('#selectday').show();
            $('#holiday').hide();
        }
    })
</script>
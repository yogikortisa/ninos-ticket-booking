<h3 class="heading_b uk-margin-bottom">Ticket Order Lists</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-width-1-1">
            <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                <li class="uk-active"><a href="#">Ticket</a></li>
                <li><a href="#">Payment</a></li>
                <li class="named_tab"><a href="#">Reject</a></li>
                <li class="named_tab"><a href="#">Reschedule</a></li>
            </ul>
            <ul id="tabs_1_content" class="uk-switcher uk-margin">
                <li>
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Order ID</th>
                                <th>Barcode</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Play Date</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($get_data->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d-m-Y', strtotime($val->order_date)) ?></td>
                                <td><?= $val->order_id ?></td>
                                <td><?= $val->barcode ?></td>
                                <td><?= $val->ticket_type ?></td>
                                <td><?= $val->name ?></td>
                                <td><?= $val->play_date ?></td>
                                <td><?= $val->qty ?></td>
                                <td><!-- <a href="<?= base_url('session/edit/'.$val->id) ?>"> --><button onclick="ticket_detail(<?= $val->id ?>, 1)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-tooltip title="Approve Payment" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button><!-- </a> -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
                <li>
                    <table id="dt_default2" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Order ID</th>
                                <th>Barcode</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Play Date</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($get_accept->result() as $val) { ?>

                            <?= ($val->payment_status == 2 ? '<tr style="background: #ccc">' : '<tr>') ?>
                            
                                <td><?= $no++ ?></td>
                                <td><?= date('d-m-Y', strtotime($val->order_date)) ?></td>
                                <td><?= $val->order_id ?></td>
                                <td><?= $val->barcode ?></td>
                                <td><?= $val->ticket_type ?></td>
                                <td><?= $val->name ?></td>
                                <td><?= $val->play_date ?></td>
                                <td><?= $val->qty ?></td>
                                <td><!-- <a href="<?= base_url('session/edit/'.$val->id) ?>"> --><button onclick="ticket_detail(<?= $val->id ?>, 2)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false" data-uk-tooltip title="detail"><i class="uk-icon-edit uk-icon-small"></i></button><!-- </a> -->

                                <button onclick="ticket_detail(<?= $val->id ?>, 4)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-history uk-icon-small" data-uk-tooltip title="Reschedule"></i></button>

                                <?php if (empty($val->status_generate)) { ?>
                                    <button onclick="ticket_detail(<?= $val->id ?>, 5)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false" data-uk-tooltip title="Generate Barcode"><i class="uk-icon-barcode uk-icon-small"></i></button>
                                <?php } ?>
                                
                                </td>
                                <!-- <button onclick="payment_detail(<?= $val->id ?>)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-eye uk-icon-small"></i></button>
                                </td> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
                <li>
                    <table id="dt_default3" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Order ID</th>
                                <th>Barcode</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Play Date</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($get_reject->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d-m-Y', strtotime($val->order_date)) ?></td>
                                <td><?= $val->order_id ?></td>
                                <td><?= $val->barcode ?></td>
                                <td><?= $val->ticket_type ?></td>
                                <td><?= $val->name ?></td>
                                <td><?= $val->play_date ?></td>
                                <td><?= $val->qty ?></td>
                                <td><!-- <a href="<?= base_url('session/edit/'.$val->id) ?>"> --><button onclick="ticket_detail(<?= $val->id ?>, 3)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-tooltip title="Detail" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button><!-- </a> --></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
                <li>
                    <table id="dt_default4" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Order ID</th>
                                <th>Barcode</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Play Date</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($get_reschedule->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d-m-Y', strtotime($val->order_date)) ?></td>
                                <td><?= $val->order_id ?></td>
                                <td><?= $val->barcode ?></td>
                                <td><?= $val->ticket_type ?></td>
                                <td><?= $val->name ?></td>
                                <td><?= $val->play_date ?></td>
                                <td><?= $val->qty ?></td>
                                <td><!-- <a href="<?= base_url('session/edit/'.$val->id) ?>"> --><button onclick="ticket_detail(<?= $val->id ?>, 2)" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-tooltip title="Detail" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></button><!-- </a> --></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

        <div class="uk-modal" id="m_detail">
            <div class="uk-modal-dialog">
                <div class="uk-modal-header">
                    <h3 id="m_title" class="uk-modal-title">Ticket Detail</h3>
                </div>
                <div class="uk-width-small" style="padding-left: 40px">
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">Order Date</span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_order_date">
                            <span class="uk-text-large uk-text-middle"><a href="#"></a></span>
                        </div>
                    </div>
                    <!-- <hr class="uk-grid-divider"> -->
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">Order ID</span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_order_id">
                            <span class="uk-text-large uk-text-middle"></span>
                        </div>
                    </div>
                    <!-- <hr class="uk-grid-divider"> -->
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">Name</span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_name">
                            
                        </div>
                    </div>
                    <!-- <hr class="uk-grid-divider"> -->
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">Phone</span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_phone">
                            
                        </div>
                    </div>
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-width-large-1-3">
                            <span class="uk-text-muted uk-text-small">Email</span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_email">
                            
                        </div>
                    </div>
                    <input type="hidden" value="<?= $category_row ?>" id="category_row">
                    <br>
                    <?php for($i=0; $i<$category_row; $i++) { ?>
                    <div class="uk-grid uk-grid-small" id="m_header_qty<?= $i ?>">
                        <div class="uk-width-large-1-3" id="m_label_qty<?= $i ?>">
                            <span class="uk-text-muted uk-text-small"></span>
                        </div>
                        <div class="uk-width-large-2-3" id="m_qty<?= $i ?>">
                        </div>
                    </div>
                    <?php } ?>

                    <!-- <?php $count=0; foreach ($ticket_category as $key => $value) { 
                        if($qty[$key] != '') {
                    ?>
                        <tr><td><?= ($count == 0 ? 'Qty' : '') ?></td><td>:</td><td><?= number_format($qty[$key], 0, ',', '.') ?> × <?= $value ?></td></tr>
                    <?php $count++; } } ?> -->

                </div>
                <div style="padding-top: 10px" class="uk-overflow-container">
                    <table class="uk-table" id="t_detail">
                        <thead>
                            <tr>
                                <th>Date Play</th>
                                <th>Sesi Play</th>
                                <!-- <th>@Harga</th> -->
                                <!-- <th>Qty</th> -->
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <!-- <td></td> -->
                                <!-- <td></td> -->
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <form method="post" enctype="multipart/form-data" id="p_form" action="<?= admin_url('ticket_order/approval') ?>">
                <input type="hidden" name="p_id" id="p_id">

            <div class="uk-grid" id="approval">
                <div style="padding-top: 5px;padding-left: 150px;" class="uk-width-medium-1-2">
                    <!-- <span class="icheck-inline"> -->
                    <p>
                        <input type="radio" value="1" name="payment_status" id="radio_demo_inline_1" data-md-icheck required />
                        <label for="radio_demo_inline_1" class="inline-label">Accept</label>
                    </p>
                    <!-- </span> -->
                    <!-- <span class="icheck-inline"> -->
                    <p>
                        <input type="radio" value="0" name="payment_status" id="radio_demo_inline_2" data-md-icheck required />
                        <label for="radio_demo_inline_2" class="inline-label">Reject</label>
                    </p>
                    <!-- </span> -->
                    <!-- <span class="icheck-inline"> -->
                        
                        <!-- <input type="file" name="attach" id="attachment" data-md-icheck /> -->
                        <!-- <span class="uk-form-help-block">Attach a file (JPG/PNG)</span> -->
                        <!-- <div class="uk-width-1-1"> -->
                <!-- <div id="file_upload-drop" class="uk-file-upload"> -->
                    <!-- <p class="uk-text">Drop file to upload</p>
                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p> -->
                    <!-- <label style="padding-right: 20px" for="attachment" class="inline-label">Attachment: </label>
                    <a class="uk-form-file md-btn">choose file<input name="attach" id="file_upload-select" type="file"></a> -->
                <!-- </div> -->
                <!-- <div id="file_upload-progressbar" class="uk-progress uk-hidden"> -->
                    <!-- <div class="uk-progress-bar" style="width:0">0%</div> -->
                <!-- </div> -->
            <!-- </div> -->
                    <!-- </span> -->
                </div>

                <div class="uk-width-medium-1-2" style="padding-left: 0">
                    <span class="icheck-inline">
                        <label style="padding-right: 10px" for="attachment" class="inline-label">Attachment: </label>
                        <a class="uk-form-file md-btn">choose file<input name="attach" id="file_upload-select" type="file"></a>
                    </span>
                </div>
            </div>

            <div class="uk-grid" id="reschedule">
                <div style="padding-top: 25px;padding-left: 150px;" class="uk-width-medium-1-2">
                    <label for="select_date">New Play Date:</label>
                                
                </div>

                <div class="uk-width-medium-1-2" style="padding-left: 0">

                    <!-- <select id="select_date2" class="uk-hidden">
                        <option>1</option>
                        <option>2</option>
                    </select> -->
                    <div class="uk-form-row" id="select_date2">
                    <select name="select_holiday" id="select_holiday" data-md-selectize>
                        <option value="">Pick holiday from lists..</option>
                        <?php
                            foreach ($holiday_list as $val) 
                            {
                                echo '<option value="'.$val[0].' - '.$val[1].'">'.$val[2].'</option>';
                            }
                        ?>
                    </select>
                    </div>

                    <div class="uk-form-row">
                    <input name="select_date" id="select_date1" required>
                    </div>

                </div>
            </div>

            <div class="uk-grid" id="generate">
                <div style="padding-top: 5px;padding-left: 150px;" class="uk-width-medium-1-2">
                    <p>
                        <input type="radio" value="3" name="generate_barcode" id="generate_one" data-md-icheck required />
                        <label for="generate_one" class="inline-label">Generate</label>
                    </p>
                </div>
            </div>
                    
                    <span class="uk-form-help-block" style="margin-top: 20px">Payment Status & Detail</span>
                <div class="uk-modal-footer uk-text-right" style="margin-top: 0;padding-top: 0">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Back</button><button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" id="confirm">Confirm</button>
                </div>
                <input type="hidden" name="session_full" id="session_full">
                <input type="hidden" name="phone_strip" id="phone_strip">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() 
    {
        $('#dt_default2, #dt_default3, #dt_default4').DataTable();
    })

    $('#create').on("click", function(){
        $.ajax({
            type: "POST",
            // dataType: "json",
            url: "<?= base_url('session/check') ?>",
            // data: values ,
            success: function (response) {
                // console.log(response);
                if(response == 1)
                {
                    UIkit.modal.alert("All session type has been created!");
                    return false;
                }
                else
                {
                    window.location.href = '<?= base_url('session/create') ?>';
                }
            }
        });
    })

    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function ticket_detail(id='', no='') 
    {
        if(no == 2 || no == 3)
        {
            $('#select_date1').val('');
            $('#approval').addClass('uk-hidden');
            $('#confirm').addClass('uk-hidden');
            $('#reschedule').addClass('uk-hidden');
            $('#generate').addClass('uk-hidden');
            $('#m_title').html('Ticket Detail');

            $('input[name="payment_status"]').removeAttr("required");
            $('input[name="generate_barcode"]').removeAttr("required");
        }
        else if(no == 4)
        {
            $('#select_date1').val('');
            $('#approval').addClass('uk-hidden');
            $('#confirm').removeClass('uk-hidden').addClass('uk-show');
            $('#reschedule').removeClass('uk-hidden').addClass('uk-show');
            $('#generate').addClass('uk-hidden');
            $('#m_title').html('Reschedule Ticket');

            $('input[name="payment_status"]').removeAttr("required");
            $('input[name="generate_barcode"]').removeAttr("required");
            $('#select_date1').prop("required", true);
            // $('#select_holiday').prop("required", true);
        }
        else if(no == 5)
        {
            $('#select_date1').val('');
            console.log('masuk generate');
            $('#approval').addClass('uk-hidden');
            $('#confirm').removeClass('uk-hidden').addClass('uk-show');
            $('#reschedule').addClass('uk-hidden');
            $('#generate').removeClass('uk-hidden').addClass('uk-show');
            $('#m_title').html('Generate Barcode');
            
            $('input[name="payment_status"]').removeAttr("required");
            $('input[name="generate_barcode"]').prop("required", true);
            $('#select_date1').removeAttr("required");
        }
        else
        {
            $('#select_date1').val('');
            console.log('masuk sini');
            $('#approval').removeClass('uk-hidden');
            $('#confirm').removeClass('uk-hidden');
            $('#reschedule').addClass('uk-hidden');
            $('#generate').addClass('uk-hidden');
            $('#m_title').html('Ticket Detail');

            $('input[name="payment_status"]').prop("required", true);
            $('input[name="generate_barcode"]').removeAttr("required");
            $('#select_date1').removeAttr("required");
            // $('#select_holiday').removeAttr("required");
        }

        // console.log(id);
        $.ajax({
            type: "POST",
            // dataType: "json",
            url: "<?= admin_url('ticket_order/detail') ?>",
            data: {'id': id},
            success: function (response) {
                var obj = JSON.parse(response);
                var row = obj.length;
                console.log(obj[0]);

                // var obj = jQuery.parseJSON(response);
                var id = JSON.parse(obj[0].id);
                var ses1 = JSON.parse(obj[0].session1);
                var ses2 = JSON.parse(obj[0].session2);
                var session_type = JSON.parse(obj[0].session_type);
                var session_choice = JSON.parse(obj[0].session_choice);
                var s_type = '';
                (session_choice == 1 ? s_type = ses1 : s_type = ses2);
                var day = JSON.parse(obj[0].day);
                var holiday = JSON.parse(obj[0].holiday);
                var email = obj[0].email;
                var name = obj[0].name;
                var order_date = obj[0].order_date;
                var order_id = obj[0].order_id;
                var phone = obj[0].phone;
                var play_date = obj[0].p_date;
                var price = obj[0].price;
                var price_total = obj[0].price_total;
                var qty = obj[0].qty;
                var total = obj[0].total;
                var category_row   = $('#category_row').val();

                $('#m_order_date').text(order_date);
                $('#m_order_id').text(order_id);
                $('#m_name').text(name);
                $('#m_phone').text(phone.substr(0, 4)+' - '+phone.substr(4, 4)+' - '+phone.substr(8, 4));
                $('#m_email').text(email);
                $('#p_id').val(id);


                for(count=0; count<category_row; count++)
                {
                    $('#m_label_qty'+count).text('');
                    $('#m_qty'+count).text('');
                }

                for(count=0; count<row; count++)
                {
                    if(count==0)
                    {
                        $('#m_label_qty'+count).text('Qty');
                    }
                    else
                    {
                        $('#m_label_qty'+count).text('');
                    }

                    $('#m_qty'+count).text(number_format(obj[count].total, 0, ',', '.')+' × '+obj[count].category_name+' ('+obj[count].age_range+') '+'@Rp '+number_format(obj[count].price, 0, ',', '.'));
                }


                $('#t_detail').find('td:eq(0)').text(play_date);
                $('#t_detail tr').find('td:eq(1)').text('Session '+session_choice+': '+s_type[0]+' s/d '+s_type[1]+' ('+s_type[2]+' hours)');
                // $('#t_detail').find('td:eq(2)').text(number_format(price, 0, ',', '.'));
                // $('#t_detail').find('td:eq(3)').text(number_format(qty, 0, ',', '.'));
                $('#t_detail').find('td:eq(2)').text('Rp '+number_format(price_total, 0, ',', '.'));

                $('#session_full').val('Session '+session_choice+': '+s_type[0]+' s/d '+s_type[1]+' ('+s_type[2]+' hours)');
                $('#phone_strip').val(phone.substr(0, 4)+' - '+phone.substr(4, 4)+' - '+phone.substr(8, 4));

                // var selected_session = $('input[name="session[]"]:checked').val();
                // var price_total      = parseInt($('#priceval').val()) * parseInt($('#qty').val());
                // var rand             = Math.floor(Math.random() * 499) + 100;
                // var slice            = price_total.toString().slice(0, -3);
                // var final_price      = parseInt(slice+rand);
                // var phone            = $('#masked_phone').val();
                // var m_phone          = phone.substr(0, 4)+' - '+phone.substr(4, 4)+' - '+phone.substr(8, 4);
                // $('#price_total').val(final_price);
                // $('#m_name').text($('#name').val());
                // $('#m_phone').text(m_phone);
                // $('#phone_strip').val(m_phone);
                // $('#m_email').text($('#masked_email').val());
                // var format_date = $('#select_date').val().split('.');
                // $('#date_modal').kendoDatePicker({
                //   format: "MMMM",
                //   value: new Date(0, format_date[1]-1)
                // })
                // console.log(format_date);
                // $('#m_date').text(format_date[0] + ' ' + $('#date_modal').val() + ' ' + format_date[2]);
                // $('#play_date').val(format_date[0] + ' ' + $('#date_modal').val() + ' ' + format_date[2]);
                // $('#m_session').text($("#session"+selected_session).text());
                // $('#session_type').val($("#session"+selected_session).text());
                // $('#span_qty').text(number_format($('#qty').val(), 0, ',', '.')+' × ');
                // $('#span_price').text('@'+$('#price').val());
                // $('#m_price').html('Rp '+number_format(final_price, 0, ',', '.')+' <p style="color: red;font-size: 9px;">+ Kode unik anda adalah: '+final_price.toString().slice(-3)+'</p>');
                // $('#price_formated').val('Rp '+number_format(final_price, 0, ',', '.'));
                // console.log(session_type);

                if(session_type == 1)
                {
                    var filter = ["sa", "su"];
                }
                else if(session_type == 2)
                {
                    var filter = ["mo", "tu", "we", "th", "fr"];
                }
                else
                {
                    var filter = 0;
                }

                if(filter != 0)
                {
                    $('#select_date2').addClass('uk-hidden');
                    $('#select_date1').kendoDatePicker({
                      format: "dd.MM.yyyy",
                      // value: new Date(2019, 8, 7),
                      disableDates: filter,
                      min: new Date(2019, 8, 7),

                        change: function() {

                            var value = $('#select_date').val();
                            // console.log(value);
                            $.ajax({
                                type: "POST",
                                // dataType: "json",
                                url: "<?= base_url('order/check_date') ?>",
                                data: {'date': value},
                                success: function (response) {

                                }
                            });

                        }

                    });
                    
                }
                else
                {
                    $('#select_date2').removeClass('uk-hidden');
                    $('#select_date1').kendoDatePicker({
                      format: "dd.MM.yyyy",
                      disableDates: ["mo", "tu", "we", "th", "fr", "sa", "su"]

                    });
                }

                

                UIkit.modal('#m_detail').show();

                // var price = jQuery.parseJSON(obj.price);
                // var type = jQuery.parseJSON(obj.type);

                // //Ubah session
                // if(type == 1)
                // {
                //     $('#seg3_ses2').hide();
                //     $('#radio_demo_inline_1').prop('checked', true).iCheck('update');
                // }
                // else
                // {
                //     $('#seg3_ses2').show();
                //     $('#radio_demo_inline_1').removeAttr('checked').iCheck('update');
                // }


                // $('#session1').html('Session 1: '+ses1[0]+' s/d '+ses1[1]+' ('+ses1[2]+' hours)');
                // $('#session2').html('Session 2: '+ses2[0]+' s/d '+ses2[1]+' ('+ses2[2]+' hours)');
                // // $('#radio_demo_inline_1').val(ses1[0]+ses1[1]+ses1[2]);
                // // $('#radio_demo_inline_2').val(ses2[0]+ses2[1]+ses2[2]);
                // $('#price').val('Rp '+number_format(price, 0, ',', '.'));
                // $('#priceval').val(price);
            }
        });
    }


    $("#select_holiday").change(function(){
        console.log($(this).val());
        var range = $(this).val().split(' - ');
        var min = range[0].split('.');
        var max = range[1].split('.');
        
        $('#select_date1').kendoDatePicker({
            format: "dd.MM.yyyy",
            min: new Date(min[2], min[1], min[0]),
            max: new Date(max[2], max[1], max[0])
        });
        $('#select_date1').val('');
    });

</script>
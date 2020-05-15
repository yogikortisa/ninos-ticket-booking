<?php echo $script_captcha; // javascript recaptcha ?>
<form method="post" id="form_validation2" data-parsley-validate="" action="<?= base_url('order/ticket_process') ?>">
    <div class="md-card uk-width-large-2-3 uk-container-center">
        <div class="md-card-content large-padding">
            <div class="uk-grid uk-grid-collapse">
                <!-- <div>
                    <a href="<?= base_url('tiket'); ?>">
                        <img class="logo_regular" src="<?= base_url('assets/logo/ninos.png') ?>" alt="" />
                    </a>
                </div> -->
                <div class="uk-width-medium-1-3">
                    <!-- <div class="md-card"> -->
                        <!-- <div class="md-card-content"> -->
                            <a href="<?= base_url(); ?>">
                                <img class="logo_regular" src="<?= base_url('assets/logo/ninos.png') ?>" alt="" />
                            </a>
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
                <div class="uk-width-medium-2-3">
                    <!-- <div class="md-card"> -->
                        <!-- <div class="md-card-content"> -->
                            <!-- Officiis nemo soluta eaque blanditiis harum tempora nam dicta non necessitatibus exercitationem et cupiditate repellat ipsum veritatis reiciendis nostrum ea omnis id temporibus totam. -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">Ticket Booking</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Name<span class="req">*</span></label>
                                                <input onkeyup="this.value = this.value.toUpperCase();" type="text" name="name" id="name" class="md-input" data-parsley-pattern="[a-z A-Z]+" required />
                                                <input type="hidden" value="<?= $category_row ?>" id="category_row">
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="masked_phone">Phone<span class="req">*</span></label>
                                                <input name="phone" class="md-input" id="masked_phone" type="text" data-parsley-type="number" data-parsley-length="[9, 13]" required />
                                                <input type="hidden" name="phone_strip" id="phone_strip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="masked_email">Email<span class="req">*</span></label>
                                                <input name="email" class="md-input" id="masked_email" type="text" data-inputmask-showmaskonhover="false" data-parsley-type="email" required />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div style="padding-top: 1px">
                                                <label for="select_date">Select date<span class="req">*</span></label>
                                                <input name="date" id="select_date" required>
                                                <input type="hidden" name="play_date" id="play_date">
                                                </div>
                                            </div>
                                            <input type="hidden" id="date_modal" required>
                                        </div>
                                    </div>
                                    <div class="uk-form-row parsley-row" id="segment3">
                                        <label>Session<span class="req" id="session_name">*</span></label>
                                        <p>
                                            <input type="radio" name="session[]" value="1" id="radio_demo_inline_1" data-md-icheck required />
                                            <label id="session1" for="radio_demo_inline_1" class="inline-label"></label>
                                        </p>
                                        <p id="seg3_ses2">
                                            <input type="radio" name="session[]" value="2" id="radio_demo_inline_2" data-md-icheck required />
                                            <label id="session2" for="radio_demo_inline_2" class="inline-label"></label>
                                        </p>
                                        <input type="hidden" name="session_full" id="session_full">
                                        
                                    </div>

                                    <div class="uk-form-row" id="segment4">
                                        <!-- <div class="uk-grid" data-uk-grid-margin> -->

                                        <?php for($i=0;$i<$category_row;$i++) { ?>
                                                


                                    <ul class="uk-nestable <?= ($i == ($category_row - 1)) ? 'uk-hidden' : '' ?>" id="nestable<?= $i ?>">
                                        <li data-id="1" class="uk-nestable-item">
                                            <div class="uk-nestable-panel">
                                                <div style="float: left;padding-top: 15px" id="age<?= $i ?>">
                                                    Toddler (2 - 3 Years)<span class="req">*</span>
                                                </div>
                                                <input type="hidden" name="ticket_category[]" id="ticket_category<?= $i ?>">
                                                <input type="hidden" name="id_category[]" id="id_category<?= $i ?>">
                                                <input type="hidden" name="ticket_id[]" id="ticket_id<?= $i ?>">
                                                <input type="hidden" name="quota[]" id="quota<?= $i ?>">
                                                <input id="priceval<?= $i ?>" name="price[]" value="0" type="hidden">

                                                <div style="float: right;width: 20%">
                                                <input name="qty[]" id="qty<?= $i ?>" data-parsley-type="integer" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" type="number" min="1" class="md-input" placeholder="Qty*" required />
                                                </div>
                                                <div style="clear: both">
                                            </div>

                                        </li>
                                        
                                    </ul>
                                        <?php } ?>

                                        <!-- </div> -->
                                    </div>
                                                <input id="price_total" name="price_total" value="0" type="hidden">
                                                <input id="price_formated" name="price_formated" value="0" type="hidden">

                                    <!-- <div class="uk-form-row" id="segment4">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label style="color: #333">@Price</label>
                                                <input id="price" type="text" class="md-input" value="0" disabled="disabled" />
                                                <input id="priceval" name="price" value="0" type="hidden">
                                                <input id="price_total" name="price_total" value="0" type="hidden">
                                                <input id="price_formated" name="price_formated" value="0" type="hidden">
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Qty<span class="req">*</span></label>
                                                <input name="qty" id="qty" data-parsley-type="integer" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" type="number" min="1" class="md-input" required  />
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="uk-form-row" id="segment5" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <?php echo $captcha // tampilkan recaptcha ?>
                                        </div>
                                        <p id="captcha_response" style="color:red !important" class="error-captcha uk-hidden"><span> The captcha is required.</span></p>
                                    </div>
                                    <!-- <div class="uk-form-row">
                                        <label>Price</label>
                                        <input type="text" class="md-input" value="100.00" disabled="disabled" />
                                    </div>
                                    <div class="uk-form-row">
                                        <label>Qty</label>
                                        <input type="number" min="0" class="md-input"  />
                                    </div> -->
                                </div>
                            </div>
                            <div style="margin-top: 20px;" align="right"><!-- <button id="segment5" class="md-btn md-btn-primary" type="submit">Next</button> --> <button id="segment6" class="md-btn md-btn-primary">Next</button></div>
                            <div class="uk-modal" id="modal_confirm">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Ticket Detail <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="here is detail of your ticket">&#xE8FD;</i></h3>
                                    </div>
                                    <div class="uk-width-small" style="padding-left: 40px">
                                        <!-- <div class="md-card"> -->
                                            <!-- <div class="md-card-toolbar">
                                                <h3 class="md-card-toolbar-heading-text">
                                                    Details
                                                </h3>
                                            </div> -->
                                            <!-- <div class="md-card-content"> -->
                                                <!-- <div class="uk-grid uk-grid-divider uk-grid-medium"> -->
                                                    <!-- <div class="uk-width-large-1-1"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Name</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_name">
                                                                <span class="uk-text-large uk-text-middle"><a href="#"></a></span>
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Phone</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_phone">
                                                                <span class="uk-text-large uk-text-middle"></span>
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Email</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_email">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Date</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_date">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Session</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_session">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <?php for($i=0; $i<$category_row; $i++) { ?>
                                                        <div class="uk-grid uk-grid-small" id="span_category_qty<?= $i ?>">
                                                            <div class="uk-width-large-1-3">
                                                                <?php if($i==0) { ?>
                                                                <span id="span_category<?= $i ?>" class="uk-text-muted uk-text-small">Qty</span>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_qty">
                                                                <div id="span_qty<?= $i ?>" style="float: left"></div>
                                                                <div id="span_price<?= $i ?>" style="text-indent: 10px"></div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        <div class="uk-grid uk-grid-small">
                                                            <div class="uk-width-large-1-3">
                                                                <span class="uk-text-muted uk-text-small">Price Total</span>
                                                            </div>
                                                            <div class="uk-width-large-2-3" id="m_price">
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- <hr class="uk-grid-divider"> -->
                                                        
                                                        
                                                        <!-- <hr class="uk-grid-divider uk-hidden-large"> -->
                                                    <!-- </div> -->
                                                    <!-- <div class="uk-width-large-1-2">
                                                        <p>
                                                            <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Tags</span>
                                                            <span class="uk-badge uk-badge-success">LTE</span>
                                                            <span class="uk-badge uk-badge-primary">Quad HD</span>
                                                            <span class="uk-badge uk-badge-success">Android™ 5.0</span>
                                                            <span class="uk-badge uk-badge-success">64GB</span>
                                                        </p>
                                                        <hr class="uk-grid-divider">
                                                        <p>
                                                            <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Description</span>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam necessitatibus suscipit velit voluptatibus! Ab accusamus ad adipisci alias aliquid at atque consectetur, dicta dignissimos, distinctio dolores esse fugiat iste laborum libero magni maiores maxime modi nemo neque, nesciunt nisi nulla optio placeat quas quia quibusdam quis saepe sit ullam!
                                                        </p>
                                                    </div> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Back</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary" id="confirm">Confirm</button>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-modal" id="modal_new">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <center><p class="uk-text-bold">Terima kasih telah memesan tiket ninos</p></center>
                                    <p>- Silahkan cek email anda untuk konfirmasi pembayaran</p>
                                    <p>- Waktu Maksimum transfer 1 x 24 jam</p>
                                </div>
                            </div>
                            <div class="uk-modal" id="modal_new2">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <p class="uk-text-bold">Error</p>
                                    <p>Maaf, terjadi kesalahan. Silahkan ulangi kembali, terima kasih.</p>
                                </div>
                            </div>
                            <div class="uk-modal" id="modal_new3">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                    <p class="uk-text-bold">Error</p>
                                    <p>Sorry, quota is not available.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    
    <script>
    $( document ).ready(function() 
    {
        kendo.culture().calendar.firstDay= 1;
        // $("#confirm").on("click", function() {
        //     console.log(31337);
        //   $("#form_validation2").submit();
        // });




        // var datepicker = UIkit.datepicker($('#seldate'), { /* options */ });
        $('#select_date').kendoDatePicker({
          format: "dd.MM.yyyy",
          firstDay: 3,
          // value: new Date(2019, 8, 7),
          disableDates: ["mo"],
          min: new Date(2019, 8, 7),
          max: new Date(2019, 10, 7),

            change: function() {
                $('#segment3, #segment4, #segment5, #segment6').show();

                var value = $('#select_date').val();
                // console.log(value);
                $.ajax({
                    type: "POST",
                    // dataType: "json",
                    url: "<?= base_url('order/ticket_check') ?>",
                    data: {'date': value},
                    success: function (response) {

                        var arr_resp = response.split(' | ');

                        // console.log(jQuery.parseJSON(arr_resp[0]));
                        // console.log(jQuery.parseJSON(arr_resp[1]));
                        // console.log(jQuery.parseJSON(arr_resp[2]));

                        var obj = jQuery.parseJSON(arr_resp[0]);
                        var ses1 = jQuery.parseJSON(obj.session1);
                        var ses2 = jQuery.parseJSON(obj.session2);
                        var day = jQuery.parseJSON(obj.day);
                        var holiday = jQuery.parseJSON(obj.holiday);
                        var price = jQuery.parseJSON(obj.price);
                        var type = jQuery.parseJSON(obj.type);
                        var ticket_id = jQuery.parseJSON(obj.ticket_id);
                        var session_name = obj.session_name;
                        var quota_sess1 = obj.quota_sess1;
                        var quota_sess2 = obj.quota_sess2
                        
                        //Ubah session
                        if(type == 1)
                        {
                            $('.uk-nestable').removeAttr("hidden", "hidden");
                            $('#seg3_ses2').hide();
                            $('#radio_demo_inline_1').prop('checked', true).iCheck('update');

                            $.each( arr_resp, function( key, value ) 
                            {
                                var val = jQuery.parseJSON(value);
                                // console.log(val.category_name);
                                
                                $('#qty'+key).attr("max", val.quota_sess1);
                                $('#age'+key).html(val.category_name+' ('+val.age_range+') <br>@Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                // $('#price'+key).val('Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                $('#priceval'+key).val(val.price);
                                $('#ticket_id'+key).val(val.ticket_id);
                                $('#quota'+key).val(val.quota_sess1);
                                $('#id_category'+key).val(val.id_category);
                                
                            });
                        }
                        else
                        {
                            
                            $('.uk-nestable').attr("hidden", "hidden");
                            $('#seg3_ses2').show();
                            $('#radio_demo_inline_1').removeAttr('checked').iCheck('update');

                            $('#radio_demo_inline_1').on('ifChecked', function () { 
                                $('.uk-nestable').removeAttr("hidden", "hidden");
                                $.each( arr_resp, function( key, value ) 
                                {
                                    var val = jQuery.parseJSON(value);
                                    // console.log(val.category_name);
                                    
                                    $('#qty'+key).attr("max", val.quota_sess1);
                                    $('#age'+key).html(val.category_name+' ('+val.age_range+') <br>@Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                    // $('#price'+key).val('Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                    $('#priceval'+key).val(val.price);
                                    $('#ticket_id'+key).val(val.ticket_id);
                                    $('#quota'+key).val(val.quota_sess1);
                                    $('#id_category'+key).val(val.id_category);
                                    
                                });
                             })

                            $('#radio_demo_inline_2').on('ifChecked', function () { 
                                $('.uk-nestable').removeAttr("hidden", "hidden");
                                $.each( arr_resp, function( key, value ) 
                                {
                                    var val = jQuery.parseJSON(value);
                                    // console.log(val.category_name);
                                    
                                    $('#qty'+key).attr("max", val.quota_sess2);
                                    $('#age'+key).html(val.category_name+' ('+val.age_range+') <br>@Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                    // $('#price'+key).val('Rp '+number_format(jQuery.parseJSON(val.price), 0, ',', '.'));
                                    $('#priceval'+key).val(val.price);
                                    $('#ticket_id'+key).val(val.ticket_id);
                                    $('#quota'+key).val(val.quota_sess2);
                                    $('#id_category'+key).val(val.id_category);
                                });
                             })
                        }


                        $('#session1').html('Session 1: '+ses1[0]+' s/d '+ses1[1]+' ('+ses1[2]+' hours)');
                        $('#session2').html('Session 2: '+ses2[0]+' s/d '+ses2[1]+' ('+ses2[2]+' hours)');
                        $('#session_name').text(' - '+session_name+'*');
                        // $('#radio_demo_inline_1').val(ses1[0]+ses1[1]+ses1[2]);
                        // $('#radio_demo_inline_2').val(ses2[0]+ses2[1]+ses2[2]);

                        

                        



                        // if(response == 1)
                        // {
                        //     UIkit.modal.alert(response);
                        //     return false;
                        // }
                        // else
                        // {
                        //     window.location.href = '<?= base_url('session/create') ?>';
                        // }
                    }
                });

            }

        });
        // var $seldate = $('#select_date');
        // var datepicker = UIkit.datepicker($seldate, {
        //     format:'DD.MM.YYYY',
        //     disableDates: [1,2]
        // });

        // $dp_start.on('change',function() {
        //     end_date.options.minDate = $dp_start.val();
        //     setTimeout(function() {
        //         $dp_end.focus();
        //     },300);
        // });

        // $dp_end.on('change',function() {
        //     start_date.options.maxDate = $dp_end.val();
        // });


            // $('.uk-datepicker-table td:nth-child(6), .uk-datepicker-table td:nth-child(7)').each(function() {
            //     var replace = $(this).text();
            //     $(this).html(replace).addClass('my-mute-class');
            // });
            $('#segment3, #segment4, #segment5, #segment6').hide();
    });

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

    // $("#select_date").change(function() {
    //     $('#segment3, #segment4, #segment5, #segment6').show();
    // });

    // $(function () {
      $('#form_validation2').parsley().on('form:validated', function() {
        
        var ok = $('.md-input-danger').length === 0;
        // console.log($('.md-input-danger').length);
        if(ok)
        {
            var selected_session = $('input[name="session[]"]:checked').val();

            var price_total = 0;
            for(var i=0; i<$('#category_row').val(); i++)
            {

                var price_subtotal      = parseInt($('#priceval'+i).val()) * parseInt($('#qty'+i).val() || 0);
                price_total             = price_total + price_subtotal;

                // console.log(parseInt($('#qty'+i).val()));
                console.log(price_total);
            }


            var rand             = Math.floor(Math.random() * 50) + 1;
            rand                 = (rand < 10 ? '0'+rand : rand)
            var slice            = price_total.toString().slice(0, -2);
            var final_price      = parseInt(slice+rand);
            // console.log($('#masked_phone').val().replace(/[_\W]+/g, ""));
            // console.log(rand);
            // console.log(slice);
            // console.log(final_price);

            var phone            = $('#masked_phone').val();
            var m_phone          = phone.substr(0, 4)+' - '+phone.substr(4, 4)+' - '+phone.substr(8, 4);
            // var phone            = $('#masked_phone').val().replace(/[^a-z0-9\s]/gi, "");

            // var i = 0, strLength = phone.length;
            // console.log(strLength);

            // for(i; i < strLength; i++) {
            //     phone      = phone.replace(" ", "-");
            // }

            $('#price_total').val(final_price);
            $('#price_formated').val('Rp '+number_format(final_price, 0, ',', '.'));

            
            $('#m_name').text($('#name').val());
            $('#m_phone').text(m_phone);
            $('#phone_strip').val(m_phone);
            $('#m_email').text($('#masked_email').val());

            var format_date = $('#select_date').val().split('.');
            $('#date_modal').kendoDatePicker({
              format: "MMMM",
              value: new Date(0, format_date[1]-1)
            })
            $('#date_modal').addClass('uk-hidden');
            // console.log(format_date);
            $('#m_date').text(format_date[0] + ' ' + $('#date_modal').val() + ' ' + format_date[2]);
            $('#play_date').val(format_date[0] + ' ' + $('#date_modal').val() + ' ' + format_date[2]);

            $('#m_session').text($("#session"+selected_session).text());
            $('#session_full').val($("#session"+selected_session).text());
            // $('#m_qty').text($('#qty').val()+' (@'+$('#price').val()+')');

            var count = 0;
            var row   = $('#category_row').val();
            // console.log($('#category_row').val());
            var b = 0;
            for(count=0; count<row; count++)
            {
                $('#span_qty'+count).text('');
                $('#span_price'+count).text('');
            }

            for(count=0; count<row; count++)
            {
                if(number_format($('#qty'+count).val(), 0, ',', '.') != 0)
                {
                    $('#span_qty'+(count-b)).text(number_format($('#qty'+count).val(), 0, ',', '.')+' × ');
                    $('#span_price'+(count-b)).text($('#age'+count).text());
                    console.log('hmmmmm');
                    console.log(count-b)
                }
                else
                {
                    b = 1;
                    // $('#span_qty'+count).remove();
                    // $('#span_price'+count).remove();
                }
                
                $('#ticket_category'+count).val($('#age'+count).text());
            };


            // $('#m_qty').
            // console.log(price_total);
            $('#m_price').html('Rp '+number_format(final_price, 0, ',', '.')+' <p style="color: red;font-size: 9px;">+ Kode unik anda adalah '+final_price.toString().slice(-2)+'</p>');
            

            /********** Check CAPTCHA *************/
            // $("#segment6").on("click", function() {
            var google_response = $('#g-recaptcha-response').val();
            if(!google_response)
            {
                // $('" ').insertAfter("#segment6");
                $('#captcha_response').removeClass('uk-hidden');
                return false;
            }
            else
            {
                $('#captcha_response').addClass('uk-hidden');
                UIkit.modal('#modal_confirm').show();
                return true;
            }
            // });

            
            // UIkit.modal('#modal_confirm', 'show', function() {
            //     console.log('masuk');
            //     // $("#form_validation2").submit();
            // })
            // console.log($("#session"+selected_session).text());
            
        }
        // $('.bs-callout-info').toggleClass('hidden', !ok);
        // $('.bs-callout-warning').toggleClass('hidden', ok);
        // UIkit.modal('#modal_confirm').show();
        // UIkit.modal('#modal_confirm').show();
      })
      .on('form:submit', function(event) {
        // console.log(666);
        // event.preventDefault();
        return false; // Don't submit form for this demo
      });
    // });

    // UIkit.modal('#modal_confirm').then(function() {
    //     console.log('Confirmed.')
    // }, function () {
    //     console.log('Rejected.')
    // });

    // $("#confirm").on("click", function() {
    //     console.log(31337);
    //   $("#form_validation2").submit();
    // });
    // $("#confirm").on("click", function() {
    //             console.log(31337);
    //           $("#form_validation2").unbind('submit').submit();
    //         });
    // $('#modal_new').on({

    //     'show.uk.modal': function(){
    //         // console.log("Modal is visible.");
    //         // $('.btn').removeClass('abc');
    //         var form = $('#form_validation2');
    //         $.post( form.attr("action"), form.serialize(), function(res){
    //             console.log(res);
    //         });
    //     },

    //     // 'hide.uk.modal': function(){
    //     //     console.log("Element is not visible.");
    //     //     // $("#form_validation2").unbind('submit').submit();
    //     // }
    // });



    $("#confirm").on("click", function() {
        var form = $('#form_validation2');
        $.post( form.attr("action"), form.serialize(), function(res){
            if(res == 1)
            {
                UIkit.modal('#modal_new').show();
            }
            else if(res == 2){
                UIkit.modal('#modal_new3').show();
            }
            else
            {
                UIkit.modal('#modal_new2').show();
            }
            // console.log(res);
        });
    });

    $('#modal_new, #modal_new2').on({
        'hide.uk.modal': function(){
            window.location.href = '<?= base_url() ?>';
        }
    });

    $("input[name='qty[]']").on("change", function() {
            
            if($(this).val().length === 0)
            {
                // console.log($("input[name='qty[]']").val().length);
              //   var arr = $("input[name='qty[]']")
              // .map(function(){return $(this).val();}).get();
              
                var arr = [];
                $("input[name='qty[]']").each(function() {
                    if($(this).val() != '')
                    {
                        arr.push($(this).val());
                    }
                })
// console.log(arr.length);
                if(arr.length === 0)
                {
                    $("input[name='qty[]']").attr("required", "required");
                    $("#form_validation2").parsley().validate();
                }

                // console.log(99999999);
            }
            else
            {
                $("input[name='qty[]']").removeAttr("required");
                $("#form_validation2").parsley().reset();
                // console.log(1313113);
            }
        });
    </script>
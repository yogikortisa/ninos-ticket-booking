<style type="text/css">
.colors {
  padding: 0.9em;
  color: #fff;
  display: none;
}
.yellow {
  color: #fff;
  background: #fff;
} 
.blue {
  background: #fff;
}
</style>
<div> <h3>Ticket Booking</h3> </div>
<form id="form_validation" action="<?= admin_url('school_member/save_ticket_process') ?>" method="post" class="uk-form-stacked">
    <div class="md-card">
        <div class="md-card-content">
            <input hidden="hidden"  type="text" name="id"  value="<?=$schoolorder->id?>">
            <input hidden="hidden" type="text" name="ticket_id"  value="<?=$schoolorder->id_ticket?>">
            <input hidden="hidden" type="text" name="total_pay"  value="<?=$schoolorder->total_pay?>">
            <input hidden="hidden" type="text" name="type" value="<?=$schoolorder->type?>">
            <input hidden="hidden" type="text" name="pcs" value="<?=$schoolorder->pcs?>" />
            <input hidden="hidden" type="text" name="price_ticket" value="<?=$schoolorder->price_ticket?>"/>
            <input hidden="hidden" type="text" name="order_id" value="<?=$schoolorder->order_id?>"/>
            <input hidden="hidden" type="text" name="barcode" value="<?=$schoolorder->barcode?>"/>
        </div>
        <!-- pihak pertama -->
        <div class="md-card-content">
            <!-- <b>PIHAK PERTAMA</b> -->
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Name School</label>
                                <input type="text" name="name" value="<?=$schoolorder->name_school?>" class="md-input" readonly="readonly"/>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?=$schoolorder->no_hp?>" class="md-input label-fixed" required readonly="readonly"/>
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row">
                       <div class="uk-input-group">
                        <span class="uk-input-group-addon">Select Date :</span>
                        <!-- <label>date</label> -->
                        <!-- <input type="text" name="play_date" id="val_birth" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (YYYY-MM-DD)" data-uk-datepicker="{format:'YYYY-MM-DD'}" /> -->
                        <input type="date" name="play_date" id="weekend-calendar">
                    </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <label>Email</label>
                        <input type="text" name="email" value="<?=$schoolorder->email?>" class="md-input" readonly="readonly" readonly="readonly"/>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <button type="submit" class="md-btn md-btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
function showdp() {
  var checkBox = document.getElementById("mydp");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

// select show
$(function() {
  $('#colorselector').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).show();
  });
});
// select show

// Arif hadi Saputra, [18.04.19 16:02]
//only number
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    //end only number

    // Hitung Total bayar
    function sum() {
          var rp1 = document.getElementById('rp').value;
          var pcs2 = document.getElementById('pcs').value;
          var makan3 = document.getElementById('makan').value;
          var result = (parseInt(rp1) * parseInt(pcs2) ) + (parseInt(makan3) * parseInt(pcs2));
          if (!isNaN(result)) {
            var nilai =  document.getElementById('totbayar').value = result;
          }
    }
    // End Hitung Total bayar

</script>
 <script>
        $(document).ready(function() {
            $("#weekend-calendar").kendoDatePicker({
                format: "dd.MM.yyyy",
                disableDates: ["sa", "su"],
                min: new Date(2019, 8, 7),
            });


            function compareDates(date, dates) {
                for (var i = 0; i < dates.length; i++) {
                    if (dates[i].getDate() == date.getDate() &&
                        dates[i].getMonth() == date.getMonth() &&
                        dates[i].getYear() == date.getYear()) {
                      return true
                    }
                }
            }

            $('#weekend-calendar').change(function () {
            var tanggal = $(this).val();

            $.ajax({
                type: "POST",
                url:"<?= admin_url('school_member/check_holiday') ?>",
                data: {'tanggal': tanggal}

            }).done(function (msg) {
                    if (msg == 1) {
                        $('#weekend-calendar').val('');
                        UIkit.modal.alert("Holiday Date Can't Selected! please choose another date");
                    }
            });
        });
        });
</script>
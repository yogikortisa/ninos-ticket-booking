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
<div> <h3>Register Issude Ticket</h3> </div>
<form id="form_validation" action="<?= base_url('admin/school_member/save_school_agreement') ?>" method="post" class="uk-form-stacked">
    <div class="md-card">
        <div class="md-card-content">
            <input type="text" name="idschool" hidden="hidden" value="<?=$detailschool->id?>">
        </div>
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Name</label>
                                <input type="text" name="nama_leader" value="<?=$detailschool->leader?>" class="md-input" readonly="readonly"/>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Position</label>
                                <input type="text" name="jabatan" class="md-input label-fixed" required />
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label>In this case acting for and on behalf of the school :</label>
                        <input type="text" name="nama_sekolah" value="<?=$detailschool->name_sekolah?>" class="md-input"  readonly="readonly"/>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <label>Address</label>
                        <input type="text" name="alamat" value="<?=$detailschool->addres?>" class="md-input" readonly="readonly"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-card-content">
            <b>FORM OF COOPERATION</b>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>Rp.</label>
                        <input type="text" name="harga_ticket" id="rp"  onkeyup="sum();" onkeypress="return hanyaAngka(event)" class="md-input" required/>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>pcs</label>
                        <input type="text" name="pcs" id="pcs"  onkeyup="sum();"  onkeypress="return hanyaAngka(event)" class="md-input" required/>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>Food Rp. / children</label>
                        <input type="text" name="makanan" id="makan"  onkeyup="sum();"  onkeypress="return hanyaAngka(event)" class="md-input" required/>
                    </div>
                </div>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <input type="text" placeholder="Total Value of Cooperation" name="total_bayar" id="totbayar"  onkeypress="return hanyaAngka(event)" class="md-input md-input-danger" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-card-content">
            Payment Type
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-width-medium-1-1">
                        <div class="parsley-row uk-margin-top">
                            <select id="colorselector" class="md-input" required>
                                <option value="">-- choose --</option>
                                <option value="lunas">Cash</option>
                                <option value="dp">DP</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <div class="output">
                            <div id="lunas" class="colors lunas">
                                <input type="text" name="lunas" onkeypress="return hanyaAngka(event)" class="md-input" placeholder="Cash amount" />
                            </div>
                            <div id="dp" class="colors dp">
                                <input type="text" name="dp" onkeypress="return hanyaAngka(event)" class="md-input" placeholder="DP amount" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-card-content">
            Cooperation Period
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>from</label>
                        <input type="text" name="p_dari" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (YYYY-MM-DD)" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>To</label>
                        <input type="text" name="p_sampai" id="val_birth" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date YYYY-MM-DD)" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="md-card-content">
            <b>PAYMENT INFORMATION</b>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label></label>
                        <input type="text" class="md-input" value="Payment Tempo :" disabled="disabled" />
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>%</label>
                            <input type="number" name="quantity" min="0" max="100" maxlength="3" class="md-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon">DP is paid at the latest :</span>
                        <label>date</label>
                        <input type="text" name="dp_date" id="val_birth" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (YYYY-MM-DD)" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                    </div>
                </div>
                <div class="uk-width-large-1-2 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon">Agreements and Repayments at the latest :</span>
                        <label>date</label>
                        <input type="text" name="lambat_dp" id="val_birth" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (YYYY-MM-DD)" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
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
                                <!-- <span class="uk-input-group-addon"><a class="md-btn md-btn-danger" href="<?php echo admin_url('school_member/list_data')?>">Back</a></span> -->
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
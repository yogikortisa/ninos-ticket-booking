<h3 class="heading_b uk-margin-bottom">School Group List</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-width-1-1">
            <ul class="uk-tab" data-uk-tab="{connect:'#tabs_1_content'}" id="tabs_1">
                <li class="uk-active"><a href="#">List</a></li>
                <li><a href="#">Active</a></li>
                <li class="named_tab"><a href="#">Non-Active</a></li>
            </ul>
            <ul id="tabs_1_content" class="uk-switcher uk-margin">
                <li>
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                       <button class="md-btn md-btn-primary" data-uk-modal="{target:'#modal_form_create'}">Create</button>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>School Name</th>
                                <th>Type School</th>
                                <th>Sub-district</th>
                                <th>Qty User</th>
                                <th>Leader</th>
                                <th>No HP</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>Order Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no=1; foreach ($datalist->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val->name ?></td>
                                <td><?= $val->nametype ?></td>
                                <td><?= $val->sub_district ?></td>
                                <td><?= $val->qty_user ?></td>
                                <td><?= $val->leader ?></td>
                                <td><?= $val->no_hp ?></td>
                                <td><?= $val->email ?></td>
                                <td><?= $val->addres ?></td>
                                <td>
                                    <a href="<?= admin_url('school_member/school_agreement/'.$val->id) ?>" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-edit uk-icon-small"></i></a>
                                    <a href="<?= admin_url('school_member/delete_list/'.$val->id) ?>" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="material-icons uk-icon-small">delete</i></a>
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
                                <th>School Name</th>
                                <!-- <th>Type School</th> -->
                                <!-- <th>Sub-district</th> -->
                                <th>Qty User</th>
                                <th>Leader</th>
                                <th>No HP</th>
                                <th>E-mail</th>
                                <!-- <th>Address</th> -->
                                <th>Booking ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no=1; foreach ($listactive->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val->name_school ?></td>
                                <!-- <td><?= $val->nametype ?></td> -->
                               <!--  <td><?= $val->sub_district ?></td> -->
                                <td><?= $val->pcs ?></td>
                                <td><?= $val->name_leader ?></td>
                                <td><?= $val->no_hp ?></td>
                                <td><?= $val->email ?></td>
                                <!-- <td><?= $val->addres ?></td> -->
                                <td><a href="<?= admin_url('school_member/order_ticket/'.$val->id) ?>" class="md-btn md-btn-mini md-btn-wave" type="button" ><i class="uk-icon-ticket uk-icon-small"></i></a>
                                    <a href="<?= admin_url('school_member/printpdf/'.$val->id) ?>" target="_blank" class="md-btn md-btn-mini md-btn-wave" type="button" data-uk-button="" aria-pressed="false"><i class="uk-icon-print uk-icon-small"></i></a>
                                </td>
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
                                <th>School Name</th>
                                <!-- <th>Type School</th> -->
                                <!-- <th>Sub-district</th> -->
                                <th>Qty User</th>
                                <th>Leader</th>
                                <th>No HP</th>
                                <th>E-mail</th>
                                <!-- <th>Address</th> -->
                                <!-- <th>Booking ticket</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($listnonactive->result() as $val) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val->name_school ?></td>
                                <!-- <td><?= $val->nametype ?></td> -->
                               <!--  <td><?= $val->sub_district ?></td> -->
                                <td><?= $val->pcs ?></td>
                                <td><?= $val->name_leader ?></td>
                                <td><?= $val->no_hp ?></td>
                                <td><?= $val->email ?></td>
                                <!-- <td><?= $val->addres ?></td> -->
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
        <div class="uk-modal-dialog uk-modal-dialog-large">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-modal-header">
                <h3 class="uk-modal-title">School Members Create</h3>
            </div>
           <!-- ########### -->
                <div class="md-card-content large-padding">
                    <form id="form_validation" action="<?= base_url('admin/school_member/save_school_member') ?>" method="post" class="uk-form-stacked">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <label for="schoolname">School Name<span class="req">*</span></label>
                                    <input type="text" name="schoolname" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <label for="leader">Leader<span class="req">*</span></label>
                                    <input type="text" name="leader" required  class="md-input" />
                                </div>
                            </div>
                             <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                   <!--  <label for="typeschool">Type School<span class="req">*</span></label>
                                    <input type="text" name="typeschool" required class="md-input" /> -->
                                    <!-- <div class="uk-width-medium-1-3"> -->
                                        <label for="typeschool">Type School<span class="req">*</span></label>
                                        <select name="typeschool" id="typeschool" class="md-input">
                                            <option value="" disabled selected hidden>Select...</option>
                                            <?php
                                            foreach ($typeschool as $key => $value) { ?>
                                            <option value="<?= $value->id; ?>">
                                                <?= $value->name; ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                             <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <!-- <div class="uk-width-medium-1-3"> -->
                                        <label for="subdistrict">Categori School<span class="req">*</span></label>
                                        <select name="categorischool" id="categorischool" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                            <option value="" disabled selected hidden>Select...</option>
                                            <?php
                                            foreach ($categori as $key => $value) {
                                            echo'<option class="dt '.$value->idtb_typeschool.'" value="'.$value->id.'">'.$value->name.'</option>';
                                            }
                                            ?>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>
                             <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="subdistrict">Sub-district<span class="req">*</span></label>
                                    <input type="text" name="subdistrict" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="qtyuser">Qty User<span class="req">*</span></label>
                                    <input type="text" name="qtyuser" onkeypress="return hanyaAngka(event)" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="phonenumber">Phone Number<span class="req">*</span></label>
                                    <input type="text" name="phonenumber" maxlength="15" minlength="10" onkeypress="return hanyaAngka(event)" required class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="email">Email<span class="req">*</span></label>
                                    <input type="email" name="email" data-parsley-trigger="change" required  class="md-input" />
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="addres">Addres<span class="req">*</span></label>
                                    <input type="text" name="addres" required  class="md-input" />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="uk-grid" data-uk-grid-margin> -->
                          <!--   <div class="uk-width-medium-1-2">
                                <div class="parsley-row uk-margin-top">
                                    <label for="val_birth">Birth Date<span class="req">*</span></label>
                                    <input type="text" name="val_birth" id="val_birth" required class="md-input" data-parsley-americandate data-parsley-americandate-message="This value should be a valid date (MM.DD.YYYY)" data-uk-datepicker="{format:'MM.DD.YYYY'}" />
                                </div>
                            </div> -->
                        <!-- </div> -->
                    
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
        $('#dt_default2, #dt_default3, #dt_default4').DataTable();
    })

    //only number
    function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    //end only number


    // combobox type school_member
    $(document).ready(function(){
            var categorischool = $("#categorischool");
            
            temp = categorischool.children(".dt").clone();
             $("#typeschool").change(function(){
                var value = $(this).val();              
                categorischool.children(".dt").remove();
                if(value!==''){
                    temp.clone().filter("."+value).appendTo(categorischool);
                } else {
                    temp.clone().appendTo(categorischool);
                }
             });
        });
    // end combobox type school_member

</script>


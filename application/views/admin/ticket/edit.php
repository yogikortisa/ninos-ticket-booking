<?= form_open(admin_url('ticket/update_data/'.$get_data->id)) ?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Update Ticket</h3>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Ticket Name</label>
                    <input type="text" name="name" value="<?= $get_data->name ?>" class="md-input">
                </div>
            </div>

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="ticket_type" id="ticket_type" data-md-selectize>
                        <option value="">Ticket type..</option>
                        <?php
                            foreach ($ticket_type_list as $val) 
                            {
                                if($val->id == $get_data->ticket_type)
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

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="ticket_category" id="ticket_category" data-md-selectize>
                        <option value="">Ticket category..</option>
                        <?php
                            foreach ($ticket_category_list as $val) 
                            {
                                if($val->id == $get_data->ticket_category)
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

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="session" id="session" data-md-selectize>
                        <option value="">Select Session..</option>
                        <?php
                            foreach ($session_list as $val) 
                            {
                                if($val->id == $get_data->session_type)
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

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <!-- <label for="masked_currency">Currency</label> -->
                    <input name="price" class="md-input masked_input label-fixed" id="masked_currency" type="text" value="<?= $get_data->price ?>" />
                </div>
            </div>
    </div>
    <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Update</button></div>

    </div>
</div>
<?php form_close() ?>
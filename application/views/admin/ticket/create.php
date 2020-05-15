<?= form_open(admin_url('ticket/insert_data')) ?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Create Ticket</h3>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Ticket Name</label>
                    <input type="text" name="name" class="md-input">
                </div>
            </div>

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="ticket_type" id="ticket_type" data-md-selectize>
                        <option value="">Ticket type..</option>
                        <?php
                            foreach ($ticket_type_list as $val) 
                            {
                                echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="ticket_category" id="ticket_category" data-md-selectize>
                        <option value="">Ticket Category..</option>
                        <?php
                            foreach ($ticket_category_list as $val) 
                            {
                                echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <select name="session" id="session" data-md-selectize>
                        <option value="">Ticket Session..</option>
                        <?php
                            foreach ($session_list as $val) 
                            {
                                echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
        
            <div class="uk-width-medium-1-3">
                <div class="uk-form-row">
                    <label>Price</label>
                    <input name="price" class="md-input masked_input label-fixed" id="masked_currency" type="text" />
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Create</button></div>

    </div>
</div>
<?php form_close() ?>
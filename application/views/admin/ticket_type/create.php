<?= form_open(admin_url('ticket_type/insert_data')) ?>
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_a">Create Ticket Type</h3>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-form-row">
                        <label>Type Name</label>
                        <input type="text" name="name" class="md-input">
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Create</button></div>

        </div>
    </div>
<?php form_close() ?>
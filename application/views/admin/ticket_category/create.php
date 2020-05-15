<?= form_open(admin_url('ticket_category/insert_data')) ?>
    <div class="md-card">
        <div class="md-card-content">
            <h3 class="heading_a">Create Ticket Category</h3>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <label>Category Name</label>
                        <input type="text" name="name" class="md-input">
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <label>Age Range</label>
                        <input name="age_range" class="md-input" type="text">
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Create</button></div>

        </div>
    </div>
<?php form_close() ?>
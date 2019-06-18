<div class="wrap">
    <h1 class="custom-url-div">Add your Custom URL</h1>
    <?php settings_errors(); ?>
    <?php
    settings_fields('shahzaib_options_group');
    do_settings_sections('sitemap_custom_url_generator');
    ?>
    <div class="col">
        <button type="submit" class="button-primary remove-row"  onclick="addCustomURL();">Submit</button>
    </div>
</div>



/**
 * @package SitemapCustomURLGenerator
 * Created by Shahzaib on 08/06/2019.
 */

function addCustomURL() {

    var url = $('input[name=url]').val();
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            action: "add_custom_url",
            url: url
        },
        success: function (data) {
            if ('already exist' == data)
                jQuery('.custom-url-div').before('<div class="error"><p>This Url is already exist</p></div>');
            else
                jQuery('.custom-url-div').before('<div class="updated notice"><p>Custom url is successfully added</p></div>');
            setTimeout(function(){
                jQuery('.updated.notice').remove();
            },2000)
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        },
    });
}
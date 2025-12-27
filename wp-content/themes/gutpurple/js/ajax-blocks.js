(function ($) {

    function loadBlocks(blocks, postId) {

        $.ajax({
            url: ajaxBlocksData.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'load_blocks',
                nonce: ajaxBlocksData.nonce,
                blocks: blocks,
                post_id: postId
            },
            success: function (response) {
                if (response.success && response.data.html) {
                    $('#ajax-blocks-container').html(response.data.html);
                }
            }
        });
    }

    $(document).ready(function () {
        loadBlocks(
            ['hero', 'products', 'about'],
            ajaxBlocksData.post_id // передай ID текущей страницы
        );
    });

})(jQuery);
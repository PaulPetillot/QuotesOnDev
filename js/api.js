(function ($) {

    /* Ajax-based random post fetching. */
    $(function () {
        $(".new-quote-button").on('click', function (event) {
            event.preventDefault();
            $description = $('.description');
            $metah2 = $('.metah2');
            $authorName = $('.author-name');
            // fetch a new quote
            $.ajax({
                method: 'GET',
                url: api_vars.root_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
                cache: false
            }).done(function (data) {
                const post = data.shift();
                quoteSource = post._qod_quote_source,
                    quoteSourceUrl = post._qod_quote_source_url,
                    the_title = post.title.rendered,
                    the_excerpt = post.excerpt.rendered;
                //update the quote content and name of the quoted peson
                //maybe use appemnd
                $description.html(the_excerpt);
                //$('.link-source-url').html(quoteSourceUrl)
                $metah2.html('<a href="' + quoteSourceUrl + '">' + quoteSource + '</a>');
                $authorName.html(the_title);
                //update the URL using history
            });
        })

        // Make the back and forward nav work with the history API
    });

    /* Ajax-based front-end post submissions */
    $(function () {
        $('.submit-form').on('submit', function (event) {
        event.preventDefault();
        // Event on submit of the form
        let data = {
            title: $('#author-name-field').val(),
            content: $('#quote-content-field').val(),
            _qod_quote_source: $('#quote-source-field').val(),
            _qod_quote_source_url: $('#quote-url-field').val(),
            post_status: 'pending'
        };
            $.ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',
                data:data,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
                }

            }).done(function () {
                //Use jquey so hide the form in a slidey way
                event.preventDefault();
                $('.submit-form').css('display', 'none');
                $('.message-receive').append('Thanks, your quote submission was received !')
                //show success message using the var from functions.php


            }).fail(function () {
                // post and alert wih failure var from functions.php
            })
        });
    });

})(jQuery);
(function ($) {

    /* Ajax-based random post fetching. */
    $(function () {
        $(".new-quote-button").on('click', function (event) {
            event.preventDefault();

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
                $('.description').html(the_excerpt);
                //$('.link-source-url').html(quoteSourceUrl)
                $('.metah2').html('<a href="' + quoteSourceUrl + '">' + quoteSource + '</a>');
                $('.author-name').html(the_title);
                //update the URL using history
            });
        })

        // Make the back and forward nav work with the history API
    });

    /* Ajax-based front-end post submissions */
    $(function () {
        // Event on submit of the form
        const data = {
            title: $('#update-title').val(),
            content: $('#quote-content').val(),
            _qod_quote_source: $('#quote-source').val(),
            _qod_quote_source_url: $('#quote-source-url').val(),
            post_status: 'pending'
        };
        $('form').on('submit', function () {
            $ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',
                data,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
                }

            }).done(function () {
                // clear the form fields and hide the form
                //Use jquey so hide the form in a slidey way

                //show success message using the var from functions.php


            }).fail(function () {
                // post and alert wih failure var from functions.php
            })
        });
    });

})(jQuery);
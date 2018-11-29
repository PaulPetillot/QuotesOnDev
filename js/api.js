(function ($) {

    /* Ajax-based random post fetching. */
    $(function () {
        let lastPage = '';
        $('.new-quote-button').on('click', function (event) {
            event.preventDefault();

            lastPage = document.URL;
           let $description = $('.description');
           let $metah2 = $('.metah2');
           let $authorName = $('.author-name');
            // fetch a new quote
            $.ajax({
                method: 'GET',
                url: api_vars.root_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',// eslint-disable-line
                cache: false
            }).done(function (data) {
                const post = data.shift(),
                quoteSource = post._qod_quote_source,
                quoteSourceUrl = post._qod_quote_source_url,
                theTitle = post.title.rendered, 
                theExcerpt = post.excerpt.rendered, 
                postLink = post.link;
                $description.html(theExcerpt);
              //  $('.link-source-url').html(quoteSourceUrl)
                if (quoteSource.length>0 && quoteSourceUrl.length>0){
                $metah2.html('<a href="' + quoteSourceUrl + '">' + quoteSource + '</a>');
                }else if (quoteSource.lenght>0){
                    $metah2.html('<a href="">' + quoteSource + '</a>');
                }
                else{
                    $metah2.html('<a href=""></a>');
                }
                $authorName.html(theTitle);
                //update the URL using history
               history.pushState(null, null, postLink);
            });
        })
         //Make the back and forward nav work with the history API
        $(window).on('popstate', function(){
            window.location.replace(lastPage);
        });
    });

    /* Ajax-based front-end post submissions */
    $(function () {
        let $submitForm = $('.submit-form')
        $submitForm.on('submit', function (event) {
        event.preventDefault();
        // Event on submit of the form
        let $messageReceive = $('.message-receive')
        $messageReceive.empty();
        let data = {
            title: $('#author-name-field').val(),
            content: $('#quote-content-field').val(),
            _qod_quote_source: $('#quote-source-field').val(),// eslint-disable-line
            _qod_quote_source_url: $('#quote-url-field').val(),// eslint-disable-line
            post_status: 'pending'// eslint-disable-line
        };
            $.ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',// eslint-disable-line
                data:data,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);// eslint-disable-line
                }

            }).done(function () {
                //Use jquey so hide the form in a slidey way
                event.preventDefault();
                $submitForm.css('display', 'none');
                $messageReceive.text(api_vars.success);// eslint-disable-line
                //show success message using the var from functions.php


            }).fail(function () {
                $messageReceive.text(api_vars.failure);// eslint-disable-line
            })
        });
    });

})(jQuery);
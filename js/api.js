(function($){

$(function(){
    $(".new-quote-button").on('click', function(){
    //fetch a new quote
    $.ajax({
        method:'GET',
        url : api_vars.root_url+
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1', 
        cache : false
    }).done(function(data){
        //get the first and only post array
        //update the quote content and name of the quoted person
        //display quote source if available
        //update the URL using history
    });
    //make the back and forward nav work with the history API
});});
  //Ajax based front-end post submission
// $(function(){
//     //Event on submit of the form
//     $.ajax({
//         method:'POST',
//         url : api_vars.root_url + 'wp/v2/posts',
//         data,
//         beforeSend : {// get the code to add a nonce from the documentation 
//         }
//     }).done(function(){
//         //clear the form field and hide the form
//         //Use jquery so hide the form in a slidey way
//         //Show sucess message using the var from function.php
//     }).fail(function(){
//         //post and alert with failure var from functions.php
//     })
// });
})(jQuery);
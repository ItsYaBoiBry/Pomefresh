
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function addproduct() {


    $("#addproduct").submit(function (event) {
        var ajaxRequest;
        /* Stop form from submitting normally */
        event.preventDefault();
        /* Clear result div*/
        /* Get from elements values */
        var values = $(this).serialize();
        console.log(values);
        /* Send the data using post and put the results in a div */
        /* I am not aborting previous request because It's an asynchronous request, meaning 
         Once it's sent it's out there. but in case you want to abort it  you can do it by  
         abort(). jQuery Ajax methods return an XMLHttpRequest object, so you can just use abort(). */
        ajaxRequest = $.ajax({
            url: "http://localhost/Pomefresh/content/products/API/addproduct.php",
            type: "post",
            data: values
        });
        /*  request cab be abort by ajaxRequest.abort() */
        ajaxRequest.done(function (response, textStatus, jqXHR) {
            // show successfully for submit message
            console.log(response);

        });
        /* On failure of request this function will be called  */
        ajaxRequest.fail(function () {
            // show error
            
            console.log("submit Fail");
        });
    });
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function addproduct() {


    $("#addproduct").submit(function (event) {
        var ajaxRequest;
        event.preventDefault();
        var values = $(this).serialize();
        console.log(values);

        ajaxRequest = $.ajax({
            url: "http://localhost/Pomefresh/content/products/API/addproducts.php",
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


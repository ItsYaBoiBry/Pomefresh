/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadTable() {

    $.ajax({
            type: "GET",
            url: "http://localhost/Pomefresh/content/orders/salesorder/API/getsalesorder.php",
            data: "type=all",
            cache: false,
            dataType: "JSON",
            success: function (data, textStatus) {
                console.log(data.status);

                if (data.status === 200) {
                        console.log("Success");
                        for (var i = 0; i < data.result.length; i++) {
                            var getitem = data.result[i];
                            console.log(getitem.so_transaction_id);
                            console.log(getitem.so_sendto);
                            console.log(getitem.so_date);
                            $('#product').append("<tr>"
                                + "<td class='id'>"
                                + (i + 1)
                                + "</td>"
                                + "<td class='name'>"
                        + getitem.so_transaction_id + "</td>"
                        + "<td>"
                        + getitem.so_shipping_address
                        + "</td>"
                        + "<td class='price'>"
                        + getitem.so_date
                        + "</td>"
                        + " <td style='border:none;'>"
                        + "<a href='viewsalesorder.php?id=" + getitem.so_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                        + "</td>"
                        + "</tr>");
                }
            } else {
                    console.log("Error");
                    $('#product').css("visibility", "hidden");
                    $('#table').html("<div id='message_no_products'><h1>NO ORDERS</h1></div>")
                }
//                        $(".panel-footer").html("Results: " + data.result);
            }
            ,
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        }
    );
}


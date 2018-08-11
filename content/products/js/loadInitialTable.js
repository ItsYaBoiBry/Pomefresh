/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadTable() {

    $.ajax({
        type: "GET",
        url: "http://www.ehostingcentre.com/Pomefresh/content/products/API/getproducts.php",
        data: "type=all",
        cache: false,
        dataType: "JSON",
        success: function (data, textStatus) {
            console.log("Status: " + data.status);
            console.log("message: " + data.message);
            console.log("products: " + data.products);
            if (data.status === 200) {
                $('#product').css("visibility", "visible");
                for (var i = 0; i < data.products.length; i++) {
                    var getProduct = data.products[i];
                    console.log("PRODUCT NAME: " + getProduct.product_name);
                    if (getProduct.product_quantity <= 100) {
                        $('#product').append("<tr>"
                                + "<td class='id'>"
                                + (i + 1)
                                + "</td>"
                                + "<td class='name'>"
                                + getProduct.product_name + "</td>"
                                + "<td class='qty'>"
                                + getProduct.product_quantity
                                + "</td>"
                                + "<td class='price'>$"
                                + getProduct.product_price
                                + "/"
                                + getProduct.product_uom
                                + "</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>"
                                + " <td style='border:none;'>"
                                + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                + "<a href='../../content/orders/productorder/add_PO.php' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
                                + "</td>"
                                + "</tr>");

                    } else {
                        $('#product').append("<tr>"
                                + "<td class='id'>"
                                + (i + 1)
                                + "</td>"
                                + "<td class='name'>"
                                + getProduct.product_name + "</td>"
                                + "<td class='qty'>"
                                + getProduct.product_quantity
                                + "</td>"
                                + "<td class='price'>$"
                                + getProduct.product_price
                                                                + "/"
                                + getProduct.product_uom
                                + "</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                + "</tr>");
                    }

                }
            } else {

                $('#product').css("visibility", "hidden");
                $('#table').html("<div id='message_no_products'><h1>NO PRODUCTS</h1></div>")
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


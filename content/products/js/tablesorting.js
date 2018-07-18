/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function SortByName() {
    $.ajax({
        type: "GET",
        url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
        data: "type=name",
        cache: false,
        dataType: "JSON",
        success: function (data, textStatus) {
            console.log("Status: " + data.status);
            console.log("message: " + data.message);
            console.log("products: " + data.products);
            if (data.status === 200) {
                $('#product').css("visibility", "visible");
                $('#product').empty();
                $('#product').append("<tr>"
                        + "<th class='id'>No.</th>"
                        + "<th><button onclick='SortByName()'>PRODUCT NAME</button></th>"
                        + "<th><button onclick='SortByQty()'>QUANTITY</button></th>"
                        + "<th class='qty'><button onclick='SortBySalesPrice()'>SALE PRICE</button></th>"
                        + "<th><button onclick='SortByVendorName()'>VENDOR NAME</button></th>"
                        + "</tr>");
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>"
                                + " <td style='border:none;'>"
                                + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                + "</tr>");
                    }

                }
            } else {
                $('#product').css("visibility", "hidden");
                $('#search').css("visibility", "hidden");
                $('#categories').css("visibility", "hidden");

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
function SortByQty() {
    $.ajax({
        type: "GET",
        url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
        data: "type=qty",
        cache: false,
        dataType: "JSON",
        success: function (data, textStatus) {
            console.log("Status: " + data.status);
            console.log("message: " + data.message);
            console.log("products: " + data.products);
            if (data.status === 200) {
                $('#product').css("visibility", "visible");
                $('#product').empty();
                $('#product').append("<tr>"
                        + "<th class='id'>No.</th>"
                        + "<th><button onclick='SortByName()'>PRODUCT NAME</button></th>"
                        + "<th><button onclick='SortByQty()'>QUANTITY</button></th>"
                        + "<th class='qty'><button onclick='SortBySalesPrice()'>SALE PRICE</button></th>"
                        + "<th><button onclick='SortByVendorName()'>VENDOR NAME</button></th>"
                        + "</tr>");
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>"
                                + " <td style='border:none;'>"
                                + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                + "</tr>");
                    }

                }
            } else {
                $('#product').css("visibility", "hidden");
                $('#search').css("visibility", "hidden");
                $('#categories').css("visibility", "hidden");

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
function SortBySalesPrice() {
    $.ajax({
        type: "GET",
        url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
        data: "type=salesprice",
        cache: false,
        dataType: "JSON",
        success: function (data, textStatus) {
            console.log("Status: " + data.status);
            console.log("message: " + data.message);
            console.log("products: " + data.products);
            if (data.status === 200) {
                $('#product').css("visibility", "visible");
                $('#product').empty();
                $('#product').append("<tr>"
                        + "<th class='id'>No.</th>"
                        + "<th><button onclick='SortByName()'>PRODUCT NAME</button></th>"
                        + "<th><button onclick='SortByQty()'>QUANTITY</button></th>"
                        + "<th class='qty'><button onclick='SortBySalesPrice()'>SALE PRICE</button></th>"
                        + "<th><button onclick='SortByVendorName()'>VENDOR NAME</button></th>"
                        + "</tr>");
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>"
                                + " <td style='border:none;'>"
                                + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                + "</tr>");
                    }

                }
            } else {
                $('#product').css("visibility", "hidden");
                $('#search').css("visibility", "hidden");
                $('#categories').css("visibility", "hidden");

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
function SortByVendorName() {
    $.ajax({
        type: "GET",
        url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
        data: "type=vendorname",
        cache: false,
        dataType: "JSON",
        success: function (data, textStatus) {
            console.log("Status: " + data.status);
            console.log("message: " + data.message);
            console.log("products: " + data.products);
            if (data.status === 200) {
                $('#product').css("visibility", "visible");
                $('#product').empty();
                $('#product').append("<tr>"
                        + "<th class='id'>No.</th>"
                        + "<th><button onclick='SortByName()'>PRODUCT NAME</button></th>"
                        + "<th><button onclick='SortByQty()'>QUANTITY</button></th>"
                        + "<th class='qty'><button onclick='SortBySalesPrice()'>SALE PRICE</button></th>"
                        + "<th><button onclick='SortByVendorName()'>VENDOR NAME</button></th>"
                        + "</tr>");
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>"
                                + " <td style='border:none;'>"
                                + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                + "/Pcs</td>"
                                + "<td class='vendor'>"
                                + getProduct.vendor_name
                                + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                + "</tr>");
                    }
                }
            } else {
                $('#product').css("visibility", "hidden");
                $('#search').css("visibility", "hidden");
                $('#categories').css("visibility", "hidden");

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
function SortByCategory() {
    if ($("select[name=category]").val() === "none") {
        $.ajax({
            type: "GET",
            url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
            data: "type=all",
            cache: false,
            dataType: "JSON",
            success: function (data, textStatus) {
                console.log("Status: " + data.status);
                console.log("message: " + data.message);
                console.log("products: " + data.products);
                if (data.status === 200) {
                    $('#table').html("");
                    $('#table').append("<table id='product'></table>");
                    $('#product').css("visibility", "visible");
                    $('#product').empty();
                    $('#product').append("<tr>"
                            + "<th class='id'>No.</th>"
                            + "<th><button onclick='SortByName()'>PRODUCT NAME</button></th>"
                            + "<th><button onclick='SortByQty()'>QUANTITY</button></th>"
                            + "<th class='qty'><button onclick='SortBySalesPrice()'>SALE PRICE</button></th>"
                            + "<th><button onclick='SortByVendorName()'>VENDOR NAME</button></th>"
                            + "</tr>");
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
                                    + "/Pcs</td>"
                                    + "<td class='vendor'>"
                                    + getProduct.vendor_name
                                    + "</td>"
                                    + " <td style='border:none;'>"
                                    + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                    + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                    + "/Pcs</td>"
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
        });
    } else {
        $.ajax({
            type: "GET",
            url: "http://localhost/Pomefresh/content/products/API/getproducts.php",
            data: "type=category&category=" + $("select[name=category]").val(),
            cache: false,
            dataType: "JSON",
            success: function (data, textStatus) {
                console.log("Status: " + data.status);
                console.log("message: " + data.message);
                console.log("products: " + data.products);
                if (data.status === 200) {
                    $('#table').html("");
                    $('#table').append("<table id='product'></table>");
                    $('#product').css("visibility", "visible");
                    $('#product').empty();
                    $('#product').append("<tr>"
                            + "<th class='id'>No.</th>"
                            + "<th>PRODUCT NAME</th>"
                            + "<th>QUANTITY</th>"
                            + "<th class='qty'>SALE PRICE</th>"
                            + "<th>VENDOR NAME</th>"
                            + "</tr>");
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
                                    + "/Pcs</td>"
                                    + "<td class='vendor'>"
                                    + getProduct.vendor_name
                                    + "</td>"
                                    + " <td style='border:none;'>"
                                    + "<a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;color:#FFFFFF;padding:13px;'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a>"
                                    + "<a href='#' style='margin-left:20px;background-color:red;padding:13px;color:#FFFFFF;'><button style='background-color:red;border:none;color:#FFFFFF;'>Re-Order</button></a>"
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
                                    + "/Pcs</td>"
                                    + "<td class='vendor'>"
                                    + getProduct.vendor_name
                                    + "</td>" + " <td style='border:none;'><a href='viewproduct.php?id=" + getProduct.product_id + "' style='margin-left:50px;background-color:#00BF32;padding:13px;color:#FFFFFF'><button style='background-color:#00BF32;border:none;color:#FFFFFF;'>View More</button></a></td>"
                                    + "</tr>");
                        }
                    }
                } else {
                    $('#product').css("visibility", "hidden");
                    $('#table').html("<div id='message_no_products'><h1>NO PRODUCTS IN THIS CATEGORY</h1></div>");
                }
//                        $(".panel-footer").html("Results: " + data.result);    
            }
            ,
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
    }

}

$(document).ready(function () {
   $("#btnSearch").click(function(){
      var filter = $("#filter").val();
      //var x = document.getElementById("filter").value;
      $("#searchResult").html("adad" + filter);
      /*
              $.ajax({
            url: "http://www.ehostingcentre.com/Pomefresh/content/categories/getCategories.php",
            type: "GET",
            //data: "t=" + title + "&y=" + year + "&plot=" + plot + "&apikey=3e7991e4",
            cache: false,
            dataType: "json",
            success: function (data) {
                var json = localStorage.getItem("movieArray");
                var movieArray = JSON.parse(json);
                if (movieArray === null) {
                    movieArray = [];
                }
                movieArray[movieArray.length] = data;
                json = JSON.stringify(movieArray);
                localStorage.setItem("movieArray", json);
                
                var message = "";
                message += "Title: " + data.Title + "<br/>";
                message += "Released: " + data.Released + "<br/>";
                message += "Runtime: " + data.Runtime + "<br/>";
                message += "Genre: " + data.Genre + "<br/>";
                message += "Actors: " + data.Actors + "<br/>";
                message += "Plot: " + data.Plot + "<br/>";
                $("#contents").html(message);
                $("#poster").html("<img src='" + data.Poster + "'/>");
            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
        */
   }); 
});
function search(){
    var x = document.getElementById("filter").value;
    //document.getElementById("searchResult"). = "Search result for " + x;
}
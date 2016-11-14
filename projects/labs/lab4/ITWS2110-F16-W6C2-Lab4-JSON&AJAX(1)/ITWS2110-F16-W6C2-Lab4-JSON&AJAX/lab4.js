$(document).ready(function(){
  $("#coverart").click(function(){
    //this will remove the cd image
    var x = document.getElementById("site");
    x.remove(x.selectedIndex);
    $.ajax({
      url: "lab4.json",
      dataType: "json",
      error: loaded,
      success: function(responseData, status){
      var base = $(".mysong");
        $.each(responseData.songs, function(i, item) {
          var clone = base.clone();
          var output = "<div class='asong'>";
          output += '<div class="CellTitle">' + item.Name + '</div>' ;
          output += '<div class="artist">' + '<a href=" '+ item.ArtistSiteURL  + ' ">' + item.Artist + '</a> </div>';
          output += '<div class="album">' + '<a href= " '+ item.AlbumURL        + ' ">' + item.Album + '</a> </div>';
          output += '<div class="date">' + item.Date + '</div>';
          output += '<div class="genres">' + item.Genres + '</div>';
          output += '<div class="album_cover">' + '<img src=" ' + item.AlbumCoverArtURL + ' " height="90px" width="90px"> '+ '</div>';
          output += '</div>';
          clone.find(".asong").html(output);
           $("#collection").append(clone);
        });
      }
      });
      function loaded(err, a, b){
        console.log(err);
        console.log(a);
        console.log(b);
        console.log("this doesn't work");
      }
    });
  });

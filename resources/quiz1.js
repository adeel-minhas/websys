$( function() {
    var state = true;
    $( "#button" ).on( "click", function() {
      if ( state ) {
        $( "#effect" ).animate({
          backgroundColor: "#aa0000",
          color: "#fff",
          width: 500
        }, 1000 );
      } else {
        $( "#effect" ).animate({
          backgroundColor: "#fff",
          color: "#000",
          width: 240
        }, 1000 );
      }
      state = !state;
    });
} );

$(document).ready(function(){
  $.ajax({
    type: "GET",
    url: "resources/quiz1.xml",
    dataType: "xml",
    success: function(xml) {

    $(xml).find('Assignmentorlab').each(function(){
      var name = $(this).find('name').text();
      var description = $(this).find('description').text();
      var location = $(this).find('location').text();
      $("#projects").append("<p><a href = " + location + ">" +  name + "</a>" + "</p>" + "<div id = accordion>" +  "<div>" + "<p>" + description + "</p>" + "</div>" + "</div>");
      });
  }
});

 });

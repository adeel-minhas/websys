$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
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
      $("#projects").append("<p><a href = " + location + ">" +  name + "</a>" + "</p>" + "<p>" + "Description: " + description + "</p>");
      });
  }
});

 });

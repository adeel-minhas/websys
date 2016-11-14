Adeel Minhas - minhaa
Web Systems Development - Assignment 2

1. The advantages of writing a JQuery plugin over regular Javascript that uses JQuery are:
   - Portability. You can integrate the plugin into a different number of projects or assignments within a short amount of time (i.e. Reusability)
   - Time. It takes less time to develop a plugin.

2. Our jQuery plugin adheres to best practices in Javascript and jQuery because we used html id as selectors most of the time (using simplified selectors). Also, we did not use any universal selectors and overall tried to be very specific when using selectors.

3. One major obstacle that would prevent me from POSTing high scores to a server on a different domain is that we would need to know the specific domain and address to where we are POSTing to. There might be security issues as well. We would really need to think about before doing something like "Access-Control-Allow-Origin." We could use AJAX to do a POST request to the server. I also read online that we could use an XMLHTTPRequest Object to do cross domain requests. I also read that you can do it by cross-origin resource sharing as well. Again, we would need to think about security implications before doing something like this.

Sources: 
http://james.padolsey.com/javascript/why-create-a-jquery-plugin/
http://stackoverflow.com/questions/17874730/how-to-make-cross-domain-request
http://hayageek.com/cross-domain-ajax-request-jquery/

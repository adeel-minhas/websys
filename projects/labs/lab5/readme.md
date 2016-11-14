Adeel Minhas
Web Systems Development - Lab 5

I noticed that the speed dramatically increased when hiding the list items once I did part 1.

Part 2:

1. Change from using a blue square to actual CSS. This will prevent from unnecessary looking up of a blue square (through the link). Instead we will use css styling to have a blue background.
2. Move CSS style to head of html document. It is recommended because when you have the CSS declared before <body> starts, your styles has actually loaded already. So very quickly users see something appear on their screen (e.g. background colors). If not, users see blank screen for some time before the CSS reaches the user.
It is just more efficient overall.
3. Add the list item string to an empty string in the loop, then append it afterwards to unordered list of id "foo". This significantly decreased the time. So this removed the big block of list items in the body of the html.
4. Minification of CSS improved the time as well (interestingly when I tried to do this with javascript, it increased the time). I also made sure to use the color code (#add8e6) for the background instead of saying a background color of light blue in the css.
5. Moved Javascript functions to the bottom of the html document
6. Removed second style tag at the bottom that had the css and combined it with the first style tag at the head.

*Attached you will find a screenshot of the load time (before and after all the optimizations)

Creative Part:

After the first time you click a list item, the background color will change to a red. Also, I added a counter that will count the total number of times you have clicked on a list item. The background color will reset to its normal color and the counter will reset to zero.

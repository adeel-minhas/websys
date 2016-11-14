Name: Adeel Minhas
Web Systems Development - Lab 6

Questions:

=============================================================================================================================================================================================================

1.

- The parent Operation Class is the main class from which all the other subclasses (addition, subtract, etc) are derived from. It contains two protected operands, a constructor that takes in these two operands and checks for any non-numerical operands as well as two public abstract functions called operate and getEquation.

- The Addition subclass does addition on the two operands and "echos" the answer into a string (with which I wrapped into a div and edited it so the text for the answer looks different.)


- The Subtraction subclass does subtraction on the two operands and "echos" the answer into a string (with which I wrapped into a div and edited it so the text for the answer looks different.)


- The Multiplication subclass does multiplication on the two operands and "echos" the answer into a string (with which I wrapped into a div and edited it so the text for the answer looks different.)


- The Cube subclass cubes the first input and "echos" the answer into a string (with which I wrapped into a div and edited it so the text for the answer looks different.)


- The Factorial subclass takes the factorial of the first operand and "echos" the answer into a string (with which I wrapped into a div and edited it so the text for the answer looks different.)

- I added a Square subclass and this basically squares the first operand.

	All of these operations are "child" classes of the parent Operation Class, this is why they "inherit" methods used in this class

- Note: The Cube, Factorial and Square opearnds should only take one operand.

The flow for all of these operations is that when I click the button, it gets the function and constructor from the Operation Class. After that, the operate function is used to perform the requested operation and then I use the getequation function to print out the result of the operation. The value of $_POST is also checked (if it was multiplication for example), it would create a new Multiplcation object (with the two operands). BUT, before all of that, we would check if the POST was recieved.

The order in which methods are invoked:

After the POST request is recieved, the parent class is initialized, then the appropriate subclass (depending on which button was pressed) is formed and then the operation is performed.

=============================================================================================================================================================================================================

2. 

A $_GET request would cache the results and the operands would be saved in browser history (W3schools). It is less secure than using a $_POST request. It would not be a good idea to use a $_GET request for sensitive information such as passwords. The calculator is not really sending "sensitive" information persay, so it might be preferable to use a $_GET request. Honestly though, it wouldn't make a difference.

Source: http://www.w3schools.com/TAGS/ref_httpmethods.asp

=============================================================================================================================================================================================================

3. Finally, please explain whether or not there might be another (better +/-) way to determine which button has been pressed and take the appropriate action

A better way to determine which button was pressed is to use switch statements because they are easily translated into a jump table. This makes switch statements much more efficient than if/else statements. The idea is that a compiler generates a jump table for a switch during compilation. During execution, instead of checking which case is satisfied, it decides which case has been executed. Also, it is more readable. Switch statements should generally be used for a large number of comparisons.

Sources: http://stackoverflow.com/questions/449273/why-the-switch-statement-and-not-if-else
https://www.quora.com/What-is-the-difference-between-switch-and-if-else-statements-Which-is-better-in-different-cases-Why

For this lab, I utilizied a lot of bootstrap and used google fonts as well.
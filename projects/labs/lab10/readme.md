Adeel Minhas - Web Systems Development - Lab 10
This lab was very time-consuming overall. I spent about 4 hours just trying to figure out how to do install.php. And I realized we don't
create the tables through the command line. The directions were rather vague about this point and I feel like this should be fixed. It is true
that we create the database through the postgresql api, but the directions need to be clear that we use an install.php file to insert the tables and what not. A lot of time was used in googling and trying to fix my small syntax errors, especially in the migrate.php file. It took me a while to figure that we had to use pg_query. Again, I had to use stackoverflow a lot and a lot of other resources (thank you google :)). Postgresql is so strict with syntax :(, so I spent a
lot of time on syntax errors. I'm not sure why anybody would use postgresql.

Also, for part 3 of the lab, I didn't really handle tiebreakers. It just outputted the last course that has a 90+ grade associated with it, which is IT and Society.

I also learned a lot of commands while using the postgres command prompt, which were useful in debugging, such as \d followed by the table name.

I wasn't sure how to copy the whole database, so I used /copy and copied tables.

Overall, I learned a lot in this lab, but it was painful :/.

Edit: I added a my lab9 websys database. I got rid of IF NOT EXISTS for primary keys

Enjoy.

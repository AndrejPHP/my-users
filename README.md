#My Users
Demo admin system for managing users and notes about users based on the popular Bootstrap admin theme **Gentelella**. The demo assumes you're logged in as an administrator. 

To get things started, you need to have Composer installed. First things first run this command in the project directory:

    composer install

This will install **fzaninotto/faker**  which is used to insert sample data.

Next step is to execute the SQL code in db.sql in your phpmyadmin. This will create a database named **my_users** and appropriate tables.

Database credentials are configured in app/db/DB.php

Last thing is to define the *APP_URL* in app/init.php. This needs to be the full URL pointing to the web app location **with a trailing slash** at the end. Examples: http://localhost/my-users/  http://www.example.com/ etc.

Modify .htaccess if necessary depending if you put the project in the root directory of your server or in subdirectory aka subfolder.

Pretty much that's it. Now you can run the web app. 

If you use the full system or parts of the system in production, make sure to implement additional security such as checking if user is logged in and authorized to make changes etc. Also take care of the fact that the form can be edited via inspect element in order to prevent malicious attacks. This is a demo, not an enterprise solution out of the box.

Enjoy! :) 

###Screenshots

1
![Url](https://i.imgur.com/SQZWJ5f.png)

2
![Url](https://i.imgur.com/YvZikEZ.png)

3
![Url](https://i.imgur.com/p89Bl6V.png)

4
![Url](https://i.imgur.com/BvkkW76.png)

5
![Url](https://i.imgur.com/Ec05sB5.png)

6
![Url](https://i.imgur.com/rbAd54w.png)

7
![Url](https://i.imgur.com/x7d7dCZ.png)

8
![Url](https://i.imgur.com/E5Y0gGW.png)

9
![Url](https://i.imgur.com/pabtCmK.png)

10
![Url](https://i.imgur.com/bb6WGqF.png)
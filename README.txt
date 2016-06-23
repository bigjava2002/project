Infoempire Assignment 
bigjava2002

To Install:
1) create a database called infoempire_assignment
2) unzip file included
3) open connectdb.php and change username and password for database connection
4) starting page is index.php


 The user, the client, can store information of different services within his/her profile.  There are 5 fields that exist for each service which can be changed by the user but first has to be confirmed by the ADMIN. There exists an ADMIN for each service that can view the data but cannot change the data in the input field.  However, if the Client requested a change of data then the Admin can confirm the change and will update the Client information.  A history of changes are tracked.

For simplicity, I neglected adding or subsidized certain components of the project.  For examples: No password hashing; Error handlingSQL injection can occur (however I will be working on these components in the near future)

Client Info
username:   username
password:   password

Admin Info
username:   admin_dentist
password:   password

username:   admin_doctor
password:   password

username:   admin_physio
password:   password

# Basic Twitter Clone in PHP
 
Pretty self-explanatory if you are using or have used Twitter. I will list the different user roles and what each role can do.

Owner (I have set it so that the role of the user with id of 1 is automatically set to owner):

username: owner, password: owner
* Add tweets.
* Remove their own tweets individually.
* Remove other people's tweets individually.
* Promote user to admin.
* Demote admin to user.
* Remove users (including admins) individually (in the Admin Panel).
* Remove all tweets (in the Owner Panel).
* Remove all users (except themselves) (in the Owner Panel).

Admin:

username: admin, password: admin
* Add tweets.
* Remove their own tweets individually.
* Remove other people's tweets (except other admins' and the owner's) individually.
* Promote user to admin.
* Remove users (except other admins and the owner) individually (in the Admin Panel).

User:
* Add tweets.
* Remove their own tweets individually.

Now, I will explain what none of the roles can do.

* Follow other users.
* Favorite and retweet.
* Change password.
* etc.

################################################################################################################################################
########################################################################################################################################################                        #####                      ###########                       ###########                   ########     ########
########                        #####                        #########                       ###########                     #####       #######
########       ######################        ########        #########       ###########################       #######        ####       #######
########       ######################        #########       #########       ###########################       ########        ###       #######
########                        #####        #########       #########                       ###########       #########       ###       #######
########                        #####        #########       #########                       ###########       #########       ###       #######
########       ######################                       ##########       ###########################       #########       ###       #######
########       ######################                     ############       ###########################       ########       ##################
########       ######################        #######        ##########                       ###########                     ######     ########
########       ######################        #######        ##########                       ###########                    #######     ########
################################################################################################################################################
################################################################################################################################################




First of all..... SICK HUH?!?! 
We should do this all the time man, so when you're done programming you send me one with my name in it. That's 6 letters! Lol! Its a Span!!!

Okay.
This is the sign up section only, I havent made any sql files this time because I thought it'd be better if you did them your way, yours were much better anyway. This part is only for signing up and logging in.

I've made 4 sections:
-Student
-University
-Lecturers(Instructor)
-Organisation

They're named in the order that the sign up will work.

Note.

STUDENT : 
-> The student will need a university code to sign up. They'll get it from the school
-> On the courses part, the number of fields will be the same as the number of courses that the student specifies, I only put those in so you can what it'll look like. I think you'll have to use a loop.
-> You'll also have to resize the student's profile picture to something small, probably 240*240. Because that's what we'll use in the profile. and the profile picture is permanent.


UNIVERSITY:
-> This one is pretty straight forward. Although after the first part, We'll send them a University Code/ID via which should be 8 digits long. I think the fastest way to generate one is to use the ID system that mysql uses it'll be guaranteed that there wont be any collisions we'll also send word document that they'll fill in. I thought this would make it easier on their part.
-> The document will contain the following
   - Number of Departments
   - Department Names
   - Names of Lecturers, their departments along with theur email addresses
   - Number of students that the school has rounded off to the nearest 100.

 LECTURER/INSTRUCTOR:
 -> The School Code will be used to create the account and Login
 -> The part with the number of courses will work the same way that the students part will.
 ->Profile picture the same as well.

 ORGANISATION/CLIENT:
 -> Straight forward as well, and the Client code will be sent in the same way as the university code except let this one be 10 digits long.
 -> The email will also contain a word document as before except this time the client will give us the following
 	- Type of Company(Manufacturing, Automobile, Engineering... etc)
 	- Number of employees.
 	- Qualities they're looking for in students.

Each page of the signup process will have it's own php file and will insert into the database on it's own. That way any errors will be fixed then and there without waiting all the way to the end.
When the sign up process is done. Let it redirect to the done page for now.


These are just my thoughts, feel free to make changes. You're the man.



################################################################################################################################################
########################################################################################################################################################                        #####                      ###########                       ###########                   ########     ########
########                        #####                        #########                       ###########                     #####       #######
########       ######################        ########        #########       ###########################       #######        ####       #######
########       ######################        #########       #########       ###########################       ########        ###       #######
########                        #####        #########       #########                       ###########       #########       ###       #######
########                        #####        #########       #########                       ###########       #########       ###       #######
########       ######################                       ##########       ###########################       #########       ###       #######
########       ######################                     ############       ###########################       ########       ##################
########       ######################        #######        ##########                       ###########                     ######     ########
########       ######################        #######        ##########                       ###########                    #######     ########
################################################################################################################################################
################################################################################################################################################

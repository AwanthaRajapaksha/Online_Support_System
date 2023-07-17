01.Download the project
02.Open a Terminal and run the following code
'composer update'
'npm install'
'npm run dev'
03.Create Mysql Dtabase using OnlineSupportSystem for name
04.Open a Terminal and run the following code
'php artisan migration'
'php craftsman service'


Now you can see my project. First click the Create Problem button to create a ticket and provide the required information. Here all coloms are required to be filled. After doing that you will be given a reference number keep that number in a save somewhere.

welcome page show all the questions of the users are displayed . A question that has not yet been answered will appear in red.here can view and see all problem details.

After the register button you are allowed to login after creating an admin account. There you will be able to see all the questions of the users. The special thing here is that you will be able to answer those questions.

**By displaying data using a data table, you can find the relevant question by any name that appears on the screen.
**I used to Ajax becouse minimize the number of page loads required while using the system 
**I validated all inputs and appropriate validation and status messages shown when necessary
**I used random() to guess the ticket references.
**I used the mailtrap sefe email testing site to run the email function. Because there was an error in my email.

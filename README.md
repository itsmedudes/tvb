# Assignment

Perform a CRUD Operation for student and course information in a table with OOPs Concepts.
*	Student fields (Student Name, Course Name, Address, Email, DOB, etc.)
*	Course fields (Course Name, Course Description, etc.)


## Installation & Run

run this command in your pc
```bash
  git clone https://github.com/itsmedudes/tvb.git
```

Before running the Xampp server, you should create the database name of `course`.
Update, username and password as per your local database config.
Admin Id Password
Username: `admin`
Password: `admin`

## API Root Endpoint

`https://trendnation.online/tvb/admin`

`http://localhost/tvb/admin`

`http://localhost/tvb/admin/student`

`http://localhost/tvb/admin/course`




## API Module Endpoints

### Student Module


* `/student` : List of Student 
* `/student/add` : Register ( Create New Student ) 
* `/student/edit/1` : Update the Student Details
* `/student/delete/1` : Delete Student by `id`
* `/student/view` : Enrolled Student List`




### Course Module
* `/course` : List of Course
* `/course/add` : Register ( Create New Course ) 
* `/course/edit/1` : Update the Course Details
* `/student/delete/1` : Delete Course by `id`




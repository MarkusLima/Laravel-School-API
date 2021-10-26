Create project 
composer create-project --prefer-dist laravel/laravel school "5.8.*"

###cmd create migrations
```php artisan make:migration create_schools_table
php artisan make:migration create_class_rooms_table
php artisan make:migration create_students_table
php artisan make:migration create_student_class_rooms_table
```

###cmd models
```php artisan make:model model/School
php artisan make:model model/ClassRoom
php artisan make:model model/Student
php artisan make:model model/StudentClassRoom
```


###cmd controller
```php artisan make:controller Api/SchoolController --resource           
php artisan make:controller Api/StudentController --resource
php artisan make:controller Api/ClassRoomController --resource
php artisan make:controller Api/StudentClassRoomController --resource
```

###cmd seeder
php artisan db:seed



##Run project

```composer install
php artisan serve
localhost:8000/api/
```


##Teste fetch Schools

###get
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###post
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "name": "Santo Augostinho",
  "address": "Rua dos sonhos sem numero"
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools/create", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###del
```var requestOptions = {
  method: 'DELETE',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools/delete/6", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###update

```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "name": "Santo Augostinho _",
  "address": "Rua dos sonhos s/n"
});

var requestOptions = {
  method: 'PATCH',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools/update/5", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

### find id
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools/5", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###search name
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/schools/search/sant", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------
-----------------------------------------------------------------



##Teste fetch Students

###get
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###post
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "name": "Jose lima",
  "phone": "021987654321",
  "email": "markus@gmail.com",
  "dt_birth": "11/04/1987",
  "genre": "male"
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students/create", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###del
```var requestOptions = {
  method: 'DELETE',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students/delete/2", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###update
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "name": "Markus lima",
  "phone": "021987654321",
  "email": "markus@gmail.com",
  "dt_birth": "11/04/1987",
  "genre": "machao"
});

var requestOptions = {
  method: 'PATCH',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students/update/1", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###find id
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students/3", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###search name
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/students/search/gui", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------
-----------------------------------------------------------------


##Teste fetch Classes

###get
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###post
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "year": "2019",
  "level_education": "1 ano",
  "serie": "serie",
  "shift": "11/04/1987",
  "school_id": 1
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes/create", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###del
```var requestOptions = {
  method: 'DELETE',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes/delete/4", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###update
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "year": "2022",
  "level_education": "2 ano",
  "serie": "serie",
  "shift": "11/04/1988",
  "school_id": 1
});

var requestOptions = {
  method: 'PATCH',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes/update/1", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###find id
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes/3", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###search year
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/classes/search/2020", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------
-----------------------------------------------------------------


##Teste fetch Classes

###get
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/class_student", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###post
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "class_room_id": 1,
  "student_id": 4
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/class_student/create", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------

###del
```var requestOptions = {
  method: 'DELETE',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/class_student/delete/4", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------


###up
```var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "class_room_id": 1,
  "student_id": 1
});

var requestOptions = {
  method: 'PATCH',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost:8000/api/class_student/update/5", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------


###find id
```var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("http://localhost:8000/api/class_student/5", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
-----------------------------------------------------------------
-----------------------------------------------------------------



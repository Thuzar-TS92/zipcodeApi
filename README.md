# PHP Rest API
	
    composer install

## Database setup
	
 - change .env.example to .env
>     DB_CONNECTION=mysql
>     DB_HOST= server address
>     DB_PORT=3306
>     DB_DATABASE= databse name
>     DB_USERNAME=root
>     DB_PASSWORD=

# URL
**Read All**

    http://localhost:9090/rest-api/zipcode

**Search with key**
   

     http://localhost:9090/rest-api/zipcode/?s={keywords}

 if want to change 's' request field 

       isset($_GET["s"]) => isset($_GET[" { request field } "])



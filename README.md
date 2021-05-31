# Contact Form Project | PHP MYSQL (with PDO)

## Hello there,
You can include this contact form in many of your projects. We added color to our project with SweetAlert

#### Our Project Content
* Validation with HTML5
* Success and Error Alerts with SweatAlert
* Writing the date our message was sent in MYSQL


## İndex.php 
![alt text](https://github.com/FRTYZ/Contact-Form-PHP-MYSQL-with-PDO/blob/main/img/contact-form.png?raw=true)
 
## İndex.php 
->Success Alerts with SweatAlert
![alt text](https://github.com/FRTYZ/Contact-Form-PHP-MYSQL-with-PDO/blob/main/img/contact-sweatalert.png?raw=true)
## Datable Table
![alt text](https://github.com/FRTYZ/Contact-Form-PHP-MYSQL-with-PDO/blob/main/img/contact-db.png?raw=true)
### Datable Data
![alt text](https://github.com/FRTYZ/Contact-Form-PHP-MYSQL-with-PDO/blob/main/img/contact-db-data.png?raw=true)
## Source Codes

#### Code for index.php

```
                <center><h1>Contact Form</h1></center>                      
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Your Name" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Your Email Adress</label>
                                <input type="email" class="form-control" name="email"  placeholder="example@example.com" required="">
                            </div>      

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Subject</label>
                                <input type="text" name="subject" class="form-control" required="">
                            </div>          

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" name="message" rows="3" required="" placeholder="Write Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            <!-- / We link the SweatAlert file in the JS folder. -->
                            <script src="js/sweetalert.min.js"></script>

                            <!-- / We complete our form and move on to PDO transactions -->

                            <?php

                            include('fonc.php'); // we include the database on our page

                            if ($_POST) // Checking If Data Has Been Posted
                            {

                                $save = $connect->prepare('INSERT INTO messages SET name=:name, email=:email, subject=:subject, message=:message'); 
                                //If Data Is Posted, Posted Data Is Being Posted To Database
                                $insert = $save->execute(array(  // Run our query and define with ARRAY variable

                                    'name' => htmlspecialchars($_POST['name']),
                                    'email' => htmlspecialchars($_POST['email']),
                                    'subject' => htmlspecialchars($_POST['subject']),
                                    'message' => htmlspecialchars($_POST['message']),
                                ));

                                if ($insert) { //If our data is sent to the database, it warns with SweatAlert and redirects the page to index.php
                                    echo '<script>swal("Successful","Your Message Has Been Sent To Us, We Will Be Back As Soon As Possible...","success").then((value)=>{ window.location.href = "index.php"}); </script>';                         
           
                                }
                                else  // If there is an error, we print it with SweatAlert
                                {
                                    echo '<script>swal("Error","Check Your Error","error");</script>';
                                }

                            }
                            ?>
                        </form>
```

#### Note: In order for Sweatalert to work, we need to include the js file under the button input in our form. 

```
<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            <!-- / We link the SweatAlert file in the JS folder. -->
                            <script src="js/sweetalert.min.js"></script>
```


Good Koding

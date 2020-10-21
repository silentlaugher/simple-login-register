<?php 
            /*HELPER FUNCTIONS*/

    function clean($string){
        return htmlentities($string);
    }

    function redirect(){
        return header("Location: {$location}");
    }

    function set_message($message){
        if(!empty($message)){
            $_SESSION['message'] = $message;
        }else{
            $message = "";
        }
    }

    function display_message(){
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    function token_generator(){
        $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        return $token;
    }

            /* VALIDATION FUNCTIONS*/

    function validate_user_registration(){
        $errors = [];
        $min = 2;
        $max = 40;

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $first_name = clean($_POST['first_name']);
            $last_name = clean($_POST['last_name']);
            $username = clean($_POST['username']);
            $email = clean($_POST['email']);
            $password = clean($_POST['password']);
            $confirm_password = clean($_POST['confirm_password']);

            if(strlen($first_name) < $min){
                $errors[] = "Your first name cannot be less than {$min} characters";
            }

            if(strlen($first_name) > $max){
                $errors[] = "Your first name cannot be more than {$max} characters";
            }

            if(empty($first_name)){
                $errors[] = "Your first name cannot be empty";
            }

            if(strlen($last_name) < $min){
                $errors[] = "Your last name cannot be less than {$min} characters";
            }

            if(strlen($last_name) > $max){
                $errors[] = "Your last name cannot be more than {$max} characters";
            }

            if(empty($last_name)){
                $errors[] = "Your last name cannot be empty";
            }

            if(strlen($username) < $min){
                $errors[] = "Your username cannot be less than {$min} characters";
            }

            if(strlen($username) > $max){
                $errors[] = "Your username cannot be more than {$max} characters";
            }

            if(empty($username)){
                $errors[] = "Your username cannot be empty";
            }

            if(empty($email)){
                $errors[] = "Your email cannot be empty";
            }

            if(!empty($errors)) {
                foreach ($errors as $error) {
                    $message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible" role="alert">
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<strong>Warning!</strong> $error
</div>
DELIMITER;

echo $message;

                }
            }
        }
    }
?>
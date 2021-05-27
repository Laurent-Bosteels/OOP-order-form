<?php

class UserValidator

{

    // Properties

    private $data;
    private $errors = [];
    private static $fields = ['email', 'street', 'streetnumber', 'city', 'zipcode'];

    public function __construct($post_data)
    
    {

        $this->data = $post_data;

    }

    // Methods
    public function validateForm(){
        
        // CYCLE THROUGH THE ARRAY FIELDS AND REFER TO THEM AS FIELD
        // CHECK IF EACH FIELD EXISTS AS A KEY IN THE DATA
        // ! CAUSE IF IT EXISTS IT NEEDS TO RETURN FALSE, IF NOT IT TRIGGERS THE ERROR.

        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
              trigger_error("'$field' is not present in the data");
              return;
            }
          }

        // SCRIPT CARRIES ON HERE IF NO ERROR
        // ACCESS THE KEYS

        $this->validateEmail();
        $this->validateStreet();
        $this->validateStreetnumber();
        $this->validateCity();
        $this->validateZipcode();
        return $this->errors;

    }

    // Methods
    private function validateEmail(){

        $val = test_input($this->data['email']);
        if(empty($val)){
          $this->addError('email', 'email cannot be empty');
        } else {
          if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
            $this->addError('email', 'email must be a valid email address');
          }
        }
      }

    // Methods
    private function validateStreet() {
    }

    // Methods
    private function validateStreetNumber() {
    }
    // Methods
    private function validateCity() {
    }

    // Methods
    private function validateZipcode() {
    }

    // Methods
    private function addError($key, $val) {
    $this->errors[$key] = $val;
    }

}

function test_input($data) {

  $data = trim($data); // Strip whitespace (or other characters) from the beginning and end of a string
  $data = stripslashes($data); // Unquotes a quoted string
  $data = htmlspecialchars($data); // Convert special characters to HTML entities
  return $data;

}



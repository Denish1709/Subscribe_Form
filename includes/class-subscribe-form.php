<?php

class SubscribeForm
{

    public $database;

    public function __construct()
    {
        // Only change code below this line 

            // Instruction: add database connection into $this->database
            $this->database = connectToDB();

        // Only change code above this line
    }

    public function subscribe($email)
    {
        // Only change code below this line 

            // Instruction: check if $email is empty or not, if empty, return 'Email is required'          
            if ( empty($email))
                return [
                    "status" => "error",
                    "message" => 'Email is required'
                ];

            // Instruction: check if $email is valid, then add it into database, and return 'You have successfully subscribed to our newsletter'
            $statement = $this->database->prepare(
                'INSERT INTO subscribe_list (email)
                VALUES (:email)'
            );

            $statement->execute([
                'email' => $email
            ]);

            return [
                "status" => "success",
                "message" =>'You have successfully subscribed to our newsletter'
            ];

        // Only change code above this line
    }
}
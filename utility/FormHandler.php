<?php
//=======================================
// Class definition for a Form Validator
//=======================================

class FormHandler {
    
    /**
     * Constructor, takes in an array containing user input.
     * @param  mixed $user_input 
     * @param  mixed $errors Error log
     * @return void
     */
    public function __construct(private array $user_input, private array $errors = []) {
    }

    public function valid() {
        
    }

    public function errors() {

    }


}
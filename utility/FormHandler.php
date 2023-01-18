<?php
//=======================================
// Class definition for a Form Validator
//=======================================

require_once __DIR__.'/../data/DataHandler.php';

class FormHandler {
    
    /**
     * Constructor, takes in an array containing user input.
     * @param  mixed $user_input 
     * @param  mixed $errors Error log
     * @return void
     */
    public function __construct(private array $user_input, private array $errors = []) {
    }
    
    /**
     * Checks is all user inputted variables are valid. Returns false if there are any errors.
     * @return bool
     */
    public function valid() : bool {
        $DB = new DataHandler;
        if (isset($this->user_input['equip_id'])) { // equipment ID exists in the database
            if (empty($this->user_input['equip_id']) || ctype_space($this->user_input['equip_id'])) {
                $this->errors[] = 'Please enter equipment ID';
            } else if ($DB->get_equipment($this->user_input['equip_id']) == null) {
                $this->errors[] = 'Equipment does not exist in the database.';
            }
        }
        if (isset($this->user_input['users'])) {    // number of users is a valid integer
            if (empty($this->user_input['users']) || !is_numeric($this->user_input['users']) || $this->user_input['users'] < 0) {
                $this->errors[] = 'Enter a valid number for number of users required.';
            }
        }
        if (isset($this->user_input['storage'])) {  // storage is a valid integer
            if (empty($this->user_input['storage']) || !is_numeric($this->user_input['storage']) || $this->user_input['storage'] < 0) {
                $this->errors[] = 'Enter a valid number for required storage space.';
            }
        }
        if (isset($this->user_input['room_id'])) {  // room ID exists in the database
            if (empty($this->user_input['room_id'])) {
                $this->errors[] = 'Please enter a room';
            } else if ($DB->get_room($this->user_input['room_id']) == null) {
                $this->errors[] = 'Room does not exist in the database.';
            }
        }
        if (isset($this->user_input['new_room_id'])) {  // new room ID doesnt already exist
            if (empty($this->user_input['new_room_id'] || ctype_space($this->user_input['new_room_id']))) {
                $this->errors[] = 'Please enter a room-ID.';
            } else if ($DB->get_room($this->user_input['new_room_id']) !== null) {
                $this->errors[] = 'Room-ID already exists in the database.';
            }
        }
        if (isset($this->user_input['new_equip_id'])) { // new equipment ID doesnt already exist
            if (empty($this->user_input['new_equip_id'] || ctype_space($this->user_input['new_equip_id']))) {
                $this->errors[] = 'Please enter an equipment-ID.';
            } else if ($DB->get_room($this->user_input['new_equip_id']) !== null) {
                $this->errors[] = 'Equipment-ID already exists in the database.';
            }
        }
        if (isset($this->user_input['room_cap'])) { // room capacity is a valid integer
            if (empty($this->user_input['room_cap']) || !is_numeric($this->user_input['room_cap']) || $this->user_input['room_cap'] < 0) {
                $this->errors[] = 'Room capacity must be a valid number';
            }
        }

        return count($this->errors) > 0 ? false : true; // returns true if there are no error messages
    }
    
    /**
     * Prints out all errors with user inputs.
     * @return void
     */
    public function errors() {
        foreach ($this->errors as $err_message) {
            echo $err_message, '<br>';
        }
    }


}
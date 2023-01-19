<?php
//-----------------------------------------
// Class definition for a Form Validator
//-----------------------------------------

require_once __DIR__.'/../data/EquipmentHandler.php';
require_once __DIR__.'/../data/RoomHandler.php';

class FormHandler {
    
    private EquipmentHandler $EHandler;
    private RoomHandler $RHandler;

    /**
     * Constructor, takes in an array containing user input.
     * @param  mixed $user_input 
     * @param  mixed $errors Error log
     * @return void
     */
    public function __construct(private array $user_input = [], private array $errors = []) {
        $this->EHandler = new EquipmentHandler;
        $this->RHandler = new RoomHandler;
    }
    
    /**
     * Validates new room-ID and room capacity. 
     * Checks for if room-ID already exists and room capcity is a valid integer
     * @return bool
     */
    public function valid_addRoom() : bool {
        if (empty($this->user_input)) {
            return false;
        }
        $overwrite = $_POST['overwrite'] ? true : false;
        if (isset($this->user_input['room_id'])) {  // new room ID doesnt already exist
            if (empty($this->user_input['room_id'] || ctype_space($this->user_input['room_id']))) {
                $this->errors[] = 'Please enter a room-ID.';
            } else if ($this->room_exists() && !$overwrite) {
                $this->errors[] = 'Room-ID already exists in the database.';
            }
        }
        if (isset($this->user_input['room_cap'])) { // room capacity is a valid integer
            if (empty($this->user_input['room_cap']) || !is_numeric($this->user_input['room_cap']) || $this->user_input['room_cap'] < 0) {
                $this->errors[] = 'Room capacity must be a valid number';
            }
        }
        return count($this->errors) > 0 ? false : true;
    }
    
    /**
     * Validates room-ID exists in the database.
     * @return bool
     */
    public function valid_rmRoom() : bool {
        if (empty($this->user_input)) {
            return false;
        }
        $this->room_exists();
        return count($this->errors) > 0 ? false : true;
    }
    
    /**
     * Validates new equipment-ID, number of users, and storage space.
     * Checks if equipment-ID already exists and if users and storage are valid integers.
     * @return bool
     */
    public function valid_addEquip() : bool {
        if (empty($this->user_input)) {
            return false;
        }
        $overwrite = $_POST['overwrite'] ? true : false;
        if (isset($this->user_input['equip_id'])) { // new equipment ID doesnt already exist
            if (empty($this->user_input['equip_id'] || ctype_space($this->user_input['equip_id']))) {
                $this->errors[] = 'Please enter an equipment-ID.';
            } else if ($this->equipment_exists() && !$overwrite) {
                $this->errors[] = 'Equipment-ID already exists in the database.';
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
        if (isset($this->user_input['room_id_op'])) {
            if (!empty($this->user_input['room_id_op']) && $this->RHandler->get($this->user_input['room_id_op']) == null) {
                $this->errors[] = 'Room does not exist.';
            }
        }
        return count($this->errors) > 0 ? false : true;
    }
    
    /**
     * Checks if equipment-ID exists in the database.
     * @return bool
     */
    public function valid_rmEquip() : bool {
        if (empty($this->user_input)) {
            return false;
        }
        $this->equipment_exists();
        return count($this->errors) > 0 ? false : true;
    }
    
    /**
     * Checks if room-ID and equipment-ID exist in the database. 
     * @return bool
     */
    public function valid_mvEquip() : bool {
        if (empty($this->user_input)) {
            return false;
        }
        if (isset($this->user_input['room_id'])) {  // validate that room ID exists in the database
            if (empty($this->user_input['room_id'])) {
                $this->errors[] = 'Please enter a room';
            } else if (!$this->room_exists()) {
                $this->errors[] = 'Room does not exist in the database.';
            }
        }
        if (isset($this->user_input['equip_id'])) { // equipment ID exists in the database
            if (empty($this->user_input['equip_id']) || ctype_space($this->user_input['equip_id'])) {
                $this->errors[] = 'Please enter equipment ID';
            } else if (!$this->equipment_exists()) {
                $this->errors[] = 'Equipment does not exist in the database.';
            } 
        }
        return count($this->errors) > 0 ? false : true;
    }

    /**
     * Verifies that inputted room exists.
     * @return bool
     */
    public function room_exists() : bool {
        return $this->RHandler->get($this->user_input['room_id']) != null;
    }

    /**
     * Verifies that inputted equipment exists.
     * @return bool
     */
    public function equipment_exists() : bool {
        return $this->EHandler->get($this->user_input['equip_id']) != null;
    }


    
    /**
     * Prints out all errors with user inputs.
     * @return void
     */
    public function errors() {
        foreach ($this->errors as $err_message) {
            echo $err_message, '<br />';
        }
    }


}
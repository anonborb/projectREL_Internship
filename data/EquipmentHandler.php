<?php

require_once 'DataHandler.php';

//--------------------------------------------------------------------------
// Definition for a Handler that handles all the equipment in the database
//--------------------------------------------------------------------------

class EquipmentHandler extends DataHandler {
    
    /**
     * Adds an equipment to the database. Returns false if equipment already exists and overwrite is not allowed
     * If overwrite flag is set to true, the old equipment will be overwritten.
     * @param  Equipment $equip to be added
     * @param  string $location Optional location. 
     * @return bool
     */
    public function add(Object $new_equip, string $location = self::NONE) : bool {
        if (get_class($new_equip) != 'Equipment') {
            throw new InvalidArgumentException("DataHandler:add_equipment, Object must be an Equipment.");
        }
        $equip_id = $new_equip->get_label();

        if ($location != self::NONE) {  // If user inputted a location, sets and adds equipment to location
            try {
                $_SESSION[self::ROOMS][$location]->add_equipment($new_equip);  // will throw exception if room cannot hold new equipment
            } catch (Exception $e) {
                echo "Room's capacity cannot hold new equipment. Equipment will stay in inventory.<br>";
                $location = self::NONE; // sets location to inventory
            }
            $new_equip->set_location($location);
        }
        if ($_SESSION[self::EQUIPMENT][$equip_id] != null) {    // if equipment already exists, remove from location before overwriting.
            $this->remove($equip_id);
        }
        $_SESSION[self::EQUIPMENT][$equip_id] = $new_equip;
        return true;
    }

    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * @param  string $equip_id
     */
    public function remove(string $equip_id){
        $equip = $_SESSION[self::EQUIPMENT][$equip_id];

        $room_location = $equip->get_location();

        if ($room_location != self::NONE) {     // Removing from current room location
            $_SESSION[self::ROOMS][$room_location]->rm_equipment($equip);
            
        }
        unset($_SESSION[self::EQUIPMENT][$equip_id]);    // Removing from inventory
    }

    /**
     * Retreives an equipment from the equip_list. Returns null if not found.
     * @param  string $equip_id
     * @return Equipment
     */
    public function get(string $equip_id) : Equipment|null {
        return $_SESSION[self::EQUIPMENT][$equip_id];
    }
    
    /**
     * Returns an array of all equipment in the database.
     * @return array
     */
    public function get_list() : array {
        return $_SESSION[self::EQUIPMENT];
    }

    /**
     * Returns total number of Equipment in the database.
     * @return int
     */
    public function get_list_count() : int {
        return count($_SESSION['equip_list']);
    }    
        
    /**
     * Moves equipment between rooms. 
     * Removes from current room, adds to new room, sets equipment location to new location
     * @param  Equipment $equip
     * @param  string $new_room_id
     */
    public function move_equipment(Equipment $equip, string $new_room_id) {    
        $old_location = $equip->get_location(); 
        if ($old_location != self::NONE) {  // Removes equipment from old location
            $_SESSION[self::ROOMS][$old_location]->rm_equipment($equip);
        }
        $new_room = $_SESSION[self::ROOMS][$new_room_id];
        $new_room->add_equipment($equip);   // Room adds equipment. throws exception if room cannot hold more equipment.
    }
    
}
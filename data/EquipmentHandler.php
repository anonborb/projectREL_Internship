<?php
require_once 'DataHandler.php';

class EquipmentHandler extends DataHandler {
    
    /**
     * Adds an equipment to the database. Returns false if equipment already exists.
     * If overwrite flag is set to true, the old equipment will be overwritten.
     * @param  Equipment $equip to be added
     * @param  string $room Optional room location. 
     * @param  bool $overwrite Default will not allow overwriting, if set to true, overwriting will be allowed.
     * @return bool
     */
    public function add(Object $new_equip, bool $overwrite = false, String $room = self::NONE) : bool {
        if (!isset($new_equip)) {
            throw new InvalidArgumentException("DataHandler:add_equipment, Equipment is null");
        }
        $eq_label = $new_equip->get_label();
        if (isset($_SESSION[self::EQUIPMENT][$eq_label]) && !$overwrite) {   // Checks if equipment already exists and whether to overwrite if it does
            return false;
        }
        if ($room != self::NONE) {  // If user inputted a location
            if (!isset($_SESSION[self::ROOMS][$room])) {
                throw new InvalidArgumentException('DataHandler:add_equipment, Room does not exist.');
            }
            try {
                $_SESSION[self::ROOMS][$room]->add_equipment($new_equip);  // will throw exception if room cannot hold new equipment
            } catch (Exception $e) {
                echo "Room's capacity cannot hold new equipment. Equipment will stay in inventory.<br>";
                $room = self::NONE; // sets location to inventory
            }
            $new_equip->set_location($room);
        }
        $_SESSION[self::EQUIPMENT][$eq_label] = $new_equip;
        return true;
    }

    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * Returns false if Equipment does not exist in the database.
     * @param  string $equip_id
     * @return bool
     */
    public function remove(string $equip_id) : bool {
        $equip = $_SESSION[self::EQUIPMENT][$equip_id];

        if (isset($equip)) {
            $room_location = $equip->get_location();
            if ($room_location != self::NONE) {     // Removing from current room location
                try {
                    $_SESSION[self::ROOMS][$room_location]->rm_equipment($equip);
                } catch (Exception $e) {    // On the off chance that Room does not exist in database 
                    echo $e->getMessage();
                    echo "<br>Room does not exist.";
                }
            }
            
            unset($_SESSION[self::EQUIPMENT][$equip_id]);    // Removing from inventory
            return true;
        } else {
            return false;
        }
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
     * Returns false if new Room location does not exist.
     * @param  mixed $equip_id
     * @param  mixed $room_id
     * @throws InvalidArgumentException
     * @return bool
     */
    public function move_equipment(Equipment $equip, string $new_room_id) : bool {     // yet to be implemented
        if (!isset($equip)) {   
            throw new InvalidArgumentException("DataHandler:move_equipment, equipment is null");
        }

        $old_location = $equip->get_location();
        if ($old_location != self::NONE) {  // Removes equipment from old location
            $_SESSION[self::ROOMS][$old_location]->rm_equipment($equip);
        }

        $new_room = $_SESSION[self::ROOMS][$new_room_id];
        if (!isset($new_room)) {    
            return false;       // Room does not exist
        }
        $new_room->add_equipment($equip);   // Room adds equipment
        return true;

    }
    
}
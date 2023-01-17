<?php
//==================================
// Class Definition of DataHandler
//==================================
require_once __DIR__.'/../utility/Equipment.php';
require_once __DIR__.'/../utility/Room.php';
session_start();


class DataHandler {
    
    const MAX_SPACE = 1000;
    const WAREHOUSE = "warehouse";
    const NONE = "";

    private string $rooms = 'room_list', $equipments = 'equip_list';

    /**
     * Constructor for the Handler.
     * Initializes two arrays containing all equipment and all rooms.
     * Automatically creates the warehouse.
     */
    public function __construct() {
        $_SESSION[$this->rooms]  ?? $_SESSION[$this->rooms] = [self::WAREHOUSE => new Room(self::WAREHOUSE, self::MAX_SPACE)];
        $_SESSION['equip_list'] ?? $_SESSION['equip_list'] = [];
    }
    
    /************** Equipment Methods ****************/
    /**
     * Adds an equipment to the database. Returns false if equipment already exists.
     * If overwrite flag is set to true, the old equipment will be overwritten.
     * @param  Equipment $equip to be added
     * @param  string $room Optional room location. 
     * @param  bool $overwrite Default will not allow overwriting, if set to true, overwriting will be allowed.
     * @return bool
     */
    public function add_equipment(Equipment $new_equip, String $room = self::NONE, bool $overwrite = false) : bool {
        if (!isset($new_equip)) {
            throw new InvalidArgumentException("DataHandler:add_equipment, Equipment is null");
        }
        $eq_label = $new_equip->get_label();
        if (isset($_SESSION[$this->equipments][$eq_label]) && !$overwrite) {   // Checks if equipment already exists and whether to overwrite if it does
            return false;
        }
        if ($room != self::NONE) {
            try {
                $_SESSION[$this->rooms][$room]->add_equipment($new_equip);
            } catch (Exception $e) {
                echo $e->getMessage(), "<br>Equipment was not added to room<br>";
            }
            $new_equip->set_location($room);
        }
        $_SESSION[$this->equipments][$eq_label] = $new_equip;
        return true;
    }
        
    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * Returns false if Equipment does not exist in the database.
     * @param  string $equip_id
     * @return bool
     */
    public function rm_equipment(string $equip_id) : bool {
        $equip = $_SESSION[$this->equipments][$equip_id];

        if (isset($equip)) {
            $room_location = $equip->get_location();
            if ($room_location != self::NONE) {     // Removing from current room location
                try {
                    $_SESSION[$this->rooms][$room_location]->rm_equipment($equip);
                } catch (Exception $e) {    // On the off chance that Room does not exist in database 
                    echo $e->getMessage();
                    echo "<br>Room does not exist.";
                }
            }
            
            unset($_SESSION[$this->equipments][$equip_id]);    // Removing from inventory
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
    public function get_equipment(string $equip_id) : Equipment|null {
        return $_SESSION[$this->equipments][$equip_id];
    }
    
    /**
     * Returns an array of all equipment in the database.
     * @return array
     */
    public function get_all_equipment() : array {
        return $_SESSION[$this->equipments];
    }
    
    /**
     * Returns total number of Equipment in the database.
     * @return int
     */
    public function get_total_equipment() : int {
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
            $_SESSION[$this->rooms][$old_location]->rm_equipment($equip);
        }

        $new_room = $_SESSION[$this->rooms][$new_room_id];
        if (!isset($new_room)) {    
            return false;       // Room does not exist
        }
        $new_room->add_equipment($equip);   // Room adds equipment
        $equip->set_location($new_room_id); // Equipment location changes
        return true;

    }



    /***************** Room Methods *******************/
    /**
     * Adds the room to the room array. Returns false if room already exists.
     * If overwrite flag is set to true, the old room will be overwritten.
     * @param  Room $room to be added
     * @param  bool $overwrite By default set to false. If set to true, will allow overwriting.
     * @return bool
     */
    public function add_room(Room $room, bool $overwrite = false) : bool {
        if (!isset($room)) {
            throw new InvalidArgumentException("DataHandler:add_room, Room is null");
        }
        $room_label = $room->get_label();
        if (isset($_SESSION[$this->rooms][$room_label]) && !$overwrite) {   // Checks if equipment already exists and whether to overwrite if it does
            return false;
        }
        $_SESSION[$this->rooms][$room_label] = $room;
        return true;
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * Returns false if room does not exist.
     * @param  mixed $room_id
     * @return bool
     */
    public function rm_room(string $room_id) : bool { 
        $room = $_SESSION[$this->rooms][$room_id];
        if (!isset($room)) {
            return false;
        }
        $room->rm_equipment_all();
        unset($_SESSION[$this->rooms][$room_id]);
        return true;
    }
    
    /**
     * Retrieves the room from the this->room_list. Returns null if not found.
     * @param  mixed $room_id
     * @return Room
     */
    public function get_room(string $room_id) : Room|null {
        return $_SESSION[$this->rooms][$room_id];
    }

    
    /**
     * Returns an array of all rooms in the database.
     * @return array
     */
    public function get_all_rooms() : array {
        return $_SESSION[$this->rooms];
    }

    public function get_total_rooms() {
        return count($_SESSION[$this->rooms]);
    }




    /************** Printing data *****************/
    /**
     * Prints the entire database
     * @return void
     */
    public function get_status() : void {
        echo "<pre>";
        foreach ($_SESSION[$this->rooms] as $room_id => $room) {
            $room->print();
            echo "Equipment:<br>", $room->list_equipment();
            echo "___________________________________________<br>";
        }
        
        echo "Total number of rooms=", count($_SESSION[$this->rooms]), "<br>Total number of Equipment=", count($_SESSION[$this->equipments]), '<br>';
    }
    
    /**
     * Prints out a list of all equipments in the database.
     * @return void
     */
    public function list_all_equipment() : void {
        foreach ($_SESSION[$this->equipments] as $equipid => $equip) {
            $equip->print();
        }
    }

    /**
     * Prints out a list of all rooms in the database.
     * @return void
     */
    public function list_all_rooms() : void {
        foreach ($_SESSION[$this->rooms] as $roomid => $room) {
            $room->print();
        }
    }



}
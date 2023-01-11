<?php
//==================================
// Class Definition of DataHandler
//==================================

require __DIR__.'/../utility/Equipment.php';
require __DIR__.'/../utility/Room.php';

if (!defined("NONE")) { define ("NONE", ""); }
define ("MAX_SPACE", 1000);
define ("WAREHOUSE", "warehouse");


class DataHandler {
    
    private array $room_list;
    private array $equip_list;
    
    /**
     * Constructor for the Handler.
     * Initializes two arrays containing all equipment and all rooms.
     * Automatically creates the warehouse.
     */
    public function __construct() {
        $this->room_list = [WAREHOUSE => new Room(WAREHOUSE, MAX_SPACE)];
        $this->equip_list = [];
    }


    
    /************** Equipment ****************/
    /**
     * Adds an equipment to the database. Returns false if equipment already exists.
     * If overwrite flag is 1, the old equipment will be overwritten.
     * @param  Equipment $equip to be added
     * @param  string $room Optional room location. 
     * @param  int $overwrite Default 0, will not overwrite.
     * @return bool
     */
    public function add_equipment(Equipment $new_equip, String $room = NONE, int $overwrite = 0) : bool {
        if (!isset($new_equip)) {
            throw new InvalidArgumentException("DataHandler:add_equipment, Equipment is null");
        }

        $eq_label = $new_equip->get_label();
        if (isset($this->equip_list[$eq_label]) && !$overwrite) {   // Checks if equipment already exists and whether to overwrite if it does
            return false;
        }
        if ($room != NONE) {
            try {
                $this->room_list[$room]->add_equipment($new_equip);
            } catch (Exception $e) {
                echo $e->getMessage(), "<br>Equipment was not added to room<br>";
            }
            $new_equip->set_location($room);
        }
        $this->equip_list[$eq_label] = $new_equip;
        return true;
    }
        
    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * Returns false if Equipment does not exist in the database.
     * @param  string $equip_id
     * @return bool
     */
    public function rm_equipment(string $equip_id) : bool {
        $equip = $this->equip_list[$equip_id];

        if (isset($equip)) {
            $rm_location = $equip->get_location();
            if ($rm_location != NONE) {     // Removing from current room location
                try {
                    $this->room_list[$rm_location]->rm_equipment($equip);
                } catch (Exception $e) {
                    echo $e->getMessage();
                    echo "<br>Room does not exist.";
                }
            }
            
            unset($this->equip_list[$equip_id]);    // removing from the database
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
        return $this->equip_list[$equip_id];
    }
    
    /**
     * Returns total number of Equipment in the database.
     * @return int
     */
    public function get_total_equipment() : int {
        return count($this->equip_list);
    }
    
    /**
     * Moves equipment between rooms.
     * @param  mixed $equip_id
     * @param  mixed $room_id
     * @return void
     */
    public function move_equip(string $equip_id, string $room_id) {     // yet to be implemented

    }


    /***************** Room *******************/
    /**
     * Adds the room to the room array. Returns false if cannot be added
     * @param  Room $room to be added
     * @return void
     */
    public function add_room(Room $room) : void {
        
    
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * @param  mixed $room_id
     * @return bool
     */
    public function rm_room(string $room_id) : bool { //yet to be implemented haha oops
        return false;
    }
    
    /**
     * Retrieves the room from the room_list. Returns null if not found.
     * @param  mixed $room_id
     * @return Room
     */
    public function get_room(string $room_id) : Room|null {
        return $this->room_list[$room_id];
    }

    public function get_total_rooms() {
        return count($this->room_list);
    }



    /************** Printing data *****************/
    /**
     * Prints the entire database
     * @return void
     */
    public function get_status() : void {
        echo "<pre>";
        foreach ($this->room_list as $room_id => $room) {
            $room->print();
        }
        
        echo "Total number of rooms=", count($this->room_list), "<br>Total number of Equipment=", count($this->equip_list), '<br>';
    }
    
    /**
     * Prints out a list of all equipments in the database.
     * @return void
     */
    public function list_all_equipment() : void {
        foreach ($this->equip_list as $equipid => $equip) {
            $equip->print();
        }
    }



}
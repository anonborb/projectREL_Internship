<?php
//==================================
// Class Definition of DataHandler
//==================================

require __DIR__.'/../utility/Equipment.php';
require __DIR__.'/../utility/Room.php';

define ('WAREHOUSE', 'warehouse');
define("MAX_SPACE", 1000);

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
     * Adds an equipment to the equipment array. Will allow for overwritting if equipment shares an equipment_id;
     * @param  Equipment $equip to be added
     * @return bool
     */
    public function add_equipment(Equipment $new_equip) : bool {
        if (!$this->room_list[WAREHOUSE]->add_equipment($new_equip)) {
            return false;
        }
        $this->equip_list[$new_equip->get_label()] = $new_equip;
        return true;
    }
        
    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * @param  string $equip_id
     * @return bool
     */
    public function rm_equipment(string $equip_id) : bool {
        $equip = $this->equip_list[$equip_id];
        if (isset($this->equip_list[$equip_id])) {

            $rm_location = $this->get_equipment($equip_id)->get_location(); // removing from its current location
            $this->room_list[$rm_location]->rm_equipment($equip);
            
            unset($this->equip_list[$equip_id]);    // removing from the database
            return true;
        } else {
            // throw exception ig
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
    public function move_equip(string $equip_id, string $room_id) {

    }


    /***************** Room *******************/
    /**
     * Adds the room to the room array. Returns false if cannot be added
     * @param  Room $room to be added
     * @return void
     */
    public function add_room(Room $room) : void {
        $this->room_list[$room->get_label()] = $room;
    
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * @param  mixed $room_id
     * @return bool
     */
    public function rm_room(string $room_id) : bool {
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



    
    /**
     * Prints the entire database
     * @return void
     */
    public function get_status() : void {
        echo "<pre>";
        foreach ($this->room_list as $room_id => $room) {
            echo "room_id=", $room_id, ", max capacity=", $room->get_max_capacity(), " curr capacity=", $room->get_curr_capacity();
            echo "<br>Equipment:<br>", $room->list_equipment(),"<br><br>";
        }
        
        echo "Total number of rooms=", count($this->room_list), "<br>Total number of Equipment=", count($this->equip_list), '<br>';

        /*foreach ($this->equip_list as $eqid => $a) {
            echo $eqid, "<br>";
        }*/
    }



}
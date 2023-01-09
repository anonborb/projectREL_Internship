<?php

require 'utility/Room.php';
require 'utility/Equipment.php';

class DataHandler {
    

    private array $room_list;
    private array $equip_list;
    
    /**
     * Constructor for the storage.
     * Initializes two arrays containing all equipment and all rooms 
     */
    public function __construct() {
        $this->room_list = ['warehouse' => new Room('warehouse', MAX_SPACE)];
        $this->equip_list = [];
    }


    
    
    /**
     * Adds an equipment to the equipment array. Returns false if cannot be added.
     * @param  Equipment $equip to be added
     * @return bool
     */
    public function add_equipment(Equipment $equip) : bool {
        return false;
    }
        
    /**
     * Removes specified equipment from the database. Will remove from current room location.
     * @param  string $equip_id
     * @return bool
     */
    public function rm_equipment(string $equip_id) : bool{
        return false;
    }

    public function get_equipment(string $equip_id) : Equipment|null {
        return null;
    }


    
    /**
     * Adds the room to the room array. Returns false if cannot be added
     * @param  Room $room to be added
     * @return bool
     */
    public function add_room(Room $room) : bool {
        return false;
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * @param  mixed $room_id
     * @return bool
     */
    public function rm_room(string $room_id) : bool {
        return false;
    }

    public function get_room(string $room_id) : Room|null {
        return null;
    }



    
    /**
     * Prints the entire database
     * @return void
     */
    public function get_status() : void {
        echo 'hi';
    }





    






}
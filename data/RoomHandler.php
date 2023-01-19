<?php

require_once 'DataHandler.php';

//----------------------------------------------------------------------
// Definition for a Handler that handles all the rooms in the database
//----------------------------------------------------------------------

class RoomHandler extends DataHandler {

    /**
     * Adds the room to the room array. Returns false if room already exists.
     * If overwrite flag is set to true, the old room will be overwritten.
     * @param  Room $room to be added
     * @param  bool $overwrite By default set to false. If set to true, will allow overwriting.
     * @return bool
     */
    public function add(Object $room) {
        if (get_class($room) != 'Room') {
            throw new InvalidArgumentException("DataHandler:add_room, Object must be a Room.");
        }
        $room_label = $room->get_label();
        if (isset($_SESSION[self::ROOMS][$room_label])) {  // checks if room already exists. If it does, all equipment will be removed before overwritting.
            $_SESSION[self::ROOMS][$room_label]->rm_equipment_all();  
        }

        $_SESSION[self::ROOMS][$room_label] = $room;
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * Returns false if room does not exist.
     * @param  mixed $room_id
     * @return bool
     */
    public function remove(string $room_id) { 
        $room = $_SESSION[self::ROOMS][$room_id];
        $room->rm_equipment_all();
        unset($_SESSION[self::ROOMS][$room_id]);
    }

    /**
     * Retrieves the room from the this->room_list. Returns null if not found.
     * @param  mixed $room_id
     * @return Room
     */
    public function get(string $room_id) : Room|null {
        return $_SESSION[self::ROOMS][$room_id];
    }

    /**
     * Returns an array of all rooms in the database.
     * @return array
     */
    public function get_list() : array {
        return $_SESSION[self::ROOMS];
    }
    
    /**
     * Returns total number of Rooms in the database.
     * @return int
     */
    public function get_list_count() : int {
        return count($_SESSION[self::ROOMS]);
    }

}
<?php
require_once 'DataHandler.php';

class RoomHandler extends DataHandler {

    /**
     * Adds the room to the room array. Returns false if room already exists.
     * If overwrite flag is set to true, the old room will be overwritten.
     * @param  Room $room to be added
     * @param  bool $overwrite By default set to false. If set to true, will allow overwriting.
     * @return bool
     */
    public function add(Object $room, bool $overwrite = false) : bool {
        if (!isset($room)) {
            throw new InvalidArgumentException("DataHandler:add_room, Room is null");
        }
        $room_label = $room->get_label();
        if (isset($_SESSION[self::ROOMS][$room_label])) {   // Checks if equipment already exists and whether to overwrite if it does
            if (!$overwrite) {
                return false;
            }
            $_SESSION[self::ROOMS][$room_label]->rm_equipment_all();   // If room being overwritten contains equipment, they will be removed.
        }

        $_SESSION[self::ROOMS][$room_label] = $room;
        return true;
    }
    
    /**
     * Removes the room from the database. Will return all equipment to warehouse.
     * Returns false if room does not exist.
     * @param  mixed $room_id
     * @return bool
     */
    public function remove(string $room_id) : bool { 
        $room = $_SESSION[self::ROOMS][$room_id];
        if (!isset($room)) {
            return false;
        }
        $room->rm_equipment_all();
        unset($_SESSION[self::ROOMS][$room_id]);
        return true;
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
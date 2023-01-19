<?php

require_once 'database_objects/Equipment.php';
require_once 'database_objects/Room.php';
session_start();

abstract class DataHandler {

    protected const MAX_SPACE = 1000;
    protected const WAREHOUSE = 'warehouse';
    protected const NONE = "";
    protected const ROOMS = 'room_list';
    protected const EQUIPMENT = 'equip_list';

    /**
     * Constructor for the Handlers.
     * Initializes two arrays containing all equipment and all rooms.
     * If there are no exisitng rooms, begins the list by automatically creating the warehouse.
     */
    public function __construct() {
        $_SESSION[self::ROOMS]  ?? $_SESSION[self::ROOMS] = [self::WAREHOUSE => new Room(self::WAREHOUSE, self::MAX_SPACE)];
        $_SESSION[self::EQUIPMENT] ?? $_SESSION[self::EQUIPMENT] = [];
    }

    abstract public function add(Object $data);

    abstract public function remove(string $id);

    abstract public function get(string $id) : Object|null;

    abstract public function get_list() : array;

    abstract public function get_list_count() : int;
}
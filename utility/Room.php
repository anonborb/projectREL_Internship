
<?php
//=====================================
// Class definition for Room objects
//=====================================


class Room {
	/* Components of a Room Object */
	private int $curr_capacity, $curr_occupants;
		
	/**
	 * Constructor for a Room object.
	 * @param  string $room_label Unique identifier for each Room.
	 * @param  int $max_capacity Maximum capacity a Room may hold.
	 */
	public function __construct(private string $room_label , private int $max_capacity, private array $equip_list = []) {
		$this->curr_capacity = $max_capacity;
		$this->curr_occupants = 0;
	}



	/**********  Getters **********/
	/**
	 * Returns Room label.
	 * @return string
	 */
	public function get_label(): string {
		return $this->room_label;
	}
	
	/**
	 * Returns max capacity.
	 * @return int
	 */
	public function get_max_capacity() : int {
		return $this->max_capacity;
	}
	
	/**
	 * Returns current capacity.
	 * @return int
	 */
	public function get_curr_capacity() : int{
		return $this->curr_capacity;
	}
	
	/**
	 * Returns number of people currently in the Room.
	 * @return int
	 */
	public function get_curr_occupants() : int {
		return $this->curr_occupants;
	}




	/******** Altering current capacity **********/
	/**
	 * Adds users to current capacity. Unimplemented.
	 * @param  int $num_of_people
	 * @return bool
	 */
	public function add_people(int $num_of_people) : bool {
		if ($this->curr_capacity >= $num_of_people) {
			$this->curr_capacity -= $num_of_people;
			$this->curr_occupants += $num_of_people;
			return true;
		}
		return false;
	}
	
	/**
	 * Subtracts users from current capcity. Unimplemented.
	 * @param  int $num_of_people
	 * @return bool
	 */
	public function rm_people(int $num_of_people) : bool {
		if ($num_of_people <= $this->curr_occupants) {
			$this->curr_capacity += $num_of_people;
			$this->curr_occupants -= $num_of_people;
			return true;
		}
		return false;
	}




	/********** Altering equipment array ***********/
	/**
	 * Adds equipment to eqipment array. Returns false if equipment already exists.
	 * @param  Equipment $new_equipment
	 * @throws InvalidArgumentException
	 * @throws OverflowException
	 * @return bool
	 */
	public function add_equipment(Equipment $new_equip) : bool {
		if (!isset($new_equip)) {
			throw new InvalidArgumentException("Room:add_equipment, Argument is null.");
		}
		$equip_id = $new_equip->get_label();
		$eq_storage = $new_equip->get_storage();

		if ($this->curr_capacity < $eq_storage) {
			throw new OverflowException("Room:add_equipment, Room's capacity cannot hold new equipment.");
		} else if (isset($this->equip_list[$equip_id])) {
			return false; 
		}

		$this->curr_capacity -= $eq_storage;
		$this->equip_list[$equip_id] = $new_equip;
		return true;
	}
	
	/**
	 * Removes equipment from equipment array. Returns false if equipment was not found.
	 * @param  Equipment $equip
	 * @throws InvalidArgumentException
	 * @return bool
	 */
	public function rm_equipment(Equipment $equip) : bool {
		if (!$equip) {
			throw new InvalidArgumentException("Room:rm_equipment, Argument is null.");
		}

		$equip_id = $equip->get_label();
		if (!isset($this->equip_list[$equip_id])) {	// Check if equipment is in the room
			return false;
		}
		$this->curr_capacity += $equip->get_storage();	// Expand room's current capacity
		$equip->rm_location();			// Returns equipment to 
		unset($this->equip_list[$equip_id]);
		return true;
	}
	
	/**
	 * Removes all equipment in the room.
	 * @return void
	 */
	public function rm_equipment_all() {
		foreach ($this->equip_list as $equip_id => $equip) {
			$this->rm_equipment($equip);
		}
	}
	
	/**
	 * Returns an array of all equipment in the room.
	 * @return array
	 */
	public function get_equipment() : array {
		return $this->equip_list;
	}



	
	/************* Printing Methods **************/
	/**
	 * Prints out a list of all equipment in the room.
	 * @return void
	 */
	public function list_equipment() {
		if (empty($this->equip_list)) {
			echo "Room contains no equipment<br>";
		} else {
			foreach ($this->equip_list as $equip_id => $equip) {
				$equip->print();
			}
		}
		
	}
	
	/**
	 * Print 
	 * @return void
	 */
	public function print() {
		echo "room_id=", $this->room_label, ", max capacity=", $this->max_capacity, " curr capacity=", $this->curr_capacity, "<br>";
	}

}	


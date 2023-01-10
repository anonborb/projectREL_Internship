
<?php
//=====================================
// Class definition for Room objects
//=====================================


class Room {
	/* Components of a Room Object */
	private int $curr_capacity;
	private array $equip_list;
		
	/**
	 * Constructor for a Room object.
	 * @param  string $room_label Unique identifier for each Room.
	 * @param  int $max_capacity Maximum capacity a Room may hold.
	 */
	public function __construct(private string $room_label , private int $max_capacity) {
		$this->curr_capacity = $max_capacity;
		$this->equip_list = [];

	}



	/* Getters */
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


	/* Setters */ 
	/**
	 * Changes room label.
	 * @param  string $room_label
	 * @return void
	 */
	public function set_room_label(string $room_label) : void {
		$this->room_label = $room_label;
	}
	
	/**
	 * Changes max capacity.
	 * @param  int $max_capacity
	 * @return void
	 */
	public function set_max_capacity(int $max_capacity) : void {
		$this->max_capacity = $max_capacity;
		/* will need to take into account decreasing room capacity affecting curr capacity */ //how about nnnnnnah
	}


	/* Change rooms current capacity */
	/**
	 * Sets current capacity to num_of_people.
	 * @param  int $num_of_people
	 * @return bool
	 */
	public function set_occupants(int $num_of_people) : bool {
		return false;
	}

	/**
	 * Adds users to current capacity.
	 * @param  int $num_of_people
	 * @return bool
	 */
	public function add_people(int $num_of_people) : bool {
		return false;
	}
	
	/**
	 * Subtracts users from current capcity.
	 * @param  int $num_of_people
	 * @return bool
	 */
	public function rm_people(int $num_of_people) : bool {
		return false;
	}


	/* Changing equipment array */
	/**
	 * Adds equipment to eqipment array. Returns false if equipment cannot be added.
	 * @param  Equipment $new_equipment
	 * @return bool
	 */
	public function add_equipment(Equipment $new_equip) : bool {
		$eq_id = $new_equip->get_label();
		$eq_storage = $new_equip->get_storage();

		if ($this->curr_capacity < $eq_storage || isset($this->equip_list[$eq_id])) {
			return false;
		}

		$this->curr_capacity -= $eq_storage;
		$this->equip_list[$eq_id] = $new_equip;
		return true;
	}
	
	/**
	 * Removes equipment from equipment array. Returns false if equipment was not found.
	 * @param  Equipment $equip
	 * @return bool
	 */
	public function rm_equipment(Equipment $equip) : bool {
		$eq_id = $equip->get_label();
		if (!isset($this->equip_list[$eq_id])) {	// Check if equipment is in the room
			return false;
		}
		$this->curr_capacity += $equip->get_storage();	// Expand room's current capacity
		unset($this->equip_list[$eq_id]);
		return true;
	}
	
	/**
	 * Prints out a list of all equipment in the room.
	 * @return void
	 */
	public function list_equipment() {
		if (!isset($this->equip_list)) {
			echo "Room contains no equipment";
		} else {
			foreach ($this->equip_list as $equip_id => $equip) {
				$equip->print();
			}
		}
		
	}

	public function print() {
		echo "room_id=", $this->room_label, ", max capacity=", $this->max_capacity, " curr capacity=", $this->curr_capacity;
        echo "<br>Equipment:<br>", $this->list_equipment(),"<br><br>";
	}

}	


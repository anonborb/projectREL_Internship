
<?php
//=====================================
// Class definition for Room objects
//=====================================

define("MAX_SPACE", 1000);

class Room {
	/* Components of a Room Object */
	private int $curr_capacity;
	private Equipment $equipment_arr;
		
	/**
	 * Constructor for a Room object.
	 * @param  string $room_label Unique identifier for each Room.
	 * @param  int $max_capacity Maximum capacity a Room may hold.
	 * @return Room
	 */
	public function __construct(private string $room_label , private int $max_capacity) {
		$this->curr_capacity = $max_capacity;
		$this->equipment_arr = [];

	}



	/* Getters for Room objects */

	/**
	 * Returns Room label.
	 * @return string
	 */
	public function get_room_label(): string {
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
		/* will need to take into account decreasing room capacity affecting curr capacity */
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
	 * Adds equipment to eqipment array.
	 * @param  string $eq_label
	 * @return bool
	 */
	public function add_equipment(string $eq_label) : bool {
		return false;
	}
	
	/**
	 * Removes equipment from equipment array.
	 * @param  string $eq_label
	 * @return bool
	 */
	public function rm_equipment(string $eq_label) : bool {
		return false;
	}




	/* possible necessary helper function 
	private function count_curr_capacity() {
		// add up sum of capacity of all objects in equipment array
		// subtract sum from max_capacity to get curr
	}*/


}	


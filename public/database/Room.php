
<?php
/* Class definition for Room objects */

class Room {
	/* Components of a Room object */
	private int $curr_capacity;
	private Equipment $equipment_arr;


	/* Constructor */
	public function __construct(private string $room_label , private int $total_capacity) {
		$this->curr_capacity = $total_capacity;
		$this->equipment_arr = [];

	}

	/* Getters for Room objects */
	public function get_room_label(): string {
		return $this->room_label;
	}

	public function get_total_capacity() : int {
		return $this->total_capacity;
	}

	public function get_curr_capacity() : int{
		return $this->curr_capacity;
	}

	/* Setters */ 
	public function set_room_label(string $room_label) : void {
		$this->room_label = $room_label;
	}

	public function set_total_capacity(int $total_capacity) : void {
		$this->total_capacity = $total_capacity;
		/* will need to take into account decreasing room capacity affecting curr capacity */
	}


	/* Change rooms current capacity */

	/* Sets room user capacity to num_of_people */
	public function set_occupants(int $num_of_people) : bool {
		return false;
	}

	/* Adds room users to current capacity */
	public function add_people(int $num_of_people) : bool {
		return false;
	}

	/* Removes room users form current capcity */
	public function rm_people(int $num_of_people) : bool {
		return false;
	}


	/* Change room equipment */

	/* Adds equipment to eqipment array */
	public function add_equipment(string $eq_label) : bool {
		return false;
	}

	/* Removes equipment from equipment array */
	public function rm_equipment(string $eq_label) : bool {
		return false;
	}




	/* possible necessary helper function 
	private function count_curr_capacity() {
		// add up sum of capacity of all objects in equipment array
		// subtract sum from total_capacity to get curr
	}*/


}	


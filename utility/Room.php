
<?php
//=====================================
// Class definition for Room objects
//=====================================


class Room {
	/* Components of a Room Object */
	private int $curr_capacity;
	private array $equip_arr;
		
	/**
	 * Constructor for a Room object.
	 * @param  string $room_label Unique identifier for each Room.
	 * @param  int $max_capacity Maximum capacity a Room may hold.
	 */
	public function __construct(private string $room_label , private int $max_capacity) {
		$this->curr_capacity = $max_capacity;
		$this->equip_arr = [];

	}



	/* Getters for Room objects */

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
	 * @param  Equipment $new_equipment
	 * @return void
	 */
	public function add_equipment(Equipment $new_equip) {
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

	public function list_equipment() {
		if (!isset($this->equip_arr)) {
			echo "No equipment<br>";
		} else {
			foreach ($this->equip_arr as $equip_id => $equip) {
				echo "id=", $equip_id, ", users=", $equip->get_user_num(), ", storage size=", $equip->get_storage(), "<br>";
			}
		}
		
	}

}	


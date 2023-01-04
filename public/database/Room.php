
<?php
# This defines a Room object

class Room {
	# Components of a Room object
	private $curr_capacity;
	private $equipment_arr;


	# Methods
	public function __construct(private string $room_label , private int $total_capacity) {
		$this->curr_capacity = $total_capacity;
		$this->equipment_arr = [];

	}

	# Getters for Room objects
	public function get_room_label(): string {
		return $this->room_label;
	}

	public function get_total_capacity()  {
		return $this->total_capacity;
	}

	public function get_curr_capacity() {
		return $this->curr_capacity;
	}

	# Setters 
	public function set_room_label($room_label) {
		$this->room_label = $room_label;
	}

	public function set_total_capacity($total_capacity) {
		$this->total_capacity = $total_capacity;
		
	}



	private function count_curr_capacity() {
		# add up sum of capacity of all objects in equipment array
		# subtract sum from total_capacity to get curr
	}


}	


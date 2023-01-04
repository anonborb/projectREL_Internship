
<?php
# This defines a Room object

class Room {
	# Components of a Room object
	private $room_label;
	private $total_capacity;
	private $curr_capacity;
	# insert array of equipment obj

	# Methods
	
	function __construct( $room_label, $total_capacity, $curr_capacity ) {
		$this->room_label = $room_label;
		$this->total_capacity = $total_capacity;
		$this->curr_capacity = $curr_capacity;

	}

}	
?>

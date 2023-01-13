
<?php
//=====================================
// Defines an Equipment object
//=====================================


class Equipment {
	
	const NONE = "";


	/**
	 * Constructor for an Equipment object. Will initilize location to warehouse
	 * @param string $eq_label Unique identifier for each equipment.
	 * @param int $num_of_users	Number of users required to operation the machine.
	 * @param int $storage space How much space this piece of equipment takes up.
	 */
	public function __construct(private string $eq_label, private int $num_of_users, private int $storage_space, private string $location = self::NONE) {
		
	}  


	/****************** Getters *******************/	
	/**
	 * Returns equipment label.
	 * @return string
	 */
	public function get_label(): string {
		return $this->eq_label;
	}
		
	/**
	 * Returns number of users.
	 * @return int
	 */
	public function get_num_users(): int {
		return $this->num_of_users;
	}

	/**
	 * Returns storage space.
	 * @return int
	 */
	public function get_storage(): int {
		return $this->storage_space;
	}
	
	/**
	 * Returns location of equipment.
	 * @return string
	 */
	public function get_location(): string {
		return $this->location;
	}


	/*************** Setters *****************/
	/**
	 * Sets equipment label.
	 * @param string $new_label
	 * @return void
	 */
	public function set_label(string $new_label): void {
		$this->eq_label = $new_label;
	}
	
	/**
	 * Sets number of required users.
	 * @param  int $num_of_users
	 * @return void
	 */
	public function set_user_num(int $num_of_users): void {
		$this->num_of_users = $num_of_users;
	}
	
	/**
	 * Sets required storage space.
	 * @param  int $storage_space
	 * @return void
	 */
	public function set_storage(int $storage_space): void {
		$this->storage_space = $storage_space;
	}
	
	/**
	 * Sets location of equipment to room label
	 * @param  mixed $room
	 * @return void
	 */
	public function set_location(string $room) {
		$this->location = $room;
	}
	
	/**
	 * Sets location of equipment to NONE, equipment will only exist in database inventory.
	 * @return void
	 */
	public function rm_location() {
		$this->location = self::NONE;
	}	

	
	/**
	 * Print function for equipment objects.
	 * @return void
	 */
	public function print() {
		echo "equipid=", $this->eq_label, ", users=", $this->num_of_users, ", storage size=", $this->storage_space, "<br>";
	}




}

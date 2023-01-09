
<?php
//=====================================
// Defines an Equipment object
//=====================================

class Equipment {
	
	/**
	 * Constructor for an Equipment object.
	 * @param string $eq_label Unique identifier for each equipment.
	 * @param int $num_of_users	Number of users required to operation the machine.
	 * @param int $storage space How much space this piece of equipment takes up.
	 * @return Equipment
	 */
	public function __construct(private string $eq_label, private int $num_of_users, private int $storage_space) {}  


	/* Getters */	

	/**
	 * Returns equipment label.
	 * @return string
	 */
	public function get_eq_label(): string {
		return $this->eq_label;
	}
		
	/**
	 * Returns number of users.
	 * @return int
	 */
	public function get_num_of_users(): int {
		return $this->num_of_users;
	}

	/**
	 * Returns storage space.
	 * @return int
	 */
	public function get_storage_space(): int {
		return $this->storage_space;
	}


	/* Setters */

	/**
	 * Changes equipment label.
	 * @param string $new_label
	 * @return void
	 */
	public function set_eq_label(string $new_label): void {
		$this->eq_label = $new_label;
	}
	
	/**
	 * Changes number of required users.
	 * @param  int $num_of_users
	 * @return void
	 */
	public function set_num_of_users(int $num_of_users): void {
		$this->num_of_users = $num_of_users;
	}
	
	/**
	 * Changes required storage space.
	 * @param  int $storage_space
	 * @return void
	 */
	public function set_storage_space(int $storage_space): void {
		$this->storage_space = $storage_space;
	}





}

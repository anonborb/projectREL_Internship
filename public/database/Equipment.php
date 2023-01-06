
<?php
// Defines an Equipment object

class Equipment {
	/* Components of an Equipment object:
		eq_label	- unique identifier
		num_of_users
		storage_space
	*/

	
	/* Constructor */
	public function __construct(private string $eq_label, private int $num_of_users, private int $storage_space) {}  


	/* Getters */
	public function get_eq_label(): string {
		return $this->eq_label;
	}
	
	public function get_num_of_users(): int {
		return $this->num_of_users;
	}

	public function get_storage_space(): int {
		return $this->storage_space;
	}


	/* Setters */
	public function set_eq_label(string $new_label): void {
		$this->eq_label = $new_label;
	}

	public function set_num_of_users(int $num_of_users): void {
		$this->num_of_users = $num_of_users;
	}

	public function set_storage_space(int $storage_space): void {
		$this->storage_space = $storage_space;
	}

	



}

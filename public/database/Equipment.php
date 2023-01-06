
<?php
// Defines an Equipment object

class Equipment {
	/* Components of an Equipment:
		eq_label	- unique identifier
		num_of_users
		storage space
	*/

	

	
	// Constructor
	public function __construct(private string $eq_label, private int $num_of_users, private int $storage_space) {
		
	}  

	
}

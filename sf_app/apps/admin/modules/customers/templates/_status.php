<?php echo $customer -> getStatus() == Customer::STATUS_ACTIVE ? image_tag("lightbulb", array("alt_title" => "Customer is active")) : image_tag("lightbulb_off", array("alt_title" => "Customer is inactive")); ?>
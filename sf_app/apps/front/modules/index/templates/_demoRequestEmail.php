<?php echo $values["name"]; ?> has just submitted the Demo Request Form.

Email: <?php echo $values["email"]; echo "\n"; ?>
Phone: <?php echo $values["phone"]; echo "\n"; ?>
Best Time: <?php echo $values["best_time"]; echo "\n"; ?>
Source: <?php echo $values["how_did_you_hear"] != "other" ? $values["how_did_you_hear"] : $values["hear_other"]; echo "\n"; ?>

Comments:
<?php echo $values["comments"]; ?>
<?php
/**
 * class teChangeLogEntryFormatter.
 *
 * @author Daniel Richter
 */
class teChangeLogEntryFormatter extends ncChangeLogEntryFormatter
{
  protected
    /* Update formats: available placeholders: * %field_name% * %old_value% * %new_value% */
    $valueUpdateFormat   = "<strong>'%field_name%'</strong> changed <strong>from</strong> '%old_value%' <strong>to</strong> '%new_value%'.<br />\n",
    $valueAdditionFormat = "<strong>'%field_name%'</strong> was <strong>set to</strong> '%new_value%'. It had no value set before.<br />\n",
    $valueRemovalFormat  = "<strong>'%field_name%'</strong> was <strong>unset</strong>. It's previous value was '%old_value%'.<br />\n",
    /* Insertion format: available placeholders: * %object_name% * %pk% */
    $insertionFormat     = "A new %object_name% has been created and it has been given the primary key '%pk%'.",
    /* Deletion format: available placeholders: * %object_name% * %pk% */
    $deletionFormat      = "The %object_name% with primary key '%pk%' has been deleted.";
}

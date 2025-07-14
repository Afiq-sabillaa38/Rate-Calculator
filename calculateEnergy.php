<?php
function calculateEnergy($power, $hours) {
    // Power is in Watts, convert to kWh
    return ($power * $hours) / 1000;
}
?>
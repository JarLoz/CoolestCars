<?php
/* A. Database. Search. Yay. I'm currently pondering why I even bother to write all these comments, but then
   I'm a firm believer that every file of code needs a comment explaining it's contents in plain language.
   Sometimes trying to decipher what a certain two-row algorithm can be surprisingly hard. In this case?
   Propably not. */
$searchresult = A('db:manufacturer_scoreboard');
$manufacturers = $searchresult->fetchAll();

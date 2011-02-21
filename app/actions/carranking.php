<?php
/* A database search. What did you expect? */
$searchresult = A('db:scoreboard');
$allcars = $searchresult->fetchAll();

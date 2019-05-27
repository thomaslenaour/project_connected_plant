<?php

require_once '_classes/DbRequests.php';
$db = new DbRequests(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
$db->setFetchMode(PDO::FETCH_ASSOC);
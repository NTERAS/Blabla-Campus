<?php

session_start();
session_unset();
session_destroy();

//back to page
header("location: ../../index.php?status=session-ended");
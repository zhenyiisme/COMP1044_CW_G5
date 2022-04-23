<?php

session_start();
session_unset();
session_destroy();

header("location: ../DatabaseCW.html");
exit();
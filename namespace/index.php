<?php
include 'file1.php';
include 'file2.php';

use file1\url\test as file1;
use file2\url\test as file2;

file1\welcome();

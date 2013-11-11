php
===

php tech test


contains 3 files

1. demo.php

2. OpenFile.class.php

3. UseFilterIterator.class.php


===========================
demp.php
===========================

program run through this file

calls both class.php file using autoload magic function and obtaining through require_once;

Step2: calls the read_the_file(FILENAME), FILENAME is a constant containing clips.csv file name the source file

Step3: create ArrayObject  and store it in $object variable;

Step4: pas as Iteratior in UseFilterIterator class constructor where it will initalise;

Step 5: iterate the iterator obtained from accept method of UseFilterIterator;

Step6: save the file in the server;


=============================
OpenFile.class.php
=============================
this file parse the clips.csv file and store the content into array

fgetcsv function used to parse the file

parsed content is stored in $csvarray and stored in $array in demo.php


================================
UseFilterIterator.class.php
================================
this file extends FilterIterator and implements the accept() abstract method which returns the current item of the iterator

Once we get the current item validate through given conditions in demo.php

according to validation push in valid array or invalid array

create invalid.csv from invalid array and valid.csv from valid array and store on the server.

======================================
DEMO URL
======================================
<a href="http://people.rit.edu/~smt9471/739/vimeo/demo.php" >Link </a>

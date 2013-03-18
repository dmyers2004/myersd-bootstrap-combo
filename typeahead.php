<?php
/*
we are just going to return everything
we of course could do the filter and sort here thou
*/

$options = array(
          "Scott Joplin",
          "Charles Bolden",
          "Duke Ellington",
          "Louis Armstrong",
          "Earl Hines",
          "Fats Waller",
          "Count Basie",
          "Benny Goodman",
          "Sun Ra",
          "Thelonious Monk",
          "Dizzy Gillespie",
          "Charlie Parker",
          "Dave Brubeck",
          "Charles Mingus",
          "Oscar Peterson",
          "Miles Davis",
          "John Coltrane",
          "Chet Baker",
          "Ornette Coleman",
          "Wynton Marsalis",
          "Billie Holiday",
          "Ella Fitzgerald",
          "Sarah Vaughan"
        );
        
$data['options'] = $options;

header('Content-type: text/json');
header('Content-type: application/json');

echo json_encode($data);

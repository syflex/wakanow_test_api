<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Frog.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate frog object
  $frog = new Frog($db);

  // Frogquery
  $result = $frog->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $frog_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $frog_item = array(
        'id' => $id,
        'color' => $color,
        'weight' => $weight,
        'length' => $length,
        'width' => $width,
        'sex' => $sex,
        'live_cycle' => $live_cycle,
        'description' => $description
      );

      // Push to "data"
      array_push($frog_arr, $frog_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($frog_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Frog Found')
    );
  }

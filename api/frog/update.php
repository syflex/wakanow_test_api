<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Frog.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate frog object
  $frog = new Frog($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $frog->id = $data->id;

  $frog->number = $data->number;
  $frog->color = $data->color;
  $frog->weight = $data->weight;
  $frog->length = $data->length;
  $frog->width = $data->width;
  $frog->sex = $data->sex;
  $frog->live_cycle = $data->live_cycle;
  $frog->description = $data->description;

  // Update frog
  if($frog->update()) {
    echo json_encode(
      array('message' => 'Frog Data Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Frog Not Updated')
    );
  }


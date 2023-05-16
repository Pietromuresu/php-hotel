<?php

  $hotels = [

      [
          'name' => 'Hotel Belvedere',
          'description' => 'Hotel Belvedere Descrizione',
          'parking' => true,
          'vote' => 4,
          'distance_to_center' => 10.4
      ],
      [
          'name' => 'Hotel Futuro',
          'description' => 'Hotel Futuro Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 2
      ],
      [
          'name' => 'Hotel Rivamare',
          'description' => 'Hotel Rivamare Descrizione',
          'parking' => false,
          'vote' => 1,
          'distance_to_center' => 1
      ],
      [
          'name' => 'Hotel Bellavista',
          'description' => 'Hotel Bellavista Descrizione',
          'parking' => false,
          'vote' => 5,
          'distance_to_center' => 5.5
      ],
      [
          'name' => 'Hotel Milano',
          'description' => 'Hotel Milano Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 50
      ],

    ];

    $withParking= [];

    foreach($hotels as $hotel)
      if ($hotel['parking'] === true) 
        $withParking[] = $hotel;
  
  $filter = $_POST['filter'] ?? 'all';
  $selected = $filter;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>PHP Hotels</title>
</head>
<body>
<div class="container my-5">

  <form action="index.php" method="POST">
    <select name="filter">
      <option value="all" selected>All</option>
      <option value="withParking">Parking Available</option>
    </select>
    <button type="submit" value="send" class="ms-3 btn btn-dark">Filter</button>
  </form>
  
</div>
<!-- Viene mostrato di default perchè non abbiamo valorizzato "$selected" tramite la select -->
<?php if($selected == 'all'){?>
<div class="container">

  <table class="table">
    <thead class="w-75">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Parking</th>
        <th scope="col">Vote</th>
        <th scope="col">Distance to center</th>
      </tr>
    </thead>
    <tbody>
      <!-- Mostro tutti gli hotel presenti nell'array "$hotels" -->

      <?php foreach($hotels as $hotel){?>
        <tr>
          <th scope="row">
            <?php echo $hotel['name'] ?>
          </th>
          <td>
            <?php echo $hotel['description'] ?>
          </td>

          <?php if( $hotel['parking'] == 1){ ?>
          <td>
            True
          </td>
          <?php }else{ ?>
            <td>
            False
          </td>
          <?php } ?>

          <td>
            <?php echo $hotel['vote'] ?>
          </td>
          <td>
            <?php echo $hotel['distance_to_center'] ?> km
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
  </div>

<!-- Viene mostrato solo se abbiamo valorizzato selected tramite la select -->

<?php }else{?>
  <div class="container">

  <table class="table">
    <thead class="w-75">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Parking</th>
        <th scope="col">Vote</th>
        <th scope="col">Distance to center</th>
      </tr>
    </thead>
    <tbody>
      <!-- Mostro tutti gli hotel che hanno un parcheggio -->
      <?php foreach($withParking as $hotel){?>
        <tr>
          <th scope="row">
            <?php echo $hotel['name'] ?>
          </th>
          <td>
            <?php echo $hotel['description'] ?>
          </td>

          <?php if( $hotel['parking'] == 1){ ?>
          <td>
            True
          </td>
          
          <?php } ?>

          <td>
            <?php echo $hotel['vote'] ?>
          </td>
          <td>
            <?php echo $hotel['distance_to_center'] ?> km
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
  </div>
<?php }?>
</body>
</html>
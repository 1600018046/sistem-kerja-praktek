<?php include_once('templates/header.php'); ?>
<div id="carouselSatu" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="opacity: .8 !important;" height="400px" src="https://assets.grab.com/wp-content/uploads/sites/9/2018/10/22101906/ID-Q4-GRAB-X-GOODS-GTM-KV-01.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="opacity: .8 !important;" height="400px" src="https://images.unsplash.com/photo-1553161110-da7abad2dbf5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="opacity: .8 !important;" height="400px" src="https://images.unsplash.com/photo-1553161110-da7abad2dbf5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="Third slide">
    </div>
  </div>
</div>

<div class="container my-4">
  <form action="events.php" method="get" onsubmit="return isValid()">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="form-group">
          <label for="category" class="text-muted">Event Category</label>
          <select class="form-control" name="category" id="category">
            <option value="all">Select All</option>
            <option value="education">Education</option>
            <option value="technology">Technology</option>
            <option value="healthy">Health and Beauty</option>
          </select>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="form-group">
          <label for="location" class="text-muted">Location</label>
          <select name="location" id="location" class="form-control">
            <option value="jabodetabek">All Location</option>
            <option value="jakarta">Jakarta</option>
            <option value="bogor">Bogor</option>
            <option value="depok">Depok</option>
            <option value="tangerang">Tangerang</option>
            <option value="bekasi">Bekasi</option>
          </select>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="form-group">
          <label for="date" class="text-muted">Date</label>
          <input type="date" name="date" id="date" class="form-control">
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <button type="submit" class="btn btn-primary btn-block float-right" style="margin-top: 32px">Search Filter</button>
      </div>
    </div>
  </form>
</div>

<script>
  let category = document.getElementById('category');
  let locate = document.getElementById('location');
  let date_value = document.getElementById('date');

  var isValid = function() {
    if (category.value === '' || locate.value === '') {
      Swal.fire('Oops!', 'Any content filter is empty!', 'warning');
      return false;
    }
    return true;
  }
</script>

<?php
include 'database/db.php';
$q = "select * from events";
$sql = mysqli_query($c, $q);
?>

<div class="container-fluid">
  <div class="row">
    <?php foreach ($sql as $data) : ?>
      <div class="col-lg-3 col-md-3 my-2">
        <div class="card" style="width: 18rem;">
          <img src="<?= $data['image_url'] ?>" class="card-img-top" alt="this is image of event">
          <div class="card-body">
            <h5 class="card-title"><?= $data['title']; ?></h5>
            <p class="card-text"><?= $data['description']; ?></p>
            <a href="detail_event.php?id=<?= $data['id']; ?>" class="btn btn-success">Go Detail</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
<div class="container mt-4">
  <p class="text-center">
    <a href="#!">See More</a>
  </p>
</div>
<?php include_once('templates/footer.php'); ?>
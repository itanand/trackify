<?php
include('authentication.php');
include('includes/header.php');
include('includes/topnavbar.php');
include('includes/sidebar.php');
?>

<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="content-wrapper">

<section class="content mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Gift Category
                            <a href="#" data-toggle="modal" data-target="#CategoryModal" class="btn btn-primary float-right">Add</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<?php
   include('includes/script.php');
?>
<?php
   include('includes/footer.php');
?>
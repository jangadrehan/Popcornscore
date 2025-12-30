<!DOCTYPE html>

<html>
<?php include("common/header.php");?>
    <body class="theme-blue">
        <!-- Page Loader -->
    <div class="page-loader-wrapper">
      <div class="loader">
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <p>Please wait...</p>
      </div>
    </div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php include("common/sidebar.php");?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Add Movie</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="listmovies.php">List Of Movies</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
        </div>
        <div class="card">
            <div class="body">
                <form action="movie_record.php" class="col-md-12" enctype="multipart/form-data" id="" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input class="form-control" name="moviename" required="" type="text"/>
                            <label class="form-label">Enter Movie Name</label>
                        </div>
                    </div>
                    <div id="actor-fields-wrapper">
                        <div class="dynamic-field row align-items-center">
                            <div class="form-group col-md-5 col-sm-12 mt-2">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="actors[]" placeholder="Enter Actor Name" required>
                                </div>
                            </div>
                            <div class='col-md-5 col-sm-12'>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image[]" placeholder="Add File"  id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <button class="btn btn-warning btn-raised waves-effect btn-sm remove-actor" style="margin:5px 0;" type="button">Remove</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-raised waves-effect btn-sm" id="add-actor" style="margin-bottom:15px;" type="button">Add Actor</button>
        
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input class="form-control" name="director" required="" type="text"/>
                            <label class="form-label">Enter Director Name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input class="form-control" name="producer" required="" type="text"/>
                            <label class="form-label">Enter Producer Name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea class="form-control" name="details" required=""></textarea>
                            <label class="form-label">Enter Details</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="poster" placeholder="Add Poster"  id="customFile" required>
                            <label class="custom-file-label" for="customFile">Choose Poster file</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea class="form-control" name="trailer" required=""></textarea>
                            <label class="form-label">Enter URL</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea class="form-control" name="wiki" required=""></textarea>
                            <label class="form-label">Enter Wikipidia URL</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" placeholder="Add Poster"  id="customFile" required>
                            <label class="custom-file-label" for="customFile">Choose Photo file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="filled-in chk-col-pink" id="terms" name="terms" type="checkbox"/>
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
                    <div class="text-left">
                        <button class="btn btn-primary btn-raised waves-effect" name="submit" type="submit" value="Upload">Add Movie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="../public/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="../public/backend/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="../public/backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="../public/backend/bundles/flotscripts.bundle.js"></script><!-- Flot Charts Plugin Js -->
<script src="../public/backend/bundles/morrisscripts.bundle.js"></script><!-- Flot Charts Plugin Js -->
<script src="../public/backend/plugins/jquery-knob/jquery.knob.min.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="../public/backend/bundles/jvectormapscripts.bundle.js"></script><!-- JVectorMap Plugin Js -->
<script src="../public/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="../public/backend/js/pages/index.js"></script>
<script src="../public/backend/js/pages/charts/sparkline.js"></script>
<script src="../public/backend/js/pages/maps/jvectormap.js"></script>
<script src="../public/backend/js/pages/charts/jquery-knob.js"></script>
<script>
document.getElementById('add-actor').addEventListener('click', function () {
    const wrapper = document.getElementById('actor-fields-wrapper');
    const field = document.createElement('div');
    field.innerHTML = `
        <div class="dynamic-field row align-items-center mt-2">
            <div class="form-group col-md-5 col-sm-12 mt-2">
                <div class="form-line">
                    <input type="text" class="form-control" name="actors[]" placeholder="Enter Actor Name" required>
                </div>
            </div>
            <div class='col-md-5 col-sm-12'>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image[]" placeholder="Add File"  id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <button class="btn btn-warning btn-raised waves-effect btn-sm remove-actor" style="margin:5px 0;" type="button">Remove</button>
            </div>
        </div>

    `;
    wrapper.appendChild(field);
});

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-actor')) {
        e.target.parentElement.parentElement.remove();
    }
});
$(document).on("change", ".custom-file-input", function () {
    let fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
});
</script></body>
</html>
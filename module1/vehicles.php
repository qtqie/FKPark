<?php
require_once 'dbase.php';

global $conn;

if (isset($_GET['user_id'])) {
    $vehicle_id = (int) $_GET['vehicle_id'];
    $select = <<<EOL
    SELECT * FROM vehicle_info WHERE vehicle_id = $vehicle_id;
    EOL;
} else {
    $select = <<<EOL
    SELECT * FROM vehicle_info WHERE vehicle_id = {$_SESSION['vehicle_id']};
    EOL;

}

$result = mysqli_query($conn, $select);

?>
<div class="container">
<h1 class="mb-3">
    Vehicles
</h1>
<div class="mb-4 d-flex gap-4">
    <a href="vehicles_form.php" class="btn btn-outline-success">Register Vehicle</a>
</div>
<div class="row">
<?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-6">
            <div class="card mb-3 shadow" style="min-height: 3rem;">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class=""><?= strtoupper($row['vehicle_plate']) ?></h5>
                        <p><?= $row['vehicle_type'] ?></p>
                        <p>
                            <?php
                            if ($row['approval_status'] === '0')
                                echo '<strong class="text-danger">Not Approved</strong>';
                            else
                                echo '<strong class="text-success">Approved</strong>';
                            ?>
                        </p>
                    </div>

                    
                </div>
            </div>
            </div>
        <?php
    }

?>
</div>
</div>


<?php

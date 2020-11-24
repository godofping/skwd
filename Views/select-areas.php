<?php include('header.php'); ?>
<?php include('menu.php'); ?>

    <div class="container mt-3">

        <?php foreach ($this->db->selectPumpStationUserByUserID($_SESSION['userid']) as $res): ?>

            <div class="row">

                <div class="col-12">

                    <h5 class="text-secondary">My Areas</h5>
                    
                    <div class="card bg-info">
                        <div class="card-body">
                    
                            <h3 id="numberofusers" class="text-white"><?=$res['areaname']?></h3>
                            <a href="?p=data-entry&pumpid=<?=$res['pumpid']?>"><button class="btn btn-secondary">VIEW</button></a>

                        </div>
                    </div>

                </div>

            </div>
            
        <?php endforeach ?>

    </div>


<?php include('footer.php'); ?>
<script type="text/javascript" src="Resources/assets/js/dashboard.js"></script>
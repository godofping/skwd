<?php include('header.php'); ?>
<?php include('menu.php'); ?>

    <div class="container">

        <?php foreach ($this->db->selectPumpStationUserByUserID($_SESSION['userid']) as $res): ?>

            <div class="row mt-3">

                <div class="col-12">

                    <div class="card bg-info">
                        <div class="card-body">
                    
                            <h5 id="numberofusers" class="text-white"><?=$res['pumpstationname'].", ".$res['areaname']?></h5>
                            <a href="?p=data-entry&pumpingstationuserid=<?=$res['pumpingstationuserid']?>"><button class="btn btn-secondary">VIEW</button></a>

                        </div>
                    </div>

                </div>

            </div>
            
        <?php endforeach ?>

    </div>


<?php include('footer.php'); ?>
<script type="text/javascript" src="Resources/assets/js/dashboard.js"></script>
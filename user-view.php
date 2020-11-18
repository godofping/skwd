<?php include('header.php'); 

include('user-header.php');

           if (isset($_GET['from']) and $_GET['from'] == 'checkIDforuserDATA') {

          $stmt = $connection->prepare("select * from user_data_view where userpumpID = ? ");
            $stmt->bind_param("s", $_GET['userpumpID']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $capacityvalue = $row['capacity'];
            $housermetervalue = $row['hourmeter'];
            $submersiblepumpvalue = $row['submersiblepump'];
            $hourmeter2value = $row['hourmeter2'];
            $boosterpumpvalue = $row['boosterpump'];
            $flowmetervalue = $row['flowmeter'];;
            $dischargevalue = $row['discharge'];
            $fhrvalue = $row['fhr'];
            $fminsvalue = $row['fmins'];
            $fsecvalue = $row['fsec'];
            $bhrvalue = $row['bhr'];
            $bminsvalue = $row['bmins'];
            $bsecvalue = $row['bsec'];
            $present2value = $row['present2'];
            $previous2value = $row['previous2'];
            $fhr2value = $row['fhr2'];
            $fmins2value = $row['fmins2'];
            $fsec2value = $row['fsec2'];
            $bhr2value = $row['bhr2'];
            $bmins2value = $row['bmins2'];
            $bsec2value = $row['bsec2'];
            $lhrvalue = $row['lhr'];
            $lminvalue = $row['lmin'];
            $whrvalue = $row['whr'];
            $wminvalue = $row['wmin'];


            $capacitysum = (67.5*24)*$capacityvalue;
            $hourandsubsub = $housermetervalue - $submersiblepumpvalue;

            $totalhourandboost = $hourmeter2value - $boosterpumpvalue;
            $totalvol = $flowmetervalue - $dischargevalue;

            $totalfmins = $fminsvalue/60;
            $totalfsec = $fsecvalue/3600;
            $totalfminsandfsec = $totalfmins + $totalfsec;

            $totalbmins = $bminsvalue/60;
            $totalbsec = $bsecvalue/3600;
            $totalbminsandbsec = $totalbmins + $totalbsec;

            $totalflowandbooster = $present2value - $previous2value;

            $totalfmins2 = $fmins2value/60;
            $totalfsec2 = $fsec2value/3600;
            $totalfmin2andsec2 = $totalfmins2 + $totalfsec2;

            $totalbmins2 = $bmins2value/60;
            $totalbsec2 = $bsec2value/3600;
            $totalbmin2andbec2 = $totalbmins2 + $totalbsec2;

            $loadlmin = $lminvalue/60;
            $totallhrandlmin = $lhrvalue + $loadlmin;

            $warwmin = $wminvalue/60;
            $totalwarmhrandwarm = $whrvalue + $warwmin;

            $overalltotalloadandwarm = $totallhrandlmin + $totalwarmhrandwarm;


           }

?>


<!--Main Layout-->
<main class=" py-5">

<div class="container">
    <div class="row">
      <div class="col-md-12">
      <div class="card">
        
         <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong>MONTHLY PRODUCTION DATA (<?php echo $row['areaName']; ?> )</strong></h4>
    <!-- Subtitle -->
    <h6 class="font-weight-bold indigo-text py-2"><?php echo $row['pumpname']; ?></h6>
    
    <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Capacity, Cu.M./MO.</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['capacity']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>.</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $capacitysum; ?>">  
                          </div>
                        </div>
                      </div>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hour meter (Hr.)</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['hourmeter']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Submersible pump</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['submersiblepump']; ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($hourandsubsub,2); ?>">

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hour meter (Hr.)</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['hourmeter2']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Booster pump</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['boosterpump']; ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalhourandboost,2) ?>">

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Flowmeter-</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['flowmeter']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Discharge-Q(Cu.M)</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['discharge']; ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Vol. of H2o Pumped</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $totalvol ?>">

                      <h6 class="font-weight-bold py-2">Flush Out</h6>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['fhr']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfmins,2); ?>">  
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Seconds</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfsec,2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfminsandfsec,2); ?>">

                      <small>Vol. of H2o Flushed out</small>
                      <input style="text-align: center;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['flushout'] ?>">

                      <h6 class="font-weight-bold py-2">Backwashing</h6>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['bhr']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalbmins,2); ?>">  
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Seconds</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfsec,2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalbminsandbsec,2); ?>">

                      <small>Vol. of H2o Used</small>
                      <input style="text-align: center;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['h2oused'] ?>">

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Flowmeter-Q(Cu.m)</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['present2']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Booster pump</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['previous2']; ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalflowandbooster,2); ?>">

                      <h6 class="font-weight-bold py-2">Flush Out</h6>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['fhr2']; ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfmins2,2); ?>">  
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Seconds</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalfsec2,2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $totalfmin2andsec2 ?>">

                      <small>Vol. of H2o Flushed out</small>
                      <input style="text-align: center;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['flushout2'] ?>">

                      <h6 class="font-weight-bold py-2">Backwashing</h6>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($row['bhr2'],2); ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalbmins2,2); ?>">  
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Seconds</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalbsec2,2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalbmin2andbec2,2) ?>">

                      <small>Vol. of H2o Used</small>
                      <input style="text-align: center;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo $row['h2oused2'] ?>">

                      <h6 class="font-weight-bold py-2">Genset hour meter (HR)</h6>

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Load Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($row['lhr'], 2); ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($loadlmin, 2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totallhrandlmin,2); ?>">

                      <div class="form-row mb-2">
                        <div class="col">
                          <div class="form-group">
                            <small>Warm Hours</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($row['whr'], 2); ?>">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <small>Minutes</small>
                            <input style="text-align: center" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($warwmin, 2); ?>">  
                          </div>
                        </div>
                      </div>

                      <small>Total</small>
                      <input style="text-align: center; background-color: yellow;" name="submersiblepump" type="text" style="border-radius: 12px;" disabled="" class="form-control mb-4" required="" value="<?php echo round($totalwarmhrandwarm,2); ?>">

                      <h3 class="font-weight-bold py-2">Over all total of load & warm-up (HRS): <u><?php echo $overalltotalloadandwarm; ?></u></h3>

  </div>

      </div>
  </div>    
</div>

</main>
<!--Main Layout-->

<?php include('footer.php'); ?>

<script type="text/javascript">

$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

</script>

<style type="text/css">
	
	.error {
      color: red;
 }

</style>
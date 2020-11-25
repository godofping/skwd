<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<?php $pumpingstationuser = $this->db->selectPumpStationUserByID($_GET['pumpingstationuserid']); ?>

    <div class="container">
        <div class="row my-2">

            <div class="col-md-12">

                <a href="?p=select-areas"><button class="btn btn-dark my-3">Back</button></a>

                <div class="card">
                    <div class="card-body">
                
                        <h6>Data Entry of <?=$pumpingstationuser['pumpstationname'].", ".$pumpingstationuser['areaname']?></h6>

                        <button class="btn btn-success my-2" data-toggle="modal" data-target="#createModal">Create</button>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="maintable" name="maintable">
                                <thead>
                                    <tr>
                                        <th>ENTRY ID</th>
                                        <th>Date of Entry</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create</h5>
                </div>
                <form id="createForm" name="createForm">
                    <div class="modal-body m-2">

                        <div id="first">

                            <div class="row">
                                <div class="col-3 px-1">
                         
                                </div>
                                <div class="col-5 px-1">
                                    <b>Formula Value</b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="forval" name="forval">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Capacity, Cu.M./Mo.</b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d10" name="d10">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="e10" name="e10">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Hour meter (Hr.)</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Submersible pump</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="second">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Hour meter(Hr)</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d11" name="d12">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Booster pump</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="third">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Flowmeter-</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Discharge-Q(Cu.M)</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Vol. of H2O Pumped</b>
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="fourth">
                            <div class="row">
                                <div class="col-4 px-1">
              
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Flush out</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                          
                                </div>
                                <div class="col-2 px-1">
                                    <label>sec</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Vol. of H2O flushed out</b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="fifth">
                            <div class="row">
                                <div class="col-4 px-1">
              
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Backwashing</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                          
                                </div>
                                <div class="col-2 px-1">
                                    <label>sec</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Vol. of H2O Used</b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="sixth">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Flowmeter-Q(Cu.m)</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>(Booster pump)</b>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="seventh">
                            <div class="row">
                                <div class="col-4 px-1">
              
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Flush out</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                          
                                </div>
                                <div class="col-2 px-1">
                                    <label>sec</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Vol. of H2O flushed out  </b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="eight">
                            <div class="row">
                                <div class="col-4 px-1">
              
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Backwashing</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                          
                                </div>
                                <div class="col-2 px-1">
                                    <label>sec</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <b>Total</b>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Vol. of H2O Used</b>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="ninth">
                            <div class="row">
                                <div class="col-12 px-1">
                                    <b>Genset hour meter (hr)</b>
                                </div>

                                <br>
                                <br>

                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>LOAD</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                       
                                </div>

                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>WARM-UP</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                       
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                   
                            <div class="row">
                                <div class="col-4 px-1">
                                    <b>Over all total of load & warm-up</b>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>


                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                </div>
                <form id="deleteForm" name="deleteForm">
                    <div class="modal-body">

                        <p>Are you sure to delete <span id="namespan"></span>?</p>

                        <input type="text" id="deleteid" name="deleteid" hidden="">
                    
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>
<!-- <script type="text/javascript" src="Resources/assets/js/data-entry.js"></script> -->
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
                                <div class="col-4 px-1">
                                    <label>Formula Value</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="forval" name="forval">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                              
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Capacity, Cu.M./Mo.</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d10" name="d10">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e10" name="e10">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Hour meter (Hr.)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d11" name="d11">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Submersible pump</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d12" name="d12">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d13" name="d13">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="second">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Hour meter(Hr)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d15" name="d15">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Booster pump</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d16" name="d16">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d17" name="d17">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="third">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flowmeter-</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d19" name="d19">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Discharge-Q(Cu.M)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d20" name="d20">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Pumped</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d21" name="d21">
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
                                        <input type="number" class="form-control" id="d23" name="d23">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e23" name="e23">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d24" name="d24">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e24" name="e24">
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
                                        <input type="number" class="form-control" id="d25" name="d25">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e25" name="e25">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e26" name="e26">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O flushed out</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c27" name="c27">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d27" name="d27">
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
                                        <input type="number" class="form-control" id="d30" name="d30">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e30" name="e30">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d31" name="d31">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e31" name="e31">
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
                                        <input type="number" class="form-control" id="d32" name="d32">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e32" name="e32">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e33" name="e33">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c34" name="c34">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d34" name="d34">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="sixth">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flowmeter-Q(Cu.m)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d38" name="d38">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>(Booster pump)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d39" name="d39">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d40" name="d40">
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
                                        <input type="number" class="form-control" id="d43" name="d43">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e43" name="e43">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d44" name="d44">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e44" name="e44">
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
                                        <input type="number" class="form-control" id="d45" name="d45">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e45" name="e45">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e46" name="e46">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O flushed out  </label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c47" name="c47">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d47" name="d47">
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
                                        <input type="number" class="form-control" id="d50" name="d50">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e50" name="e50">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d51" name="d51">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e51" name="e51">
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
                                        <input type="number" class="form-control" id="d52" name="d52">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e52" name="e52">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e53" name="e53">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c55" name="c55">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d55" name="d55">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="ninth">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label>Genset hour meter (hr)</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>LOAD</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d58" name="d58">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e58" name="e58">
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
                                        <input type="number" class="form-control" id="d59" name="d59">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e59" name="e59">
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
                                        <input type="number" class="form-control" readonly="" id="e60" name="e60">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>WARM-UP</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="d61" name="d61">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e61" name="e61">
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
                                        <input type="number" class="form-control" id="d62" name="d62">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e62" name="e62">
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
                                        <input type="number" class="form-control" readonly="" id="e63" name="e63">
                                    </div>
                                </div>
                            </div>

                   
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Over all total of load & warm-up</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e65" name="e65">
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

    <div class="modal fade" id="viewModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View</h5>
                </div>
                <form id="viewForm" name="viewForm">
                    <div class="modal-body m-2">


                        <div id="first">

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Formula Value</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="forval_" name="forval_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                              
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Capacity, Cu.M./Mo.</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d10_" name="d10_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e10_" name="e10_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Hour meter (Hr.)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d11_" name="d11_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Submersible pump</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d12_" name="d12_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d13_" name="d13_">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="second">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Hour meter(Hr)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d15_" name="d15_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Booster pump</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d16_" name="d16_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d17_" name="d17_">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="third">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flowmeter-</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d19_" name="d19_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Discharge-Q(Cu.M)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d20_" name="d20_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Pumped</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d21_" name="d21_">
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
                                        <input type="number" class="form-control" readonly=""  id="d23_" name="d23_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e23_" name="e23_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d24_" name="d24_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e24_" name="e24_">
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
                                        <input type="number" class="form-control" readonly=""  id="d25_" name="d25_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e25_" name="e25_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e26_" name="e26_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O flushed out</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c27_" name="c27_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d27_" name="d27_">
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
                                        <input type="number" class="form-control" readonly=""  id="d30_" name="d30_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e30_" name="e30_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d31_" name="d31_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  readonly="" id="e31_" name="e31_">
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
                                        <input type="number" class="form-control" readonly=""  id="d32_" name="d32_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e32_" name="e32_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e33_" name="e33_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c34_" name="c34_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d34_" name="d34_">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="sixth">
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flowmeter-Q(Cu.m)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Present</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d38_" name="d38_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>(Booster pump)</label>
                                </div>
                                <div class="col-3 px-1">
                                    <label>Previous</label>
                                </div>
                                <div class="col-5 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d39_" name="d39_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">

                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d40_" name="d40_">
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
                                        <input type="number" class="form-control" readonly=""  id="d43_" name="d43_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e43_" name="e43_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Flush out</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d44_" name="d44_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e44_" name="e44_">
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
                                        <input type="number" class="form-control" readonly=""  id="d45_" name="d45_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e45_" name="e45_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e46_" name="e46_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O flushed out  </label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c47_" name="c47_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d47_" name="d47_">
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
                                        <input type="number" class="form-control" readonly=""  id="d50_" name="d50_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e50_" name="e50_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Backwashing</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>min</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d51_" name="d51_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e51_" name="e51_">
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
                                        <input type="number" class="form-control" readonly=""  id="d52_" name="d52_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e52_" name="e52_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    
                                </div>
                                <div class="col-2 px-1">
                                    <label>Total</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e53_" name="e53_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Vol. of H2O Used</label>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="c55_" name="c55_">
                                    </div>
                                </div>
                                <div class="col-4 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="d55_" name="d55_">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div id="ninth">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label>Genset hour meter (hr)</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>LOAD</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d58_" name="d58_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e58_" name="e58_">
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
                                        <input type="number" class="form-control" readonly=""  id="d59_" name="d59_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e59_" name="e59_">
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
                                        <input type="number" class="form-control" readonly="" id="e60_" name="e60_">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>WARM-UP</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly=""  id="d61_" name="d61_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e61_" name="e61_">
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
                                        <input type="number" class="form-control" readonly=""  id="d62_" name="d62_">
                                    </div>
                                </div>
                                <div class="col-3 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e62_" name="e62_">
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
                                        <input type="number" class="form-control" readonly="" id="e63_" name="e63_">
                                    </div>
                                </div>
                            </div>

                   
                            <div class="row">
                                <div class="col-4 px-1">
                                    <label>Over all total of load & warm-up</label>
                                </div>
                                <div class="col-2 px-1">
                                    <label>hrs</label>
                                </div>
                                <div class="col-6 px-1">
                                    <div class="form-group">
                                        <input type="number" class="form-control" readonly="" id="e65_" name="e65_">
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




<?php include('footer.php'); ?>
<script type="text/javascript" src="Resources/assets/js/data-entry.js"></script>
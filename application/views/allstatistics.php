<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Telekhong</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body onload="enablefield()">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>index.php/store">Telekhong</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    



                <style type="text/css">
                    .not-active {
                       pointer-events: none;
                       cursor: default;
                    }

                </style>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> &nbsp<?php $storename = $this->session->userdata('storename'); echo substr($storename, 0,15) ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <?php
                        if ($allstore == null) {
                            echo "<li><center> You must have at least 1 store.</center> </li>";
                        }else{
                            foreach ($allstore as $r) {
                                $sta = "";
                                if ($r['status_store_id']=="1" && $r['expire_date'] != null) {

                                }else{
                                    $sta = "class='not-active'";
                                }
                                echo "<li ".$sta.">
                                <a href='";
                                echo site_url("store/selectst/".$r['store_id']);
                                echo "'> ".substr($r['store_name'],0,13); 
                                    if ($r['status_store_id']=="1" ) {
                                        echo "<span class='label label-success' style='float : right;'>Avaliable</span></a>
                                    </li>";
                                }elseif ($r['status_store_id']=="2" ) {
                                    echo "<span class='label label-warning' style='float : right;'>Blocked</span></a>
                                </li>";    
                            }elseif ($r['status_store_id']=="3" ) {
                                echo "<span class='label label-danger' style='float : right;'>Ban</span></a>
                            </li>";    
                            }
                            }
                        }

                ?>
                        <li class="divider"></li>
                            <li style="text-align:center;">
                                <a href="<?=base_url()?>index.php/createstore"> <i class="fa fa-plus-circle"></i> Create Store</a>
                            </li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('first_name');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="<?php echo site_url("auth/logout");?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- start script check permission owner -->
                    <?php
                        $dissta = "";
                        $dismanage = "";
                        $disdelete = "";
                        $disupload = "";
                        $stastore = $this->session->userdata('statuspack');
                        if ($stastore == 1) {
                            $dissta = "style = 'display : none' ";
                            $dismanage = "style = 'display : none'";
                        }elseif ($stastore == 5) {
                            $dissta = "class = 'disabled'";
                            $dismanage = "class = 'disabled'";
                            $disdelete = "disabled";
                            $disupload = "disabled";
                        }

                    ?>
        <!-- end script check permission owner -->
        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                        <li >
                            <a href="<?=base_url()?>index.php/store"><i class="fa fa-fw fa-desktop"></i> Store</a>
                        </li>
                        <li <?php echo $dissta;?>class="active">
                            <a href="<?=base_url()?>index.php/allstatistics"><i class="fa fa-fw fa-bar-chart-o"></i> Statistics</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/payment"><i class="fa fa-fw fa-table"></i> Payment</a>
                        </li>
                        <li <?php echo $dismanage; ?>>
                            <a href="<?=base_url()?>index.php/manageqrowner"><i class="glyphicon glyphicon-qrcode"></i> QRCode</a> 
                        </li>
                        <li >
                            <a href="<?=base_url()?>index.php/contact"><i class="fa fa-fw fa-edit"></i> Contact</a>
                        </li>
                    </ul>
                </ul>
            </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                     <div class="row">
                       
                        
                            <div class="col-lg-2"><h2>Statistics in</h2></div>
                            <div class="dropdown col-lg-10" style="margin-top:20px" >
                                <?php echo form_open("allstatistics/getfrommonth")?>
                               <table>
                                    <tr>
                                        
                                        <td>
                                            <div>
                                                <label class="radio-inline">
                                                  <input  onclick="enablefield()" style="margin-top:-50%" type="radio" name="inlineRadioOptions" id="radio_1" value="option1">
                                                </label>
                                            </div>  
                                        </td>
                                        <td> 
                                            <div class="input-group date form_datetime1" >
                                                <input  style="width:150px" type="text" onchange="this.form.action=this.form.submit()" value="" name="getmonth" id="monthtext" readonly class="form-control" placeholder="Month / Year">
                                                    <span class="input-group-addon" id="button1">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                            </div>
                                             
                                            <script type="text/javascript">
                                                $(".form_datetime1").datetimepicker({
                                                    format: "yyyy-mm",
                                                    autoclose: true,
                                                    startView:4,
                                                    maxView:4,
                                                    minView:3,
                                                    pickerPosition: "bottom-left"
                                                    
                                                });
                                                function enablefield(){
                                                    if($("#radio_1").prop("checked", true)){
                                                        $("#monthtext").prop('disabled', false);
                                                        $("#button1").css("visibility", "visible");
                                                        $("#yeartext").prop('disabled', true);
                                                        $("#button2").css("visibility", "hidden");
                                                    }

                                                    
                                                }
                                                
                                            </script>
                                        </td>
                                        <?php echo form_close(); ?>

                                        <?php echo form_open("allstatistics/getfromyear")?>
                                        <td width="40px"></td>
                                        <td>
                                            <div>
                                                <label class="radio-inline">
                                                  <input  onclick="enablefield2()"style="margin-top:-50%" type="radio" name="inlineRadioOptions" id="radio_2" value="option2">
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="input-group date form_datetime2" >
                                                <input  style="width:80px" type="text" onchange="this.form.action=this.form.submit()" value="" id="yeartext" name="getyear" readonly class="form-control" placeholder="Year">
                                                    <span class="input-group-addon" id="button2" >
                                                        <span class="glyphicon glyphicon-calendar" ></span>
                                                    </span>
                                            </div>
                                             
                                            <script type="text/javascript">
                                                $(".form_datetime2").datetimepicker({
                                                    format: "yyyy",
                                                    autoclose: true,
                                                    startView:4,
                                                    maxView:4,
                                                    minView:4,
                                                    pickerPosition: "bottom-left"
                                                    
                                                });

                                                function enablefield2(){
                                                    if($("#radio_2").prop("checked", true)){
                                                        $("#yeartext").prop('disabled', false);
                                                        $("#button2").css("visibility", "visible");
                                                        $("#monthtext").prop('disabled', true);
                                                        $("#button1").css("visibility", "hidden");
                                                        
                                                    }

                                                    
                                                }
                                            </script>
                                        </td>

                                    </tr>
                                </table>
                                <?php echo form_close(); ?>
                                </div>                 
                           
                        </div>
                   <hr>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <h4 style="color:#999999">View Message Chart</h4>
                            <a href="<?=base_url()?>index.php/statisticsowner"><button class="btn btn-lg btn-success" style="width:320px;height:80px;font-size:x-large"><i class="glyphicon glyphicon-stats">&nbspMessage Chart</i></button></a>
                            
                            <div  style="margin-top:20px;height:360px;">
                            <table  class="table" >
                                <style>
                                .table th{
                                    text-align: center;

                                }
                                .table td{                                   
                                    text-align: center;
                                    padding: 3px 3px 3px 3px ;
                                }
                                .table tbody { 
                                height:240px;  
                                border: 1px solid #CCCCCC;

                                }
                                </style>
                                <tr>
                                    <th colspan="5"  style="height:30px;font-size:medium"><i class="glyphicon glyphicon-star" style="color:#FFCC00"></i>&nbspTop 5 Favorite Ranking</th>
                                </tr>
                                <tr>
                                    <th width="5%" style="height:30px">Rank</th>
                                    <th width="45%" style="height:30px">Message</th>
                                    <th width="25%" style="height:30px">Upload</th>
                                    <th width="10%" style="height:30px">Status</th>
                                    <th width="15%" style="height:30px">Favorite</th>
                                </tr>
                                <tbody>
                                <?php
                                    $no = 1;
                                    $day = date("d");
                                    $day += 1;
                                    if ($day < 10 ) {
                                        $day = "0".$day;
                                    }
                                    $date = date("Y-m-");
                                    $date = $date.$day;

                                    if ($nothave1 == 0) {
                                        foreach ($favtop as $r) {
                                            $stcolor = "";
                                            $sttext = "";
                                            if ($r['info_expire_date'] > $date) {
                                                $stcolor = "success";
                                                $sttext = "Avaliable";
                                            }elseif ($r['info_expire_date'] < $date) {
                                                $stcolor = "danger";
                                                $sttext = "Outdate";
                                            }
                                            echo "<tr>
                                                    <td>".$no."</td>
                                                    <td Style='text-align:center'>".$r['info_name']."</td>
                                                    <td>".substr($r['info_date'], 0,10)."</td>
                                                    <td><span class='label label-".$stcolor."'>".$sttext."</span></td>
                                                    <td>".$r['countfav']."</td>
                                                </tr>";
                                            $no++;
                                        }
                                    }
                                    

                                    if ($forfav == 1) {
                                        foreach ($favadd as $r) {
                                            $stcolor = "";
                                            $sttext = "";
                                            if ($r['info_expire_date'] > $date) {
                                                $stcolor = "success";
                                                $sttext = "Avaliable";
                                            }elseif ($r['info_expire_date'] < $date) {
                                                $stcolor = "danger";
                                                $sttext = "Outdate";
                                            }
                                            echo "<tr>
                                                <td>".$no."</td>
                                                <td Style='text-align:center'>".$r['info_name']."</td>
                                                <td>".substr($r['info_date'], 0,10)."</td>
                                                <td><span class='label label-".$stcolor."'>".$sttext."</span></td>
                                                <td> 0 </td>
                                            </tr>";
                                        $no++;
                                        }
                                    }

                                ?>
                                
                                
                            </tbody>
                            </table>
                        </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <h4 style="color:#999999">View Message Received</h4>
                            <table class="table" >
                                <style>
                                .table tbody{
                                    border: 0px;
                                }
                                </style>
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="45%">Message Name</th>
                                        <th width="15%">Upload</th>
                                        <th width="15%">Status</th>
                                        <th width="25%">Received</th>
                                    </tr>
                                </thead>
                                <tbody style="height: 400px;position: absolute;overflow-y: scroll;">
                                    <?php
                                        $no = 1;
                                        $day = date("d");
                                        $day += 1;
                                        if ($day < 10 ) {
                                            $day = "0".$day;
                                        }
                                        $date = date("Y-m-");
                                        $date = $date.$day;

                                        if ($nothave2 == 0) {
                                            foreach ($infore as $r) {
                                                $stcolor = "";
                                                $sttext = "";
                                                if ($r['info_expire_date'] > $date) {
                                                    $stcolor = "success";
                                                    $sttext = "Avaliable";
                                                }elseif ($r['info_expire_date'] < $date) {
                                                    $stcolor = "danger";
                                                    $sttext = "Outdate";
                                                }
                                                echo "<tr style='height:60px'>
                                                        <td width='10%' style='padding-top: 20px;'>".$no."</td>
                                                        <td width='45%' style='padding-top: 20px;'>".$r['info_name']."</td>
                                                        <td width='15%' style='padding-top: 20px;'>".substr($r['info_date'], 0,10)."</td>
                                                        <td width='15%' style='padding-top: 20px;'><span class='label label-".$stcolor."'>".$sttext."</span></td>
                                                        <td width='25%' style='padding-top: 20px;padding-left: 40px;'>".$r['countre']."</td>
                                                    </tr>";
                                                $no++;
                                            }
                                        }

                                        if ($forinfo == 1) {
                                            foreach ($readd as $r) {
                                                $stcolor = "";
                                                $sttext = "";
                                                if ($r['info_expire_date'] > $date) {
                                                    $stcolor = "success";
                                                    $sttext = "Avaliable";
                                                }elseif ($r['info_expire_date'] < $date) {
                                                    $stcolor = "danger";
                                                    $sttext = "Outdate";
                                                }
                                                echo "<tr>
                                                        <td width='10%' style='padding-top: 20px;'>".$no."</td>
                                                        <td width='45%' style='padding-top: 20px;'>".$r['info_name']."</td>
                                                        <td width='15%' style='padding-top: 20px;'>".substr($r['info_date'], 0,10)."</td>
                                                        <td width='15%' style='padding-top: 20px;'><span class='label label-".$stcolor."'>".$sttext."</span></td>
                                                        <td width='25%' style='padding-top: 20px;padding-left: 40px;'> 0 </td>
                                                    </tr>";
                                                $no++;
                                            }
                                        }

                                    ?>

                                    


                                    
                                     
                                </tbody>
                            </table>

                        </div>
                        <!--follow Graph -->
                        <div class="col-lg-12">
                            <!-- /.row -->
                                    <div class="row" style=" margin-top: 40px;">
                                        <div class="col-lg-6">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Age Range Follow Chart </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="flot-chart">
                                                        <div class="flot-chart-content" id="flot-pie-chart-folage"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Age Range Follow Chart</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>

                                                                <td> < 18 year old</td>
                                                                <td> 18 - 25 year old</td>
                                                                <td> 26 - 35 year old</td>
                                                                <td> 36 - 50 year old</td>
                                                                <td> > 50 year old</td>
                                                                

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               <?php 
                                                                $pa1 = $foage1->num_rows(); 
                                                                $pa2 = $foage2->num_rows(); 
                                                                $pa3 = $foage3->num_rows(); 
                                                                $pa4 = $foage4->num_rows(); 
                                                                $pa5 = $foage5->num_rows(); 
                                                                $pa = $pa1+$pa2+$pa3+$pa4+$pa5;
                                                                if ($pa1 != 0) {
                                                                    $pa1 = ($pa1/$pa)*100;
                                                                }
                                                                if ($pa2 != 0) {
                                                                    $pa2 = ($pa2/$pa)*100;
                                                                }
                                                                if ($pa3 != 0) {
                                                                    $pa3 = ($pa3/$pa)*100;
                                                                }
                                                                if ($pa4 != 0) {
                                                                    $pa4 = ($pa4/$pa)*100;
                                                                }
                                                                if ($pa5 != 0) {
                                                                    $pa5 = ($pa5/$pa)*100;
                                                                }
                                                                echo "<td>".number_format($pa1,2)."%</td>
                                                                    <td>".number_format($pa2,2)."</td>
                                                                    <td>".number_format($pa3,2)."%</td>
                                                                    <td>".number_format($pa4,2)."%</td>
                                                                    <td>".number_format($pa5,2)."%</td>";
                                                                ?>
                                                                

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>                                 
                                        </div>

                                    </div>
                                    <!-- /.row .........................-->
                        </div>



                        <div class="col-lg-12">
                            <div class="col-lg-12">
                            <!-- /.row -->
                                    <div class="row" style=" margin-top: 40px;">
                                        <div class="col-lg-6">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Sex Range Follow Chart </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="flot-chart">
                                                        <div class="flot-chart-content" id="flot-pie-chart-folsex"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4>Sex Range Follow Chart</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>

                                                                <td> Male</td>
                                                                <td> Female</td>
                                                                <td> Unknow</td>
                                                                

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               <?php 
                                                                $pa1 = $fosex1->num_rows(); 
                                                                $pa2 = $fosex2->num_rows(); 
                                                                $pa3 = $fosex3->num_rows(); 
                                                                $pa = $pa1+$pa2+$pa3+$pa4+$pa5;
                                                                if ($pa1 != 0) {
                                                                    $pa1 = ($pa1/$pa)*100;
                                                                }
                                                                if ($pa2 != 0) {
                                                                    $pa2 = ($pa2/$pa)*100;
                                                                }
                                                                if ($pa3 != 0) {
                                                                    $pa3 = ($pa3/$pa)*100;
                                                                }
                                                                echo "<td>".number_format($pa1,2)."%</td>
                                                                    <td>".number_format($pa2,2)."</td>
                                                                    <td>".number_format($pa3,2)."%</td>";
                                                                ?>
                                                                

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>                                 
                                        </div>

                                    </div>
                                    <!-- /.row .........................-->
                        </div>
                        </div>
                        <!--End follow Graph -->
                    </div>
                    <div><br></div>
                    <center><div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li>You can contact us in this page </li>
                                <li> facebook : www.facebook.com/Telekhong</li>
                                <li> KingMongkutt's University of technology thonburi</li>
                            </ol>
                        </div>
                    </div></center>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?=base_url()?>assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?=base_url()?>assets/js/plugins/morris/raphael.min.js"></script>
        <script src="<?=base_url()?>assets/js/plugins/morris/morris.min.js"></script>
        <!-- <script src="<?=base_url()?>assets/js/plugins/morris/morris-data.js"></script>-->

        <!-- Flot Charts JavaScript -->
        <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
        <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.js"></script>
        <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?=base_url()?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
        <!--<script src="<?=base_url()?>assets/js/plugins/flot/flot-data.js"></script>-->


        <script type="text/javascript">
            $(function() {
                var data = [{
                    label: " < 18 year old",
                    data: <?php $a1 = $foage1->num_rows();if ($a1 == 0) {echo 1;}else{echo $a1;}?>
                }, {
                    label: " 18-25 year old",
                    data: <?php $a2 = $foage2->num_rows();if ($a2 == 0) {echo 1;}else{echo $a2;}?>
                }, {
                    label: " 26-35 year old",
                    data: <?php $a3 = $foage3->num_rows();if ($a3 == 0) {echo 1;}else{echo $a3;}?>
                }, {
                    label: " 36-50 year old",
                    data: <?php $a4 = $foage4->num_rows();if ($a4 == 0) {echo 1;}else{echo $a4;}?>
                }, {
                    label: " > 50 year old",
                    data: <?php $a5 = $foage5->num_rows();if ($a5 == 0) {echo 1;}else{echo $a5;}?>
                }];

                var plotObj = $.plot($("#flot-pie-chart-folage"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                        shifts: {
                            x: 20,
                            y: 0
                        },
                        defaultTheme: false
                    }
                });

            });


            $(function() {
                var data = [{
                    label: " Male",
                    data: <?php $a1 = $fosex1->num_rows();if ($a1 == 0) {echo 1;}else{echo $a1;}?>
                }, {
                    label: " Female",
                    data: <?php $a1 = $fosex2->num_rows();if ($a1 == 0) {echo 1;}else{echo $a1;}?>
                }, {
                    label: " Unknow",
                    data: <?php $a1 = $fosex3->num_rows();if ($a1 == 0) {echo 1;}else{echo $a1;}?>
                }];

                var plotObj = $.plot($("#flot-pie-chart-folsex"), data, {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                        shifts: {
                            x: 20,
                            y: 0
                        },
                        defaultTheme: false
                    }
                });

            });
        </script>

    </body>

    </html>

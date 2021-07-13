<?php
if(!defined("moonstudio")) return header("Location: /");
?>
<?
	$sql = "SELECT * FROM `last_buys`";
	$result = $mysqli->query($sql);

	$count = $count + $result->num_rows;
?>
<?
	$sql = "SELECT * FROM `tovari`";
	$result = $mysqli->query($sql);

	$sellingtovars = $result->num_rows;
?>
<?
	$sql = "SELECT * FROM `admin`";
	$result = $mysqli->query($sql);

	$admin = $result->num_rows;
?>
<?
	$sql = "SELECT * FROM `promo`";
	$result = $mysqli->query($sql);

	$promo = $result->num_rows;
?>
			<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    	<h1 class="text-center">Добро пожаловать, <? echo $_SESSION['name']; ?></h1>


                    	<div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><? echo $admin; ?></h2>
                                                <span>Администраторов</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><? echo $promo; ?></h2>
                                                <span>Промо-коды</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2><? echo $count; ?></h2>
                                                <span>Приобретено товаров</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><? echo $sellingtovars; ?></h2>
                                                <span>Типы товаров</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

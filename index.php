<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Sentimen - AplikasiOnline</title>
    <meta name="description" content="Analisis Sentimen - AplikasiOnline" />
    <meta name="generator" content="aplikasionline.id">
    <link rel="icon" href="img/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <meta property="og:image" name="twitter:image" content="img/favicon.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@AplikasiOnline">
    <meta name="twitter:creator" content="@SetiadyAgung">
    <meta name="twitter:title" content="Aplikasi Online">
    <meta name="twitter:description" content="Aplikasi Online">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/template.css" rel="stylesheet">
  </head>
  
  <body data-spy="scroll" data-target="#navbar1" data-offset="60">

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar1">
        <div class="container">
            <a class="navbar-brand mr-1 mb-1 mt-0" href="https://aplikasionline.id" target="_blank">Aplikasi Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <header class="bg-primary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        <h1 class="display-4">Analisis Sentimen</h1>
                        <p class="lead">Sehat Tentrem Untuk Indonesia Raya</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-container">
                                    <div class="swiper-container card-slider">
                                    	<form class="pure-form" style="width:100%" action="" method="post">
									    	<div class="form-group">
                                              <textarea name="kalimat" class="form-control" placeholder="kalimat (contoh: Bapak Budi sangat rajin sekali pergi ke kantor tiap pagi.)" style="font-size:30px;height:120px;width:100%;"></textarea>
                                          	</div>
									    
									        <div class="form-group">
                                              <input type="submit" class="btn btn-danger btn-lg round" name="submit" value="SUBMIT">
                                          	</div>

                                          	<div class="form-group">
											<?php
											if(isset($_POST['submit'])){
												if (PHP_SAPI != 'cli') {
													echo "<pre>";
												}

												$strings = array(
													1 => $_POST['kalimat'],
												);

												require_once __DIR__ . '/autoload.php';
												$sentiment = new \PHPInsight\Sentiment();

												$i=1;
												foreach ($strings as $string) {

													$scores = $sentiment->score($string);
													$class = $sentiment->categorise($string);

													if (in_array("pos", $scores)) {
													    echo "Got positif";
													}

													echo "<br><center><span style='color:#fff;font-size:20px;text-center'>Hasil:<br>Kalimat: <b>$string</b><br>Arah sentimen: <b>$class</b><br>Nilai: ";
													// var_dump($scores);
													foreach ($scores as $skor) {
														echo $skor;
													}
													echo "</span></center>";
													$i++;
												}
											}
											?>
											</div>
									    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
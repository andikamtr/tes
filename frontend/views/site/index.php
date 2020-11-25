<?php

/* @var $this yii\web\View */

$this->title = 'Webinar';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang</h1>

        <p class="lead">Pelajari Lebih Lanjut!</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Mulai</a></p>
    </div>

    <div class="body-content">
    <h1>Daftar </h1>
        <div class="row" style="text-align:center">
        <?php foreach($jadwalWebinar as $m) : ?>
            <div class="col-lg-4">
                <h2><?= $m->webinar->judul?></h2>
                <p><?= $m->webinar->tema?></p>
                <p><?= $m->penyelenggara->no_hp?></p>
                <p><?= $m->penyelenggara->nama?></p>
                <p><?= $m->penyelenggara->alamat?></p>
                <a href=""><button class="btn btn-primary">Join</button></a>
            </div>    
        <?php endforeach;?>
        </div>
    </div>
</div>

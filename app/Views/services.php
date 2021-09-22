
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
    <?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <!--? Hero Start -->
    <div class="slider-area">
        <div class="slider-height4 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2><?= $cont['title_page'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- ================ contact section start ================= -->
    
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12">
                    <h2 class="contact-title">Fale conosco</h2>
                </div> -->
                </pre>
                <?php foreach($cont['content'] as $k=> $c) : 
                // echo "<pre>";
                // print_r($c);
                // echo "</pre>";
                
                ?>
                <div class="col-lg-6">
                    <div class="box-services">
                        <h3><?= $c['title'] ?></h3>
                        <p><?= $c['body']; ?></p>
                    </div>
                </div>   
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
    

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>
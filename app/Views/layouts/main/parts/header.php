
            <section class="background-primary py-3 d-none d-sm-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto d-none d-lg-block">
                           <span class="fa fa-phone color-warning fw-800 icon-position-fix"></span>
                            <p class="ml-2 mb-0 fs--1 d-inline color-white fw-700"><small>Central de atendimento 24h: </small>0800 600 2851</p>
                        </div>
                        <div class="col-auto ml-md-auto order-md-2 d-none d-sm-block">
                            <span class="fa fa-user color-warning fw-800 icon-position-fix"></span>
                            <p class="ml-2 mb-0 fs--1 d-inline color-white fw-700">Area do Cliente</p>
                        </div>
                        <div class="col-auto">
                            <span class="fa fa-phone color-warning fw-800 icon-position-fix"></span>
                            <a class="ml-2 mb-0 fs--1 d-inline color-white fw-700" href="tel:00"><small>Suporte:</small> (31) 2510-8536</a>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.container-->
            </section>


            <div class="znav-white znav-container sticky-top navbar-elixir" id="znav-container">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand overflow-hidden pr-3" href="index.php">
                            <img src="<?= base_url("assets/images/logo-dark.png")?>" alt="" style="height:35px;"/>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="hamburger hamburger--emphatic">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav fs-0 fw-700">
                                <?php foreach($main_menu as $mm) {
                                    //    print_r($c);
                                    if($mm->route) {
                                        $route = base_url($mm->route);
                                    } else {
                                        $route = "#";
                                    }
                                    echo '<li><a href="'. $route .'">'.$mm->text . '</a>';
                                    if(isset($mm->child)) {
                                        echo '<ul class="dropdown fs--1">';
                                        foreach($mm->child as $cc) {
                                            if($cc->route) {
                                                $route = base_url($cc->route);
                                            } else {
                                                $route = "#";
                                            }
                                            echo '<li><a href="'. $route .'">'.$cc->text . '</a>';
                                            if(isset($cc->child)) {
                                                echo '<ul class="dropdown fs--1">';
                                                foreach($cc->child as $ccc) {
                                                    if($ccc->route) {
                                                        $route = base_url($ccc->route);
                                                    } else {
                                                        $route = "#";
                                                    }
                                                    echo '<li><a href="'. $route .'">'.$ccc->text . '</a></li>';
                                                }
                                                echo "</ul></li>";
                                            } else {
                                                echo '</li>';
                                            }
                                        }
                                        echo "</ul></li>";
                                    } else {
                                        echo '</li>';
                                    }
                                }
                                ?>  
                                
                            </ul>
                            <ul class="navbar-nav ml-lg-auto">
                                <li>
                                    <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="Http://www.brasilbeneficios.club" target="_blank">Solicitar Proposta</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
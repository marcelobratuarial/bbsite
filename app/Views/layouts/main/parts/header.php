<?php 
$paginaAtual= (uri_string() === "/" || uri_string() === "") ? '' : uri_string();
?>

            <div class="<?php if($paginaAtual==''){echo 'znav-glass is-homepage';} else {echo 'znav-white sticky-top';} ?> znav-container navbar-elixir" style="margin-top: -2px;" id="znav-container">
                <div class="responsiv_nav container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand overflow-hidden pr-3" href="<?= base_url() ?>">
                            <img src="<?php if($paginaAtual==''){echo base_url('assets/images/landing/bb_logo_branca.svg');} else {echo base_url('assets/images/landing/bb_logo.svg');}?>" alt="" style="height:35px;"/>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="hamburger hamburger--emphatic">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </button>
                        <div class="<?php if($paginaAtual==''){echo 'homebart';} else {echo 'homebarw';} ?> collapse homebart navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav fs-0 fw-700" style="margin-left: 100px;">
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
                                    <a class="navbt btn <?php if($paginaAtual==''){echo 'btn-outline-white';}else{echo 'btn-outline-primary';} ?> btn-capsule btn-sm border-2x fw-700" href="Http://www.brasilbeneficios.club" target="_blank">Solicitar Proposta</a>
                                </li>
                                <li class="ml-lg-2 ml-xl-2 ml-md-2">
                                    <a class="navbt btn <?php if($paginaAtual==''){echo 'btn-outline-white';}else{echo 'btn-outline-primary';} ?> btn-capsule btn-sm border-2x fw-700" href="<?= base_url("area-cliente") ?>">Area do cliente</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
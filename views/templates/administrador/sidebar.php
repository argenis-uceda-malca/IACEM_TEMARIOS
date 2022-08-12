<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Inicio</span></a></li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Administrar</span></li>

                <li class="sidebar-item"> <a class="sidebar-link" href="/viewciclo" aria-expanded="false"><i class="icon-chart"></i><span class="hide-menu">Ciclos
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Ciclos Académicos</span></li>




                <?php foreach ($ciclos as $key => $ciclo) { ?>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu"><?php echo $ciclo->nombre ?> </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="/admincurso?ciclo=<?php echo $ciclo->id ?>" class="sidebar-link"><span class="hide-menu"> Administrar
                                    </span></a>
                            </li>
                            <?php foreach ($cursos as $key => $curso) {
                                if ($curso->idCiclo == $ciclo->id) { ?>
                                    <li class="sidebar-item"><a href="/viewcurso?ciclo=<?php echo $ciclo->id ?>&curso=<?php echo $curso->id ?>" class="sidebar-link"><span class="hide-menu"> <?php echo $curso->nombre ?>
                                            </span></a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                <?php } ?>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Usuarios </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="/viewColaborador" class="sidebar-link"><span class="hide-menu"> Cobaloradores
                                </span></a>
                        </li>

                    </ul>
                </li>


                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/cuenta" aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Cuenta
                        </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"></span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/logout" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Salir</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
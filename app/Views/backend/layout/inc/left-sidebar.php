<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="<?= base_url('bootstrap/vendors/images/deskapp-logo.svg') ?>" alt="" class="dark-logo" />
            <img src="<?= base_url('bootstrap/vendors/images/deskapp-logo-white.svg') ?>" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <?php foreach ($menuItems as $name => $item) : ?>
                    <?php if (is_array($item) && isset($item['submenu'])) : ?>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-house"></span><span class="mtext"><?= $name ?></span>
                            </a>
                            <ul class="submenu">
                                <?php foreach ($item['submenu'] as $subName => $subLink) : ?>
                                    <li><a href="<?= $subLink ?>"><?= $subName ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="dropdown">
                            <a href="<?= $item ?>" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-house"></span><span class="mtext"><?= $name ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Extra</div>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-file-pdf"></span><span class="mtext">Documentation</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="introduction.html">Introduction</a></li>
                        <li><a href="getting-started.html">Getting Started</a></li>
                        <li><a href="color-settings.html">Color Settings</a></li>
                        <li>
                            <a href="third-party-plugins.html">Third Party Plugins</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="https://dropways.github.io/deskapp-free-single-page-website-template/" target="_blank" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-layout-text-window-reverse"></span>
                        <span class="mtext">Landing Page
                            <img src="<?= base_url('bootstrap/vendors/images/coming-soon.png') ?>" alt="" width="25" /></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
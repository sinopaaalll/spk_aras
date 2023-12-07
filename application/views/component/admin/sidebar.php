<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper ">
        <div class="sidebar-brand">
            <a href="<?= base_url('home') ?>">SPK ARAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('home') ?>">SPK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="<?= $this->uri->segment(1) === 'home' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('home') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Pages</li>
            <li class="<?= $this->uri->segment(1) === 'criteria' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('criteria') ?>"><i class="fas fa-cube"></i> <span>Criteria</span></a></li>
            <li class="<?= $this->uri->segment(1) === 'subcriteria' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('subcriteria') ?>"><i class="fas fa-cubes"></i> <span>Sub Criteria</span></a></li>
            <li class="<?= $this->uri->segment(1) === 'alternative' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('alternative') ?>"><i class="fas fa-users"></i> <span>Alternative</span></a></li>
            <li class="<?= $this->uri->segment(1) === 'evaluation' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('evaluation') ?>"><i class="fas fa-edit"></i> <span>Evaluation</span></a></li>
            <li class="<?= $this->uri->segment(1) === 'calculation' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('calculation') ?>"><i class="fas fa-calculator"></i> <span>Calculation</span></a></li>
            <li class="<?= $this->uri->segment(1) === 'result' ? "active" : "" ?>"><a class="nav-link" href="<?= base_url('result') ?>"><i class="fas fa-chart-area"></i> <span>Result</span></a></li>



        </ul>

    </aside>
</div>
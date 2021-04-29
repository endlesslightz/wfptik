  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
              <a href="<?= base_url('/admin/dashboard') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($link === "dashboard" ? "active" : ""); ?>" aria-current="true">
                  <i class="fas fa-tachometer-alt fa-fw me-3 "></i><span>Dashboard</span>
              </a>
              <a href="<?= base_url('admin/about') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($link === "about" ? "active" : ""); ?>">
                  <i class="fas fa-chart-pie fa-fw me-3 "></i><span>About</span>
              </a>
              <a href="<?= base_url('admin/user') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($link === "user" ? "active" : ""); ?>">
                  <i class="fas fa-users fa-fw me-3 >"></i><span>Users</span></a>
          </div>
      </div>
  </nav>
  <!-- Sidebar -->
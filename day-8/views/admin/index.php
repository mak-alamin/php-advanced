<?php require_once 'header-admin.php'; ?>

<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
   
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
   
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
   
    <button class="nav-link" id="v-pills-posts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-posts" type="button" role="tab" aria-controls="v-pills-posts" aria-selected="false">Posts</button>
   
    <button class="nav-link" id="v-pills-pages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pages" type="button" role="tab" aria-controls="v-pills-pages" aria-selected="false">Pages</button>
   
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
   
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><p><a href="../login?action=logout">Log Out</a></p></button>
  </div>
  
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <?php require_once 'dashboard-content.php' ; ?>
    </div>

    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <?php require_once 'profile.php' ; ?>     
    </div>

    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">....</div>
  </div>
</div>


<?php require_once 'footer-admin.php'; ?>
 <!-- Update Profile Modal -->
 <div class="modal fade " id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateProfileModalLabel">Profile</h5>
          <button type="button" class="btn-close btnCloseProfile" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="update-profile.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div>
              <div class="d-flex justify-content-center mb-3">
                <input type="file" id="profileUpload" style="display: none;" accept="image/*" name="profileImage">
                <img src="./source/images/users/<?php echo $user->getImage() ?>" id="profilePreview" alt="default.png" style="width: 80px; height: 80px; border-radius: 100%;" onclick="document.getElementById('profileUpload').click()">
              </div>
              <div class="mb-3">
                <input type="text" hidden value="<?php echo $user->getId() ?>" name="userId">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" value="<?php echo $user->getUsername() ?>" name="username">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" value="<?php echo $user->getEmail() ?>" name="email">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Old Password</label>
                <input type="password" class="form-control" placeholder="oldPassword">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">New Password</label>
                <input type="password" class="form-control" placeholder="user1" name="password">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="user1" name="password2">
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btnCloseProfile" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
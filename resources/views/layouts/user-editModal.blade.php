<div id="UserEditModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <header class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </header>

            <div class="modal-body">
                <form id="editUserForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="editUserId" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <legend>User Image</legend>
                                <div class="image-container position-relative text-center">
                                    <img id="editUserImagePreview"
                                         src="{{ asset('images/default-avatar.png') }}"
                                         alt="User Image"
                                         class="img-thumbnail mt-2"
                                         style="max-width: 190px; border-radius: 10px;">
                                    <input type="file"
                                           id="editUserImage"
                                           name="image"
                                           accept="image/*"
                                           class="form-control mt-2"
                                           onchange="previewEditUserImage(this)">
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__388">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__388__BV_label_">User # *</legend>
                                <div>
                                    <input type="text" placeholder="User #" class="form-control" aria-describedby="UserNo-feedback" label="UserNo" id="editUserId" readonly> 
                                    <div id="UserNo-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>

                        <div class="col-md-6">
                                <span>
                                <fieldset class="form-group" id="__BVID__391">
                                    <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__391__BV_label_">Full Name</legend>
                                    <div>
                                        <input type="text" class="form-control" id="editUserName" name="name">
                                        <div id="FullName-feedback" class="invalid-feedback"></div>
                                        <!----><!----><!---->
                                    </div>
                                </fieldset>
                                </span>
                            </div>

                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__394">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__394__BV_label_">Username</legend>
                                <div>
                                    <input type="text" class="form-control" id="editUserUsername" name="username">
                                    <div id="Username-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>

                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__400">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__400__BV_label_">Password</legend>
                                <div>
                                    <input type="password" placeholder="Password" class="form-control" aria-describedby="Password-feedback" label="Password" id="__BVID__401" name="password"> 
                                    <div id="Password-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>

                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__397">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__397__BV_label_">Email</legend>
                                <div>
                                    <input type="email" class="form-control" id="editUserEmail" name="email">
                                    <div id="Email-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>

                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__403">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__403__BV_label_">Mobile #</legend>
                                <div>
                                    <input type="text" class="form-control" id="editUserMobile" name="mobile_number">
                                    <div id="MobileNo-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>

                        <div class="col-md-12">
                            <span>
                            <fieldset class="form-group" id="__BVID__409">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__409__BV_label_">Address</legend>
                                <div>
                                    <textarea class="form-control" id="editUserAddress" name="address"></textarea>
                                    <div id="Adress-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
 
                        <div class="col-md-12 mt-3">
                            <fieldset class="form-group">
                                <legend>Permissions *</legend>
                                <div id="editRoleApp">
                                    <v-select
                                        multiple
                                        :options='@json($roles)'
                                        label="name"
                                        :reduce="role => role.id"
                                        v-model="selectedRoles"
                                        placeholder="Select Role"
                                        clearable
                                    ></v-select>
                                    <input v-for="id in selectedRoles"
                                           type="hidden"
                                           name="roles[]"
                                           :value="id">
                                </div>
                            </fieldset>
                        </div>

                        <div class="mt-4 col-md-12">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="i-Yes me-2"></i> Update
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="i-Close me-2"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewEditUserImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('editUserImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Fill modal data dynamically
window.openEditUserModal = function (user) {
    // Set form action dynamically
    const form = document.getElementById('editUserForm');
    form.action = `/users/${user.id}`;

    // Fill fields
    document.getElementById('editUserId').value = user.id;
    document.getElementById('editUserName').value = user.name;
    document.getElementById('editUserUsername').value = user.username;
    document.getElementById('editUserEmail').value = user.email;
    document.getElementById('editUserMobile').value = user.mobile_number ?? '';
    document.getElementById('editUserAddress').value = user.address ?? '';

    // Image preview
    document.getElementById('editUserImagePreview').src =
        user.image ? `/storage/${user.image}` : `/images/avatar/no-avatar.png`;

    // // Roles (Vue)
    // if (window.editRoleApp) {
    //     editRoleApp.selectedRoles = user.roles.map(role => role.id);
    // }

    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('UserEditModal'));
    modal.show();
}
</script>

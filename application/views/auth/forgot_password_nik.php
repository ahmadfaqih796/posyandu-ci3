<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7">
         <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               <div class="row">
                  <div class="col-lg">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('auth/forgot_password_bumil'); ?>">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="nik" placeholder="Enter Nik ..." value="<?= set_value('nik'); ?>">
                              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                           <button type="submit" class="btn btn-primary btn-user btn-block">Send Reset Link</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
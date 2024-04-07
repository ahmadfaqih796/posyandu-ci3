<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-10 col-xs-12 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary mb-2"><?= $title ?></h6>
            </div>
            <div class="col-md-2 col-xs-12">
               <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/gizi_ibu_hamil/pdf') ?>">
                  <i class="fas fa-print"></i> PDF
               </a>
               <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#addModal">
                  <i class="fas fa-search"></i> Cari
               </button>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
      </div>
   </div>

</div>
<!-- /.container-fluid -->
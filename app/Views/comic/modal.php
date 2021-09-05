<!-- Modal -->

<div class="modal fade" id="modal_detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">
          <span id=judul></span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row" style="border:0px solid black;">
            <div class="col-md-6" style="border:0px solid black;">
              <img src="" id="sampul" class="sampulModal">
            </div>
            <div class="col-md-6">
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12 mt-2 mb-2">
                  <small class="text muted">
                    <b>Author : </b>
                    <span id="penulis"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Publisher : </b>
                    <span id="penerbit"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Volume : </b>
                    <span id="jilid"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Created at : </b>
                    <span id="tanggal-dibuat"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Updated at : </b>
                    <span id="tanggal-diperbarui"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <button onclick="location.href='#'" type="button" class="btn btn-warning">
                    Edit
                  </button>
                  <form action="/comic/delete/<?= $comics['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="location.href='/comic/delete_comic/<?= $comics['id']; ?>'">
                      Delete
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
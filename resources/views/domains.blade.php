<!DOCTYPE html>
<html>
<head>
    <title>Domains</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    <link rel="stylesheet" type="text/css" href="/build/jquery.datetimepicker.min.css" />
    <script src="/build/jquery.datetimepicker.full.min.js"></script>

    <script src="{{ url('/') }}/js/domain.js"></script>
    <link href="{{ url('/') }}/css/domain.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<!-- Modal -->
<div class="modal" id="updateDomain" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Domain</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row">
          <div class="col-12">
              <label for="name" class="col-form-label">Domain:</label>
              <input type="text" class="form-control" id="name_du">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">DA</label>
              <input type="number" min="0" class="form-control" id="da_du">
          </div>
          <div class="col-6">
              <label for="pa" class="col-form-label">PA</label>
              <input type="number" min="0" class="form-control" id="pa_du">
          </div>
          <div class="col-6">
              <label for="ref" class="col-form-label">RD</label>
              <input type="number" min="0" class="form-control" id="ref_du">
          </div>
          <div class="col-6">
              <label for="tf" class="col-form-label">TF</label>
              <input type="number" min="0" class="form-control" id="tf_du">
          </div>
          <div class="col-6">
              <label for="cf" class="col-form-label">CF</label>
              <input type="number" min="0" class="form-control" id="cf_du">
          </div>
          <div class="col-6">
              <label for="ree" class="col-form-label">REE</label>
              <input type="number" min="0" class="form-control" id="ree_du">
          </div>
          <div class="col-6">
              <label for="dr" class="col-form-label">DR</label>
              <input type="number" min="0" class="form-control" id="dr_du">
          </div>
          <div class="col-6">
              <label for="ur" class="col-form-label">UR</label>
              <input type="number" min="0" class="form-control" id="ur_du">
          </div>
          <div class="col-6">
              <label for="dp" class="col-form-label">DP</label>
              <input type="number" min="0" class="form-control" id="dp_du">
          </div>
          <div class="col-6">
              <label for="aby" class="col-form-label">ABY</label>
              <input type="number" min="0" class="form-control" id="aby_du">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">ACR</label>
              <input type="number" min="0" class="form-control" id="acr_du">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">Add Date</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                    <input type='text' class="form-control" id="add_date_du" autocomplete="off"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
                </div>
              </div>
          </div>
          <div class="col-6">
              <label for="registrar" class="col-form-label">Registrar</label>
              <input type="text" class="form-control" id="registrar_du">
          </div>
          <div class="col-6">
              <label for="market_place" class="col-form-label">Market Place</label>
              <input type="text" class="form-control" id="market_place_du">
          </div>
          <div class="col-6">
              <label for="price" class="col-form-label">Price</label>
              <input type="number" min="0" class="form-control" id="price_du">
          </div>
          <div class="col-6">
              <label for="cate1" class="col-form-label">Cate1</label>
              <input type="text" class="form-control" id="cate1_du">
          </div>
          <div class="col-6">
              <label for="cate2" class="col-form-label">Cate2</label>
              <input type="text" class="form-control" id="cate2_du">
          </div>
          <div class="col-6">
              <label for="cate2" class="col-form-label">Status</label>
              {!! Form::select('status', array(
                'Available Soon' => 'Available Soon', 
                'Buy It Now' => 'Buy It Now', 
                'In Auction' => 'In Auction',
                'Expired' => 'Expired'
                ), NULL, ['class' => 'form-control', 'id' => 'status_du']); 
              !!}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-domain">Save</button>
        <button type="button" class="btn btn-danger" id="delete-domain">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal" id="addDomain" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Domain</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row">
          <div class="col-12">
              <label for="name" class="col-form-label">Domain:</label>
              <input type="text" class="form-control" id="name_d">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">DA</label>
              <input type="number" min="0" class="form-control" id="da_d">
          </div>
          <div class="col-6">
              <label for="pa" class="col-form-label">PA</label>
              <input type="number" min="0" class="form-control" id="pa_d">
          </div>
          <div class="col-6">
              <label for="ref" class="col-form-label">RD</label>
              <input type="number" min="0" class="form-control" id="ref_d">
          </div>
          <div class="col-6">
              <label for="tf" class="col-form-label">TF</label>
              <input type="number" min="0" class="form-control" id="tf_d">
          </div>
          <div class="col-6">
              <label for="cf" class="col-form-label">CF</label>
              <input type="number" min="0" class="form-control" id="cf_d">
          </div>
          <div class="col-6">
              <label for="ree" class="col-form-label">REE</label>
              <input type="number" min="0" class="form-control" id="ree_d">
          </div>
          <div class="col-6">
              <label for="dr" class="col-form-label">DR</label>
              <input type="number" min="0" class="form-control" id="dr_d">
          </div>
          <div class="col-6">
              <label for="ur" class="col-form-label">UR</label>
              <input type="number" min="0" class="form-control" id="ur_d">
          </div>
          <div class="col-6">
              <label for="dp" class="col-form-label">DP</label>
              <input type="number" min="0" class="form-control" id="dp_d">
          </div>
          <div class="col-6">
              <label for="aby" class="col-form-label">ABY</label>
              <input type="number" min="0" class="form-control" id="aby_d">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">ACR</label>
              <input type="number" min="0" class="form-control" id="acr_d">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">Add Date</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepickerd'>
                    <input type='text' class="form-control" id="add_date_d" autocomplete="off"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
                </div>
              </div>
          </div>
          <div class="col-6">
              <label for="registrar" class="col-form-label">Registrar</label>
              <input type="text" class="form-control" id="registrar_d">
          </div>
          <div class="col-6">
              <label for="market_place" class="col-form-label">Market Place</label>
              <input type="text" class="form-control" id="market_place_d">
          </div>
          <div class="col-6">
              <label for="price" class="col-form-label">Price</label>
              <input type="number" min="0" class="form-control" id="price_d">
          </div>
          <div class="col-6">
              <label for="cate1" class="col-form-label">Cate1</label>
              <input type="text" class="form-control" id="cate1_d">
          </div>
          <div class="col-6">
              <label for="cate2" class="col-form-label">Cate2</label>
              <input type="text" class="form-control" id="cate2_d">
          </div>
          <div class="col-6">
              <label for="cate2" class="col-form-label">Status</label>
              {!! Form::select('status', array(
                'Available Soon' => 'Available Soon', 
                'Buy It Now' => 'Buy It Now', 
                'In Auction' => 'In Auction',
                'Expired' => 'Expired'
                ), NULL, ['class' => 'form-control', 'id' => 'status_d']); 
              !!}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-domain">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal" id="addModel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row">
          <div class="col-12">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DA Min:</label>
            <input type="number" min="0" class="form-control" id="damin">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DA Max:</label>
            <input type="number" min="0" class="form-control" id="damax">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">PA Min:</label>
            <input type="number" min="0" class="form-control" id="pamin">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">PA Max:</label>
            <input type="number" min="0" class="form-control" id="pamax">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DR Min:</label>
            <input type="number" min="0" class="form-control" id="drmin">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DR Max:</label>
            <input type="number" min="0" class="form-control" id="drmax">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">UR Min:</label>
            <input type="number" min="0" class="form-control" id="urmin">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">UR Max:</label>
            <input type="number" min="0" class="form-control" id="urmax">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">RD Min:</label>
            <input type="number" min="0" class="form-control" id="rdmin">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">RD Max:</label>
            <input type="number" min="0" class="form-control" id="rdmax">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">BL Min:</label>
            <input type="number" min="0" class="form-control" id="blmin">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">BL Max:</label>
            <input type="number" min="0" class="form-control" id="blmax">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">Age Min:</label>
            <input type="number" min="0" class="form-control" id="agemin">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">Age Max:</label>
            <input type="number" min="0" class="form-control" id="agemax">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">Price Min:</label>
            <input type="number" min="0" class="form-control" id="pricemin">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">Price Max:</label>
            <input type="number" min="0" class="form-control" id="pricemax">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-filter">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal" id="editMode" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row">
          <div class="col-12">
            <label for="name_u" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DA Min:</label>
            <input type="number" min="0" class="form-control" id="damin_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DA Max:</label>
            <input type="number" min="0" class="form-control" id="damax_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">PA Min:</label>
            <input type="number" min="0" class="form-control" id="pamin_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">PA Max:</label>
            <input type="number" min="0" class="form-control" id="pamax_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DR Min:</label>
            <input type="number" min="0" class="form-control" id="drmin_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">DR Max:</label>
            <input type="number" min="0" class="form-control" id="drmax_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">UR Min:</label>
            <input type="number" min="0" class="form-control" id="urmin_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">UR Max:</label>
            <input type="number" min="0" class="form-control" id="urmax_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">RD Min:</label>
            <input type="number" min="0" class="form-control" id="rdmin_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">RD Max:</label>
            <input type="number" min="0" class="form-control" id="rdmax_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">BL Min:</label>
            <input type="number" min="0" class="form-control" id="blmin_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">BL Max:</label>
            <input type="number" min="0" class="form-control" id="blmax_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">Age Min:</label>
            <input type="number" min="0" class="form-control" id="agemin_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">Age Max:</label>
            <input type="number" min="0" class="form-control" id="agemax_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">Price Min:</label>
            <input type="number" min="0" class="form-control" id="pricemin_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">Price Max:</label>
            <input type="number" min="0" class="form-control" id="pricemax_u">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update-filter">Update</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
    <h1>Domains <span class="float-end add-domain"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Add Domain</span></h1>
    <div class="float-end filter-class">
      <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
        </svg> Filter
      </a>
        <div class="filter-model">
            <ul>
                @foreach($filters as $filter)
                <li class="filter-item" value="{{ $filter->id }}">
                    <a href="#" class="accept-item" data-id="{{ $filter->id }}">{{ $filter->name }}</a>
                    <a href="#" class="delete-item" data-id="{{ $filter->id }}">delete</a>
                    <a href="#" class="update-item" 
                                data-id="{{ $filter->id }}" 
                                data-name="{{ $filter->name }}"
                                data-damin="{{ $filter->damin }}"
                                data-damax="{{ $filter->damax }}"
                                data-pamin="{{ $filter->pamin }}"
                                data-pamax="{{ $filter->pamax }}"
                                data-rdmin="{{ $filter->rdmin }}"
                                data-rdmax="{{ $filter->rdmax }}"
                                data-blmin="{{ $filter->blmin }}"
                                data-blmax="{{ $filter->blmax }}"
                                data-drmin="{{ $filter->drmin }}"
                                data-drmax="{{ $filter->drmax }}"
                                data-urmin="{{ $filter->urmin }}"
                                data-urmax="{{ $filter->urmax }}"
                                data-pricemin="{{ $filter->pricemin }}"
                                data-pricemax="{{ $filter->pricemax }}"
                                data-agemin="{{ $filter->agemin }}"
                                data-agemax="{{ $filter->agemax }}"
                            >update</a>
                </li>
                @endforeach
                <li id="filter-clear"><a href="#">Clear Filter</a></li>
                <li id="filter-add"><a href="#">Add Filter</a></li>
            </ul>
        </div>
    </div>
    <div class="color-in">
      <span class="btn domain-available-soon ml-3 mr-1">&nbsp;</span>Available Soon
      <span class="btn domain-available ml-3 mr-1">&nbsp;</span>Buy It Now
      <span class="btn domain-in-auction ml-3 mr-1">&nbsp;</span>In Auction
      <span class="btn domain-exp ml-3 mr-1">&nbsp;</span>Expired
    </div>
    <div>
        Toggle column:  <a class="toggle-vis" data-column="0">No</a> - 
                        <a class="toggle-vis" data-column="1">Name</a> - 
                        <a class="toggle-vis" data-column="2">DA</a> - 
                        <a class="toggle-vis" data-column="3">PA</a> - 
                        <a class="toggle-vis" data-column="4">Ref</a> - 
                        <a class="toggle-vis" data-column="5">TF</a> - 
                        <a class="toggle-vis" data-column="6">CF</a> - 
                        <a class="toggle-vis" data-column="7">REE</a> - 
                        <a class="toggle-vis" data-column="8">DR</a> - 
                        <a class="toggle-vis" data-column="9">UR</a> - 
                        <a class="toggle-vis" data-column="10">DP</a> - 
                        <a class="toggle-vis" data-column="11">ABY</a> - 
                        <a class="toggle-vis" data-column="12">ACR</a> - 
                        <a class="toggle-vis" data-column="13">ADD DATE</a> - 
                        <a class="toggle-vis" data-column="14">REGISTRAR</a> - 
                        <!-- <a class="toggle-vis" data-column="15">MARKETPLACE</a> -  -->
                        <a class="toggle-vis" data-column="16">PRICE</a> - 
                        <a class="toggle-vis" data-column="17">Cate 1</a> - 
                        <a class="toggle-vis" data-column="18">Cate 2</a>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>DA</th>
                <th>PA</th>
                <th>RD</th>
                <th>TF</th>
                <th>CF</th>
                <th>REE</th>
                <th>DR</th>
                <th>UR</th>
                <th>DP</th>
                <th>ABY</th>
                <th>ACR</th>
                <th>Order Time</th>
                <th>REGISTRAR</th>
                <!-- <th>MARKETPLACE</th> -->
                <th>PRICE</th>
                <th>Cate 1</th>
                <th>Cate 2</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</body>
     
<script type="text/javascript">
  $(function () {
    $('#add_date_d').datetimepicker({
                      format: 'Y-m-d H:i:00'
                  });
    $('#add_date_du').datetimepicker({
                      format: 'Y-m-d H:i:00'
                  });


    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        pageLength: 50,
        ajax: "{{ route('domains.index', ['filter' => isset($_GET['filter']) ? $_GET['filter'] : null]) }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'da', name: 'da'},
            {data: 'pa', name: 'pa'},
            {data: 'ref', name: 'ref'},
            {data: 'tf', name: 'tf'},
            {data: 'cf', name: 'cf'},
            {data: 'ree', name: 'ree'},
            {data: 'dr', name: 'dr'},
            {data: 'ur', name: 'ur'},
            {data: 'dp', name: 'dp'},
            {data: 'aby', name: 'aby'},
            {data: 'acr', name: 'acr'},
            {data: 'order_time', name: 'order_time'},
            {data: 'registrar', name: 'registrar'},
            // {data: 'market_place', name: 'market_place'},
            {data: 'price', name: 'price'},
            {data: 'cate1', name: 'cate1'},
            {data: 'cate2', name: 'cate2'},
        ],
        'createdRow': function( row, data, dataIndex ) {
            $(row).addClass( 'domain-row' );

            if(data.status == 'Available Soon'){
              $(row).addClass( 'domain-available-soon' );
            }else if(data.status == 'Buy It Now'){
              $(row).addClass( 'domain-available' );
            }else if(data.status == 'In Auction'){
              $(row).addClass( 'domain-in-auction' );
            }else {
              $(row).addClass( 'domain-exp' );
            }
            $(row).data('id', data.id);
            $(row).data('name', data.name);
            $(row).data('da', data.da);
            $(row).data('pa', data.pa);
            $(row).data('ref', data.ref);
            $(row).data('tf', data.tf);
            $(row).data('cf', data.cf);
            $(row).data('ree', data.ree);
            $(row).data('dr', data.dr);
            $(row).data('ur', data.ur);
            $(row).data('dp', data.dp);
            $(row).data('aby', data.aby);
            $(row).data('acr', data.acr);
            $(row).data('add_date', data.add_date);
            $(row).data('registrar', data.registrar);
            $(row).data('market_place', data.market_place);
            $(row).data('price', data.price);
            $(row).data('cate1', data.cate1);
            $(row).data('cate2', data.cate2);
            $(row).data('status', data.status);
            console.log(data)
        },
        'initComplete': function(settings, json) {
          addEvent();
        },
        'drawCallback': function(){
          addEvent();
        }
    });

    function addEvent(){
        $('.domain-row').off('click');
        $('.domain-row').click(function(){
            $('#update-domain').data('id', $(this).data('id'));
            $('#delete-domain').data('id', $(this).data('id'));
            $('#name_du').val($(this).data('name'));
            $('#da_du').val($(this).data('da'));
            $('#pa_du').val($(this).data('pa'));
            $('#ref_du').val($(this).data('ref'));
            $('#tf_du').val($(this).data('tf'));
            $('#cf_du').val($(this).data('cf'));
            $('#ree_du').val($(this).data('ree'));
            $('#dr_du').val($(this).data('dr'));
            $('#ur_du').val($(this).data('ur'));
            $('#dp_du').val($(this).data('dp'));
            $('#aby_du').val($(this).data('aby'));
            $('#acr_du').val($(this).data('acr'));
            $('#add_date_du').val($(this).data('add_date'));
            $('#registrar_du').val($(this).data('registrar'));
            $('#market_place_du').val($(this).data('market_place'));
            $('#price_du').val($(this).data('price'));
            $('#cate1_du').val($(this).data('cate1'));
            $('#cate2_du').val($(this).data('cate2'));
            $('#status_du').val($(this).data('status'));

            if($('#updateDomain').hasClass('show')){
                $('#updateDomain').modal('hidden');
            }else{
                $('#updateDomain').modal('show');
            }
        })
    }

    document.querySelectorAll('a.toggle-vis').forEach((el) => {
        el.addEventListener('click', function (e) {
            e.preventDefault();
    
            let columnIdx = e.target.getAttribute('data-column');
            let column = table.column(columnIdx);
    
            // Toggle the visibility
            column.visible(!column.visible());
        });
    });
      
  });
</script>
</html>
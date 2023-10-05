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
          <div class="col-6">
              <label for="domain" class="col-form-label">Domain:</label>
              <input type="text" class="form-control" id="domain_du">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">Source</label>
              <input type="text" min="0" class="form-control" id="source_du">
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
              <label for="bl" class="col-form-label">bl</label>
              <input type="number" min="0" class="form-control" id="bl_du">
          </div>
          <div class="col-6">
              <label for="rd" class="col-form-label">rd</label>
              <input type="number" min="0" class="form-control" id="rd_du">
          </div>
          <div class="col-6">
              <label for="languages" class="col-form-label">languages</label>
              <input type="text" min="0" class="form-control" id="languages_du">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">da</label>
              <input type="number" min="0" class="form-control" id="da_du">
          </div>
          <div class="col-6">
              <label for="pa" class="col-form-label">pa</label>
              <input type="number" min="0" class="form-control" id="pa_du">
          </div>
          <div class="col-6">
              <label for="age" class="col-form-label">age</label>
              <input type="number" min="0" class="form-control" id="age_du">
          </div>
          <div class="col-6">
              <label for="score" class="col-form-label">score</label>
              <input type="number" min="0" class="form-control" id="score_du">
          </div>
          <div class="col-6">
              <label for="redirects" class="col-form-label">redirects</label>
              <input type="number" min="0" class="form-control" id="redirects_du">
          </div>
          <div class="col-6">
              <label for="history" class="col-form-label">history</label>
              <input type="number" min="0" class="form-control" id="history_du">
          </div>
          <div class="col-6">
              <label for="domain_drops" class="col-form-label">domain drops</label>
              <input type="number" min="0" class="form-control" id="domain_drops_du">
          </div>
          <div class="col-6">
              <label for="total_organic_results" class="col-form-label">total organic results</label>
              <input type="number" min="0" class="form-control" id="total_organic_results_du">
          </div>
          <div class="col-6">
              <label for="semrush_traffic" class="col-form-label">semrush traffic</label>
              <input type="number" min="0" class="form-control" id="semrush_traffic_du">
          </div>
          <div class="col-6">
              <label for="semrush_rank" class="col-form-label">semrush rank</label>
              <input type="number" min="0" class="form-control" id="semrush_rank_du">
          </div>
          <div class="col-6">
              <label for="semrush_keyword_number" class="col-form-label">semrush keyword number</label>
              <input type="number" min="0" class="form-control" id="semrush_keyword_number_du">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">expiry date</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                    <input type='text' class="form-control" id="expiry_date_du" autocomplete="off"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
                </div>
              </div>
          </div>
          <div class="col-6">
              <label for="price" class="col-form-label">Price</label>
              <input type="number" min="0" class="form-control" id="price_du">
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
          <div class="col-6">
              <label for="cate2" class="col-form-label">Status SEO</label>
              {!! Form::select('status_seo', array(
                '0' => 'Chưa check', 
                '1' => 'Đang Check', 
                '2' => 'Đã check',
                '3' => 'Chốt mua',
                '4' => 'Đã mua'
                ), NULL, ['class' => 'form-control', 'id' => 'status_seo_du']); 
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
          <div class="col-6">
              <label for="domain" class="col-form-label">Domain:</label>
              <input type="text" class="form-control" id="domain_d">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">Source</label>
              <input type="text" min="0" class="form-control" id="source_d">
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
              <label for="bl" class="col-form-label">bl</label>
              <input type="number" min="0" class="form-control" id="bl_d">
          </div>
          <div class="col-6">
              <label for="rd" class="col-form-label">rd</label>
              <input type="number" min="0" class="form-control" id="rd_d">
          </div>
          <div class="col-6">
              <label for="languages" class="col-form-label">languages</label>
              <input type="text" min="0" class="form-control" id="languages_d">
          </div>
          <div class="col-6">
              <label for="da" class="col-form-label">da</label>
              <input type="number" min="0" class="form-control" id="da_d">
          </div>
          <div class="col-6">
              <label for="pa" class="col-form-label">pa</label>
              <input type="number" min="0" class="form-control" id="pa_d">
          </div>
          <div class="col-6">
              <label for="age" class="col-form-label">age</label>
              <input type="number" min="0" class="form-control" id="age_d">
          </div>
          <div class="col-6">
              <label for="score" class="col-form-label">score</label>
              <input type="number" min="0" class="form-control" id="score_d">
          </div>
          <div class="col-6">
              <label for="redirects" class="col-form-label">redirects</label>
              <input type="number" min="0" class="form-control" id="redirects_d">
          </div>
          <div class="col-6">
              <label for="history" class="col-form-label">history</label>
              <input type="number" min="0" class="form-control" id="history_d">
          </div>
          <div class="col-6">
              <label for="domain_drops" class="col-form-label">domain drops</label>
              <input type="number" min="0" class="form-control" id="domain_drops_d">
          </div>
          <div class="col-6">
              <label for="total_organic_results" class="col-form-label">total organic results</label>
              <input type="number" min="0" class="form-control" id="total_organic_results_d">
          </div>
          <div class="col-6">
              <label for="semrush_traffic" class="col-form-label">semrush traffic</label>
              <input type="number" min="0" class="form-control" id="semrush_traffic_d">
          </div>
          <div class="col-6">
              <label for="semrush_rank" class="col-form-label">semrush rank</label>
              <input type="number" min="0" class="form-control" id="semrush_rank_d">
          </div>
          <div class="col-6">
              <label for="semrush_keyword_number" class="col-form-label">semrush keyword number</label>
              <input type="number" min="0" class="form-control" id="semrush_keyword_number_d">
          </div>
          <div class="col-6">
              <label for="acr" class="col-form-label">expiry date</label>
              <div class="form-group">
                <div class='input-group date' id='datetimepicker10'>
                    <input type='text' class="form-control" id="expiry_date_d" autocomplete="off"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
                </div>
              </div>
          </div>
          <div class="col-6">
              <label for="price" class="col-form-label">Price</label>
              <input type="number" min="0" class="form-control" id="price_d">
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
          <div class="col-6">
              <label for="cate2" class="col-form-label">Status SEO</label>
              {!! Form::select('status_seo', array(
                '0' => 'Chưa check', 
                '1' => 'Đang Check', 
                '2' => 'Đã check',
                '3' => 'Chốt mua',
                '4' => 'Đã mua'
                ), NULL, ['class' => 'form-control', 'id' => 'status_seo_d']); 
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
            <label for="domain" class="col-form-label">domain:</label>
            <input type="text" class="form-control" id="domain">
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
            <label for="domain_u" class="col-form-label">domain:</label>
            <input type="text" class="form-control" id="domain_u">
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
      &nbsp;
    </div>
    <div>
        Toggle column:  
          <a class="toggle-vis" data-column="0">No</a> - 
          <a class="toggle-vis" data-column="1">domain</a> - 
          <a class="toggle-vis" data-column="2">source</a> - 
          <a class="toggle-vis" data-column="3">tf</a> - 
          <a class="toggle-vis" data-column="4">cf</a> - 
          <a class="toggle-vis" data-column="5">bl</a> - 
          <a class="toggle-vis" data-column="6">rd</a> - 
          <a class="toggle-vis" data-column="7">languages</a> - 
          <a class="toggle-vis" data-column="8">da</a> - 
          <a class="toggle-vis" data-column="9">pa</a> - 
          <a class="toggle-vis" data-column="10">age</a> - 
          <a class="toggle-vis" data-column="11">score</a> - 
          <a class="toggle-vis" data-column="12">redirects</a> - 
          <a class="toggle-vis" data-column="13">history</a> - 
          <a class="toggle-vis" data-column="14">domain drops</a> - 
          <a class="toggle-vis" data-column="15">total organic results</a> - 
          <a class="toggle-vis" data-column="16">semrush traffic</a> - 
          <a class="toggle-vis" data-column="17">semrush rank</a> - 
          <a class="toggle-vis" data-column="18">semrush keyword number</a> - 
          <a class="toggle-vis" data-column="19">date added</a> - 
          <a class="toggle-vis" data-column="20">price</a> - 
          <a class="toggle-vis" data-column="21">expiry date</a> - 
          <a class="toggle-vis" data-column="22">status</a> - 
          <a class="toggle-vis" data-column="23">status seo</a>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>domain</th>
                <th>source</th>
                <th>tf</th>
                <th>cf</th>
                <th>bl</th>
                <th>rd</th>
                <th>languages</th>
                <th>da</th>
                <th>pa</th>
                <th>age</th>
                <th>score</th>
                <th>redirects</th>
                <th>history</th>
                <th>domain drops</th>
                <th>total organic results</th>
                <th>semrush traffic</th>
                <th>semrush rank</th>
                <th>semrush keyword number</th>
                <th>date added</th>
                <th>price</th>
                <th>expiry date</th>
                <th>status</th>
                <th>status seo</th>
                
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</body>
     
<script type="text/javascript">
  $(function () {
    $('#expiry_date_d').datetimepicker({
                      format: 'Y-m-d H:i:00'
                  });
    $('#expiry_date_du').datetimepicker({
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
            {data: 'domain', name: 'domain'},
            {data: 'source', name: 'source'},
            {data: 'tf', name: 'tf'},
            {data: 'cf', name: 'cf'},
            {data: 'bl', name: 'bl'},
            {data: 'rd', name: 'rd'},
            {data: 'languages', name: 'languages'},
            {data: 'da', name: 'da'},
            {data: 'pa', name: 'pa'},
            {data: 'age', name: 'age'},
            {data: 'score', name: 'score'},
            {data: 'redirects', name: 'redirects'},
            {data: 'history', name: 'history'},
            {data: 'domain_drops', name: 'domain_drops'},
            {data: 'total_organic_results', name: 'total_organic_results'},
            {data: 'semrush_traffic', name: 'semrush_traffic'},
            {data: 'semrush_rank', name: 'semrush_rank'},
            {data: 'semrush_keyword_number', name: 'semrush_keyword_number'},
            {data: 'date_added', name: 'date_added'},
            {data: 'price', name: 'price'},
            {data: 'expiry_date', name: 'expiry_date'},
            {data: 'status', name: 'status'},
            {data: 'status_seo', name: 'status_seo'},
        ],
        'createdRow': function( row, data, dataIndex ) {
            $(row).addClass( 'domain-row' );
            $(row).data('id', data.id);
            $(row).data('domain', data.domain);
            $(row).data('source', data.source);
            $(row).data('tf', data.tf);
            $(row).data('cf', data.cf);
            $(row).data('bl', data.bl);
            $(row).data('rd', data.rd);
            $(row).data('languages', data.languages);
            $(row).data('da', data.da);
            $(row).data('pa', data.pa);
            $(row).data('age', data.age);
            $(row).data('score', data.score);
            $(row).data('redirects', data.redirects);
            $(row).data('history', data.history);
            $(row).data('domain_drops', data.domain_drops);
            $(row).data('total_organic_results', data.total_organic_results);
            $(row).data('semrush_traffic', data.semrush_traffic);
            $(row).data('semrush_rank', data.semrush_rank);
            $(row).data('semrush_keyword_number', data.semrush_keyword_number);
            $(row).data('date_added', data.date_added);
            $(row).data('price', data.price);
            $(row).data('expiry_date', data.expiry_date);
            $(row).data('status', data.status);
            $(row).data('status_seo', data.status_seo);
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

            $('#domain_du').val($(this).data('domain'));
            $('#source_du').val($(this).data('source'));
            $('#tf_du').val($(this).data('tf'));
            $('#cf_du').val($(this).data('cf'));
            $('#bl_du').val($(this).data('bl'));
            $('#rd_du').val($(this).data('rd'));
            $('#languages_du').val($(this).data('languages'));
            $('#da_du').val($(this).data('da'));
            $('#pa_du').val($(this).data('pa'));
            $('#age_du').val($(this).data('age'));
            $('#score_du').val($(this).data('score'));
            $('#redirects_du').val($(this).data('redirects'));
            $('#history_du').val($(this).data('history'));
            $('#domain_drops_du').val($(this).data('domain_drops'));
            $('#total_organic_results_du').val($(this).data('total_organic_results'));
            $('#semrush_traffic_du').val($(this).data('semrush_traffic'));
            $('#semrush_rank_du').val($(this).data('semrush_rank'));
            $('#semrush_keyword_number_du').val($(this).data('semrush_keyword_number'));
            $('#date_added_du').val($(this).data('date_added'));
            $('#price_du').val($(this).data('price'));
            $('#expiry_date_du').val($(this).data('expiry_date'));
            $('#status_du').val($(this).data('status'));
            $('#status_seo_du').val($(this).data('status_seo'));

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
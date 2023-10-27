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
    <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/build/jquery.datetimepicker.min.css" />
    <script src="/build/jquery.datetimepicker.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script src="{{ url('/') }}/js/domain.js"></script>
    <link href="{{ url('/') }}/css/domain.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="ajax_waiting"></div>
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
            <label for="domain" class="col-form-label">Filter Name:</label>
            <input type="text" class="form-control" id="filter_name">
          </div>
          <div class="col-12">
            <label for="domain" class="col-form-label">Keyword:</label>
            <input type="text" class="form-control" id="keyword">
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
            <label for="pa" class="col-form-label">TF Min:</label>
            <input type="number" min="0" class="form-control" id="tfmin">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">TF Max:</label>
            <input type="number" min="0" class="form-control" id="tfmax">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">CF Min:</label>
            <input type="number" min="0" class="form-control" id="cfmin">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">CF Max:</label>
            <input type="number" min="0" class="form-control" id="cfmax">
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
            <label for="domain_u" class="col-form-label">Filter Name:</label>
            <input type="text" class="form-control" id="filter_name_u">
          </div>
          <div class="col-12">
            <label for="domain_u" class="col-form-label">Keyword:</label>
            <input type="text" class="form-control" id="keyword_u">
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
            <label for="da" class="col-form-label">TF Min:</label>
            <input type="number" min="0" class="form-control" id="tfmin_u">
          </div>
          <div class="col-6">
            <label for="da" class="col-form-label">TF Max:</label>
            <input type="number" min="0" class="form-control" id="tfmax_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">CF Min:</label>
            <input type="number" min="0" class="form-control" id="cfmin_u">
          </div>
          <div class="col-6">
            <label for="pa" class="col-form-label">CF Max:</label>
            <input type="number" min="0" class="form-control" id="cfmax_u">
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
  <div class="sticky-option2">
    <h1>Domains <span class="float-end add-domain"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
  </svg> Add Domain</span></h1>
    <div class="float-end filter-class">
      <a href="javascript:void(0)"  id="filter-clear">All data</a>
    </div>
    <div class="float-end filter-class pe-2">
      <a href="javascript:void(0)">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
        </svg> Filter
      </a>
    </div>
    <div class="filter-class">
      <div class="filter-model">
          <ul>
              @foreach($filters as $filter)
              <li class="filter-item" value="{{ $filter->id }}">
                  <a href="javascript:void(0)" class="accept-item" data-id="{{ $filter->id }}">{{ $filter->filter_name }}</a>
                  <a href="javascript:void(0)" class="delete-item" data-id="{{ $filter->id }}">delete</a>
                  <a href="javascript:void(0)" class="update-item" 
                              data-id="{{ $filter->id }}" 
                              data-filter_name="{{ $filter->filter_name }}"
                              data-keyword="{{ $filter->keyword }}"
                              data-damin="{{ $filter->damin }}"
                              data-damax="{{ $filter->damax }}"
                              data-pamin="{{ $filter->pamin }}"
                              data-pamax="{{ $filter->pamax }}"
                              data-rdmin="{{ $filter->rdmin }}"
                              data-rdmax="{{ $filter->rdmax }}"
                              data-blmin="{{ $filter->blmin }}"
                              data-blmax="{{ $filter->blmax }}"
                              data-tfmin="{{ $filter->tfmin }}"
                              data-tfmax="{{ $filter->tfmax }}"
                              data-cfmin="{{ $filter->cfmin }}"
                              data-cfmax="{{ $filter->cfmax }}"
                              data-pricemin="{{ $filter->pricemin }}"
                              data-pricemax="{{ $filter->pricemax }}"
                              data-agemin="{{ $filter->agemin }}"
                              data-agemax="{{ $filter->agemax }}"
                          >edit</a>
              </li>
              @endforeach
              <li id="filter-add"><a href="javascript:void(0)">Add Filter</a></li>
          </ul>
      </div>
    </div>
    <div class="py-4">
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Toggle column:
      </button>
      <!-- <span class="btn toggle-column-btn">Toggle column: </span> -->
      <div class="collapse" id="collapseExample">
        <div class="d-flex flex-wrap align-items-center g-3">
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="0" type="checkbox" checked data-id="no" id="no_column">
            <label class="form-check-label" for="no_column">
              No
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="1" type="checkbox" checked data-id="domain" id="domain_column">
            <label class="form-check-label" for="domain_column">
              Domain
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="2" type="checkbox" checked data-id="status_seo" id="status_seo_column">
            <label class="form-check-label" for="status_seo_column">
              Status Seo
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="3" type="checkbox" checked data-id="source" id="source_column">
            <label class="form-check-label" for="source_column">
              Source
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="4" type="checkbox" checked data-id="tf" id="tf_column">
            <label class="form-check-label" for="tf_column">
              TF
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="5" type="checkbox" checked data-id="cf" id="cf_column">
            <label class="form-check-label" for="cf_column">
              CF
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="6" type="checkbox" checked data-id="bl" id="bl_column">
            <label class="form-check-label" for="bl_column">
              BL
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="7" type="checkbox" checked data-id="rd" id="rd_column">
            <label class="form-check-label" for="rd_column">
              RD
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="8" type="checkbox" checked data-id="da" id="da_column">
            <label class="form-check-label" for="da_column">
              DA
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="9" type="checkbox" checked data-id="pa" id="pa_column">
            <label class="form-check-label" for="pa_column">
              PA
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="10" type="checkbox" checked data-id="language" id="language_column">
            <label class="form-check-label" for="language_column">
              Languages
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="11" type="checkbox" checked data-id="age" id="age_column">
            <label class="form-check-label" for="age_column">
              Age
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="12" type="checkbox" checked data-id="score" id="score_column">
            <label class="form-check-label" for="score_column">
              Score
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="13" type="checkbox" checked data-id="redirects" id="redirects_column">
            <label class="form-check-label" for="redirects_column">
              Redirects
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="14" type="checkbox" checked data-id="history" id="history_column">
            <label class="form-check-label" for="history_column">
              History
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="15" type="checkbox" checked data-id="domain_drops" id="domain_drops_column">
            <label class="form-check-label" for="domain_drops_column">
              Domain Drops
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="16" type="checkbox" checked data-id="total_organic_results" id="total_organic_results_column">
            <label class="form-check-label" for="total_organic_results_column">
              Total Organic Results
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="17" type="checkbox" checked data-id="semrush_traffic" id="semrush_traffic_column">
            <label class="form-check-label" for="semrush_traffic_column">
              Semrush Traffic
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="18" type="checkbox" checked data-id="semrush_rank" id="semrush_rank_column">
            <label class="form-check-label" for="semrush_rank_column">
              Semrush Rank
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="19" type="checkbox" checked data-id="semrush_keyword_number" id="semrush_keyword_number_column">
            <label class="form-check-label" for="semrush_keyword_number_column">
              Semrush Keyword Number
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="20" type="checkbox" checked data-id="date_added" id="date_added_column">
            <label class="form-check-label" for="date_added_column">
              Date Added
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="21" type="checkbox" checked data-id="price" id="price_column">
            <label class="form-check-label" for="price_column">
              Price
            </label>
          </div>
          <div class="form-check me-4 mt-2 ">
            <input class="form-check-input toggle-item toggle-vis" data-column="22" type="checkbox" checked data-id="expiry_date" id="expiry_date_column">
            <label class="form-check-label" for="expiry_date_column">
              Expiry Date
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="info-table">
      @if(isset($fil))
      Filter: <span class="filter-info"><b>{{ isset($fil) ? $fil->filter_name: 'null'; }}</b></span> với <b><span class="number-result">...</span></b> kết quả
      @endif
    </div>
    <div class="wrap-table">
      <table class="table table-bordered data-table table-fixed" >
          <thead class="table-dark">
              <tr>
                  <th class="id-field text-center" width="3%">
                      <input type="checkbox" id="select-all-btn" data-check="false">
                  </th>
                  <th>domain</th>
                  <th>status seo</th>
                  <th>source</th>
                  <th>tf</th>
                  <th>cf</th>
                  <th>bl</th>
                  <th>rd</th>
                  <th>da</th>
                  <th>pa</th>
                  <th>lang</th>
                  <th>age</th>
                  <th>score</th>
                  <th>redirects</th>
                  <th>history</th>
                  <th>drops</th>
                  <th>total organic results</th>
                  <th>sem traffic</th>
                  <th>sem rank</th>
                  <th>sem keyword number</th>
                  <th>date added</th>
                  <th>price</th>
                  <th>expiry date</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
      
      <p class="action-selected-rows">
        <span>Action on selected rows:</span>
        <span class="btn btn-sm chua-check-i ml-2 apply-all-btn" data-change="0" id="apply-all-btn-chua-check">Chưa check</span>
        <span class="btn btn-sm dang-check-i ml-2 apply-all-btn" data-change="1" id="apply-all-btn-dang-check">Đang check</span>
        <span class="btn btn-sm da-check-i ml-2 apply-all-btn" data-change="2" id="apply-all-btn-da-check">Đã check</span>
        <span class="btn btn-sm chot-mua-i ml-2 apply-all-btn" data-change="3" id="apply-all-btn-chot-mua">Chốt mua</span>
        <span class="btn btn-sm da-mua-i ml-2 apply-all-btn" data-change="4" id="apply-all-btn-da-mua">Đã mua</span>
      </p>  
    </div>
</div>
</body>
     
<script type="text/javascript">
  $(document).ready(function(){
    var roleCheckList           = [];

    $('.apply-all-btn').click(function (){
      var $id_list = [];
      $.each($('.check-cities'), function (key, value){
        if($(this).prop('checked') == true) {
          $id_list.push( $(this).attr("data-column") );
        }
      });
      
      if ($id_list.length > 0) {
        $('.ajax_waiting').addClass('loading');
        var data = {
            id_list : $id_list,
            switch : $(this).data('change'),
            active  : '1',
        };

        $.ajaxSetup(
        {
          headers:
          {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('/') }}/domains/actionMulti",
            data: data,
            dataType  : 'json',
            success: function (obj) {
              $('.ajax_waiting').removeClass('loading');
              if(obj.status == 200){
                table.ajax.reload(null, false); 
              }
            },
            error: function (data) {
              $('.ajax_waiting').removeClass('loading');
              if(data.status == 401){
                window.location.replace(baseURL);
              }else{
                $().toastmessage('showErrorToast', errorConnect);
              }
            }
        });
      }
    });

    $('#expiry_date_d').datetimepicker({
                      format: 'Y-m-d H:i:00'
                  });
    $('#expiry_date_du').datetimepicker({
                      format: 'Y-m-d H:i:00'
                  });


    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        stateSave: false,
        fixedHeader: true,
        aaSorting: [],
        pageLength: 25,
        colReorder: {
          fixedColumnsRight: 1,
          fixedColumnsLeft: 1
        },
        ajax: "{{ route('domains.index', ['filter' => isset($_GET['filter']) ? $_GET['filter'] : null]) }}",
        columns: [
            { 
              data: "rows",
              class: "rows-item text-center",
              render: function(data, type, row){
                  return '<input type="checkbox" name="selectCol" class="check-cities" value="' + data + '" data-column="' + data + '">';
              },
              orderable: false
            },
            {data: 'domain', name: 'domain', class: 'edit-switch'},
            {data: 'status_seo', name: 'status_seo', class: 'edit-switch seo-status',
              render: function(data, type, row){
                let html = '';
                switch(data){
                  case 0: html = '<span class="chua-check-i">Chưa check</span>'; break;
                  case 1: html = '<span class="dang-check-i">Đang check</span>'; break;
                  case 2: html = '<span class="da-check-i">Đã check</span>'; break;
                  case 3: html = '<span class="chot-mua-i">Chốt mua</span>'; break;
                  case 4: html = '<span class="da-mua-i">Đã mua</span>'; break;
                }
                return html;
              },
            },
            {data: 'source', name: 'source', class: 'edit-switch', render: function(data, type, row) {
              return '<a href="'+data+'" target="_blank">source</a>';                                            
            }},
            {data: 'tf', name: 'tf', class: 'edit-switch'},
            {data: 'cf', name: 'cf', class: 'edit-switch'},
            {data: 'bl', name: 'bl', class: 'edit-switch'},
            {data: 'rd', name: 'rd', class: 'edit-switch'},
            {data: 'da', name: 'da', class: 'edit-switch'},
            {data: 'pa', name: 'pa', class: 'edit-switch'},
            {data: 'languages', name: 'languages', class: 'edit-switch'},
            {data: 'age', name: 'age', class: 'edit-switch'},
            {data: 'score', name: 'score', class: 'edit-switch'},
            {data: 'redirects', name: 'redirects', class: 'edit-switch'},
            {data: 'history', name: 'history', class: 'edit-switch'},
            {data: 'domain_drops', name: 'domain_drops', class: 'edit-switch'},
            {data: 'total_organic_results', name: 'total_organic_results', class: 'edit-switch'},
            {data: 'semrush_traffic', name: 'semrush_traffic', class: 'edit-switch'},
            {data: 'semrush_rank', name: 'semrush_rank', class: 'edit-switch'},
            {data: 'semrush_keyword_number', name: 'semrush_keyword_number', class: 'edit-switch'},
            {data: 'date_added', name: 'date_added', class: 'edit-switch'},
            {data: 'price', name: 'price', class: 'edit-switch'},
            {data: 'expiry_date2', name: 'expiry_date', class: 'edit-switch', render: function(data) {
              return moment(data).format('MM/DD/YYYY');
            }},
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
            $(row).data('expiry_date', data.expiry_date2);
            $(row).data('status_seo', data.status_seo);
            if(data.status_seo == 0){
              $(row).addClass( 'chua-check' );
            }else if(data.status_seo == 1){
              $(row).addClass( 'dang-check' );
            }else if(data.status_seo == 2){
              $(row).addClass( 'da-check' );
            }else if(data.status_seo == 3){
              $(row).addClass( 'chot-mua' );
            }else if(data.status_seo == 4){
              $(row).addClass( 'da-mua' );
            }
        },
        'initComplete': function(settings, json) {
          addEvent();
        },
        'drawCallback': function(settings, start, end, max, total, pre){
          addEvent();
          checkCheckboxChecked();
          $('.number-result').text(this.fnSettings().json.recordsTotal);
        }
    });

    //select all checkboxes
    $("#select-all-btn").change(function(){  
        $('table tbody input[type="checkbox"]').prop('checked', $(this).prop("checked"));
        // save localstore
        setCheckboxChecked();
    });

    $('body').on('click', 'table tbody input[type="checkbox"]', function() {
        if(false == $(this).prop("checked")){
            $("#select-all-btn").prop('checked', false); 
        }
        if ($('table tbody input[type="checkbox"]:checked').length == $('table tbody input[type="checkbox"]').length ){
            $("#select-all-btn").prop('checked', true);
        }

        // save localstore
        setCheckboxChecked();
    });

    function setCheckboxChecked(){
        roleCheckList = [];
        $.each($('.check-cities'), function( index, value ) {
            if($(this).prop('checked')){
                roleCheckList.push($(this).val());
            }
        });
        // console.log(roleCheckList);
    }

    function checkCheckboxChecked(){
        // console.log(roleCheckList);
        var count_row = 0;
        var listCities = $('.check-cities');
        if(listCities.length > 0){
            $.each(listCities, function( index, value ) {
                if(containsObject($(this).val(), roleCheckList)){
                    $(this).prop('checked', 'true');
                    count_row++;
                }
            });

            if(count_row == listCities.length){
                $('#select-all-btn').prop('checked', true);
            }else{
                $('#select-all-btn').prop('checked', false);
            }
        }else{
            $('#select-all-btn').prop('checked', false);
        }
    }

    function containsObject(obj, list) {
        var i;
        for (i = 0; i < list.length; i++) {
            if (list[i] === obj) {
                return true;
            }
        }

        return false;
    }

    function addEvent(){
        $('.domain-row .edit-switch').off('click');
        $('.domain-row .edit-switch').click(function(){
            $('#update-domain').data('id', $(this).parent().data('id'));
            $('#delete-domain').data('id', $(this).parent().data('id'));

            $('#domain_du').val($(this).parent().data('domain'));
            $('#source_du').val($(this).parent().data('source'));
            $('#tf_du').val($(this).parent().data('tf'));
            $('#cf_du').val($(this).parent().data('cf'));
            $('#bl_du').val($(this).parent().data('bl'));
            $('#rd_du').val($(this).parent().data('rd'));
            $('#languages_du').val($(this).parent().data('languages'));
            $('#da_du').val($(this).parent().data('da'));
            $('#pa_du').val($(this).parent().data('pa'));
            $('#age_du').val($(this).parent().data('age'));
            $('#score_du').val($(this).parent().data('score'));
            $('#redirects_du').val($(this).parent().data('redirects'));
            $('#history_du').val($(this).parent().data('history'));
            $('#domain_drops_du').val($(this).parent().data('domain_drops'));
            $('#total_organic_results_du').val($(this).parent().data('total_organic_results'));
            $('#semrush_traffic_du').val($(this).parent().data('semrush_traffic'));
            $('#semrush_rank_du').val($(this).parent().data('semrush_rank'));
            $('#semrush_keyword_number_du').val($(this).parent().data('semrush_keyword_number'));
            $('#date_added_du').val($(this).parent().data('date_added'));
            $('#price_du').val($(this).parent().data('price'));
            $('#expiry_date_du').val($(this).parent().data('expiry_date'));
            $('#status_seo_du').val($(this).parent().data('status_seo'));

            if($('#updateDomain').hasClass('show')){
                $('#updateDomain').modal('hidden');
            }else{
                $('#updateDomain').modal('show');
            }
        })
    }

    let toggleCollumn = [];
    function checkToggleCollumn(){
        var toggleCollumnDefault = {
            'no': true,
            'domain': true,
            'source': true,
            'tf': true,
            'cf': true,
            'bl': true,
            'rd': true,
            'languages': true,
            'da': true,
            'pa': true,
            'age': true,
            'score': true,
            'redirects': true,
            'history': true,
            'domain_drops': true,
            'total_organic_results': true,
            'semrush_traffic': true,
            'semrush_rank': true,
            'semrush_keyword_number': true,
            'date_added': true,
            'price': true,
            'expiry_date': true,
            'status_seo': true
        }

        // Put the object into storage
        // localStorage.setItem('testObject', JSON.stringify(testObject));

        // Retrieve the object from storage
        // var retrievedObject = localStorage.getItem('testObject');

        // console.log('retrievedObject: ', JSON.parse(retrievedObject));

        
        if (localStorage.getItem("toggleCollumn") === null) {
            localStorage.setItem('toggleCollumn', JSON.stringify(toggleCollumnDefault));
            toggleCollumn = toggleCollumnDefault;
        }else{
            toggleCollumn = JSON.parse(localStorage.getItem("toggleCollumn"))
        }

        console.log(toggleCollumn);

        $('#no_column').prop( "checked", true );
        $('#domain_column').prop( "checked", true );
        $('#source_column').prop( "checked", true );
        $('#tf_column').prop( "checked", true );
        $('#cf_column').prop( "checked", true );
        $('#bl_column').prop( "checked", true );
        $('#rd_column').prop( "checked", true );
        $('#languages_column').prop( "checked", true );
        $('#da_column').prop( "checked", true );
        $('#pa_column').prop( "checked", true );
        $('#age_column').prop( "checked", true );
        $('#score_column').prop( "checked", true );
        $('#redirects_column').prop( "checked", true );
        $('#history_column').prop( "checked", true );
        $('#domain_drops_column').prop( "checked", true );
        $('#total_organic_results_column').prop( "checked", true );
        $('#semrush_traffic_column').prop( "checked", true );
        $('#semrush_rank_column').prop( "checked", true );
        $('#semrush_keyword_number_column').prop( "checked", true );
        $('#date_added_column').prop( "checked", true );
        $('#price_column').prop( "checked", true );
        $('#expiry_date_column').prop( "checked", true );
        $('#status_seo_column').prop( "checked", true );

        if(!toggleCollumn.no){ $('#no_column').click(); }
        if(!toggleCollumn.domain){ $('#domain_column').click(); }
        if(!toggleCollumn.source){ $('#source_column').click(); }
        if(!toggleCollumn.tf){ $('#tf_column').click(); }
        if(!toggleCollumn.cf){ $('#cf_column').click(); }
        if(!toggleCollumn.bl){ $('#bl_column').click(); }
        if(!toggleCollumn.rd){ $('#rd_column').click(); }
        if(!toggleCollumn.languages){ $('#languages_column').click(); }
        if(!toggleCollumn.da){ $('#da_column').click(); }
        if(!toggleCollumn.pa){ $('#pa_column').click(); }
        if(!toggleCollumn.age){ $('#age_column').click(); }
        if(!toggleCollumn.score){ $('#score_column').click(); }
        if(!toggleCollumn.redirects){ $('#redirects_column').click(); }
        if(!toggleCollumn.history){ $('#history_column').click(); }
        if(!toggleCollumn.domain_drops){ $('#domain_drops_column').click(); }
        if(!toggleCollumn.total_organic_results){ $('#total_organic_results_column').click(); }
        if(!toggleCollumn.semrush_traffic){ $('#semrush_traffic_column').click(); }
        if(!toggleCollumn.semrush_rank){ $('#semrush_rank_column').click(); }
        if(!toggleCollumn.semrush_keyword_number){ $('#semrush_keyword_number_column').click(); }
        if(!toggleCollumn.date_added){ $('#date_added_column').click(); }
        if(!toggleCollumn.price){ $('#price_column').click(); }
        if(!toggleCollumn.expiry_date){ $('#expiry_date_column').click(); }
        if(!toggleCollumn.status_seo){ $('#status_seo_column').click(); }
    }

    $('.toggle-item').click(function(){

      // alert()
      let columnIdx = $(this).data('column');
      let column = table.column(columnIdx);

      // Toggle the visibility
      column.visible($(this).prop( "checked"));

      toggleCollumn[$(this).data('id')] = $(this).is(":checked");
      localStorage.setItem('toggleCollumn', JSON.stringify(toggleCollumn));
    })
    
    checkToggleCollumn();
      
  });
</script>
</html>
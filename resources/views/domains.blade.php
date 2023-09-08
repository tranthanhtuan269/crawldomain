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
    <style>
        .toggle-vis{
            cursor: pointer;
        }
    </style>
</head>
<body>
     
<div class="container-fluid">
    <h1>Domains</h1>
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
                        <a class="toggle-vis" data-column="15">MARKETPLACE</a> - 
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
                <th>Ref</th>
                <th>TF</th>
                <th>CF</th>
                <th>REE</th>
                <th>DR</th>
                <th>UR</th>
                <th>DP</th>
                <th>ABY</th>
                <th>ACR</th>
                <th>ADD Date</th>
                <th>REGISTRAR</th>
                <th>MARKETPLACE</th>
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
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        ajax: "{{ route('domains.index') }}",
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
            {data: 'add_date', name: 'add_date'},
            {data: 'registrar', name: 'registrar'},
            {data: 'market_place', name: 'market_place'},
            {data: 'price', name: 'price'},
            {data: 'cate1', name: 'cate1'},
            {data: 'cate2', name: 'cate2'},
        ]
    });

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
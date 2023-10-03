$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.filter-class').click(function(){
        if($('.filter-model').css('display') == 'none')
        {
            $('.filter-model').css('display', 'block')
        }else{
            $('.filter-model').css('display', 'none')
        }
    })

    $('#filter-add').click(function(){
        if($('#addModel').hasClass('show')){
            $('#addModel').modal('hidden');
        }else{
            $('#addModel').modal('show');
        }
    })

    $('.add-domain').click(function(){
        if($('#addDomain').hasClass('show')){
            $('#addDomain').modal('hidden');
        }else{
            $('#addDomain').modal('show');
        }
    })


    $('#filter-clear').click(function(){
        window.location.href = '/';
    })

    $('.accept-item').click(function(){
        window.location.href = '/?filter='+$(this).data('id');
    })

    $('.update-item').click(function(){
        $('#name_u').val($(this).data('name'));
        $('#damin_u').val($(this).data('damin'));
        $('#damax_u').val($(this).data('damax'));
        $('#pamin_u').val($(this).data('pamin'));
        $('#pamax_u').val($(this).data('pamax'));
        $('#drmin_u').val($(this).data('drmin'));
        $('#drmax_u').val($(this).data('drmax'));
        $('#urmin_u').val($(this).data('urmin'));
        $('#urmax_u').val($(this).data('urmax'));
        $('#rdmin_u').val($(this).data('rdmin'));
        $('#rdmax_u').val($(this).data('rdmax'));
        $('#blmin_u').val($(this).data('blmin'));
        $('#blmax_u').val($(this).data('blmax'));
        $('#agemin_u').val($(this).data('agemin'));
        $('#agemax_u').val($(this).data('agemax'));
        $('#pricemin_u').val($(this).data('pricemin'));
        $('#pricemax_u').val($(this).data('pricemax'));
        $('#update-filter').data('id', $(this).data('id'));
        if($('#editMode').hasClass('show')){
            $('#editMode').modal('hidden');
        }else{
            $('#editMode').modal('show');
        }
    })

    $('#save-domain').click(function(){
        var name = $('#name_d').val();
        var da = $('#da_d').val();
        var pa = $('#pa_d').val();
        var ref = $('#ref_d').val();
        var tf = $('#tf_d').val();
        var cf = $('#cf_d').val();
        var ree = $('#ree_d').val();
        var dr = $('#dr_d').val();
        var ur = $('#ur_d').val();
        var dp = $('#dp_d').val();
        var aby = $('#aby_d').val();
        var acr = $('#acr_d').val();
        var add_date = $('#add_date_d').val();
        var registrar = $('#registrar_d').val();
        var market_place = $('#market_place_d').val();
        var price = $('#price_d').val();
        var cate1 = $('#cate1_d').val();
        var cate2 = $('#cate2_d').val();
        var status = $('#status_d').val();

        var request = $.ajax({
            url: "/domains",
            method: "POST",
            data: {
                name : name,
                da : da,
                pa : pa,
                ref : ref,
                tf : tf,
                cf : cf,
                ree : ree,
                dr : dr,
                ur : ur,
                dp : dp,
                aby : aby,
                acr : acr,
                add_date : add_date,
                registrar : registrar,
                market_place : market_place,
                price : price,
                cate1 : cate1,
                cate2 : cate2,
                status: status
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('#update-domain').click(function(){
        var id = $(this).data('id');
        var name = $('#name_du').val();
        var da = $('#da_du').val();
        var pa = $('#pa_du').val();
        var ref = $('#ref_du').val();
        var tf = $('#tf_du').val();
        var cf = $('#cf_du').val();
        var ree = $('#ree_du').val();
        var dr = $('#dr_du').val();
        var ur = $('#ur_du').val();
        var dp = $('#dp_du').val();
        var aby = $('#aby_du').val();
        var acr = $('#acr_du').val();
        var add_date = $('#add_date_du').val();
        var registrar = $('#registrar_du').val();
        var market_place = $('#market_place_du').val();
        var price = $('#price_du').val();
        var cate1 = $('#cate1_du').val();
        var cate2 = $('#cate2_du').val();
        var status = $('#status_du').val();

        var request = $.ajax({
            url: "/domains/"+id,
            method: "POST",
            data: {
                _method: 'PUT',
                name : name,
                da : da,
                pa : pa,
                ref : ref,
                tf : tf,
                cf : cf,
                ree : ree,
                dr : dr,
                ur : ur,
                dp : dp,
                aby : aby,
                acr : acr,
                add_date : add_date,
                registrar : registrar,
                market_place : market_place,
                price : price,
                cate1 : cate1,
                cate2 : cate2,
                status: status
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('#delete-domain').click(function(){
        var id = $(this).data('id');

        var request = $.ajax({
            url: "/domains/" + id,
            method: "POST",
            data: {
                _method: 'DELETE'
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('#save-filter').click(function(){
        var name = $('#name').val();
        var damin = $('#damin').val();
        var damax = $('#damax').val();
        var pamin = $('#pamin').val();
        var pamax = $('#pamax').val();
        var drmin = $('#drmin').val();
        var drmax = $('#drmax').val();
        var urmin = $('#urmin').val();
        var urmax = $('#urmax').val();
        var rdmin = $('#rdmin').val();
        var rdmax = $('#rdmax').val();
        var blmin = $('#blmin').val();
        var blmax = $('#blmax').val();
        var agemin = $('#agemin').val();
        var agemax = $('#agemax').val();
        var pricemin = $('#pricemin').val();
        var pricemax = $('#pricemax').val();

        var request = $.ajax({
            url: "/filters",
            method: "POST",
            data: {
                name : name,
                damin : damin,
                damax : damax,
                pamin : pamin,
                pamax : pamax,
                drmin : drmin,
                drmax : drmax,
                urmin : urmin,
                urmax : urmax,
                rdmin : rdmin,
                rdmax : rdmax,
                blmin : blmin,
                blmax : blmax,
                agemin : agemin,
                agemax : agemax,
                pricemin : pricemin,
                pricemax  : pricemax
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('#update-filter').click(function(){
        var id = $(this).data('id');
        var name = $('#name_u').val();
        var damin = $('#damin_u').val();
        var damax = $('#damax_u').val();
        var pamin = $('#pamin_u').val();
        var pamax = $('#pamax_u').val();
        var drmin = $('#drmin_u').val();
        var drmax = $('#drmax_u').val();
        var urmin = $('#urmin_u').val();
        var urmax = $('#urmax_u').val();
        var rdmin = $('#rdmin_u').val();
        var rdmax = $('#rdmax_u').val();
        var blmin = $('#blmin_u').val();
        var blmax = $('#blmax_u').val();
        var agemin = $('#agemin_u').val();
        var agemax = $('#agemax_u').val();
        var pricemin = $('#pricemin_u').val();
        var pricemax = $('#pricemax_u').val();

        var request = $.ajax({
            url: "/filters/" + id,
            method: "POST",
            data: {
                _method: 'PUT',
                name : name,
                damin : damin,
                damax : damax,
                pamin : pamin,
                pamax : pamax,
                drmin : drmin,
                drmax : drmax,
                urmin : urmin,
                urmax : urmax,
                rdmin : rdmin,
                rdmax : rdmax,
                blmin : blmin,
                blmax : blmax,
                agemin : agemin,
                agemax : agemax,
                pricemin : pricemin,
                pricemax  : pricemax
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('.delete-item').click(function(){
        var id = $(this).data('id');

        var request = $.ajax({
            url: "/filters/" + id,
            method: "POST",
            data: {
                _method: 'DELETE'
            },
            dataType: "json"
        });

        request.done(function( msg ) {
            location.reload();
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })

    $('.domain-available-soon').click(function(){
        if(window.location.href.includes("?")){
            location.href = window.location.href + '&status=available-soon';
        }else{
            location.href = window.location.href + '?status=available-soon';
        }
        return false;
    })

    $('.domain-available').click(function(){
        if(window.location.href.includes("?")){
            location.href = window.location.href + '&status=available';
        }else{
            location.href = window.location.href + '?status=available';
        }
        return false;
    })

    $('.domain-in-auction').click(function(){
        if(window.location.href.includes("?")){
            location.href = window.location.href + '&status=in-auction';
        }else{
            location.href = window.location.href + '?status=in-auction';
        }
        return false;
    })

    $('.domain-exp').click(function(){
        if(window.location.href.includes("?")){
            location.href = window.location.href + '&status=domain-exp';
        }else{
            location.href = window.location.href + '?status=domain-exp';
        }
        return false;
    })
})
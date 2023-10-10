$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.filter-class').click(function () {
        if ($('.filter-model').css('display') == 'none') {
            $('.filter-model').css('display', 'block')
        } else {
            $('.filter-model').css('display', 'none')
        }
    })

    $('.add-domain').click(function () {
        if ($('#addDomain').hasClass('show')) {
            $('#addDomain').modal('hidden');
        } else {
            $('#addDomain').modal('show');
        }
    })

    $('#filter-clear').click(function () {
        window.location.href = '/';
    })

    $('#save-domain').click(function () {
        var domain = $('#domain_d').val();
        var source = $('#source_d').val();
        var tf = $('#tf_d').val();
        var cf = $('#cf_d').val();
        var bl = $('#bl_d').val();
        var rd = $('#rd_d').val();
        var languages = $('#languages_d').val();
        var da = $('#da_d').val();
        var pa = $('#pa_d').val();
        var age = $('#age_d').val();
        var score = $('#score_d').val();
        var redirects = $('#redirects_d').val();
        var history = $('#history_d').val();
        var domain_drops = $('#domain_drops_d').val();
        var total_organic_results = $('#total_organic_results_d').val();
        var semrush_traffic = $('#semrush_traffic_d').val();
        var semrush_rank = $('#semrush_rank_d').val();
        var semrush_keyword_number = $('#semrush_keyword_number_d').val();
        var date_added = $('#date_added_d').val();
        var price = $('#price_d').val();
        var expiry_date = $('#expiry_date_d').val();
        var status_seo = $('#status_seo_d').val();

        var request = $.ajax({
            url: "/domains",
            method: "POST",
            data: {
                domain: domain,
                source: source,
                tf: tf,
                cf: cf,
                bl: bl,
                rd: rd,
                languages: languages,
                da: da,
                pa: pa,
                age: age,
                score: score,
                redirects: redirects,
                history: history,
                domain_drops: domain_drops,
                total_organic_results: total_organic_results,
                semrush_traffic: semrush_traffic,
                semrush_rank: semrush_rank,
                semrush_keyword_number: semrush_keyword_number,
                date_added: date_added,
                price: price,
                expiry_date: expiry_date,
                status_seo: status_seo
            },
            dataType: "json"
        });

        request.done(function (msg) {
            location.reload();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    })

    $('#update-domain').click(function () {
        var id = $(this).data('id');
        var domain = $('#domain_du').val();
        var source = $('#source_du').val();
        var tf = $('#tf_du').val();
        var cf = $('#cf_du').val();
        var bl = $('#bl_du').val();
        var rd = $('#rd_du').val();
        var languages = $('#languages_du').val();
        var da = $('#da_du').val();
        var pa = $('#pa_du').val();
        var age = $('#age_du').val();
        var score = $('#score_du').val();
        var redirects = $('#redirects_du').val();
        var history = $('#history_du').val();
        var domain_drops = $('#domain_drops_du').val();
        var total_organic_results = $('#total_organic_results_du').val();
        var semrush_traffic = $('#semrush_traffic_du').val();
        var semrush_rank = $('#semrush_rank_du').val();
        var semrush_keyword_number = $('#semrush_keyword_number_du').val();
        var date_added = $('#date_added_du').val();
        var price = $('#price_du').val();
        var expiry_date = $('#expiry_date_du').val();
        var status_seo = $('#status_seo_du').val();

        var request = $.ajax({
            url: "/domains/" + id,
            method: "POST",
            data: {
                _method: 'PUT',
                domain: domain,
                source: source,
                tf: tf,
                cf: cf,
                bl: bl,
                rd: rd,
                languages: languages,
                da: da,
                pa: pa,
                age: age,
                score: score,
                redirects: redirects,
                history: history,
                domain_drops: domain_drops,
                total_organic_results: total_organic_results,
                semrush_traffic: semrush_traffic,
                semrush_rank: semrush_rank,
                semrush_keyword_number: semrush_keyword_number,
                date_added: date_added,
                price: price,
                expiry_date: expiry_date,
                status_seo: status_seo
            },
            dataType: "json"
        });

        request.done(function (msg) {
            location.reload();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    })

    $('#delete-domain').click(function () {
        var id = $(this).data('id');

        var request = $.ajax({
            url: "/domains/" + id,
            method: "POST",
            data: {
                _method: 'DELETE'
            },
            dataType: "json"
        });

        request.done(function (msg) {
            location.reload();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    })

    $('#save-filter').click(function () {
        $('#addModel').modal('hide');
        var request = $.ajax({
            url: "/filters",
            method: "POST",
            data: {
                'filter_name': $('#filter_name').val(),
                'keyword': $('#keyword').val(),
                'damin': $('#damin').val(),
                'damax': $('#damax').val(),
                'pamin': $('#pamin').val(),
                'pamax': $('#pamax').val(),
                'tfmin': $('#tfmin').val(),
                'tfmax': $('#tfmax').val(),
                'cfmin': $('#cfmin').val(),
                'cfmax': $('#cfmax').val(),
                'rdmin': $('#rdmin').val(),
                'rdmax': $('#rdmax').val(),
                'blmin': $('#blmin').val(),
                'blmax': $('#blmax').val(),
                'agemin': $('#agemin').val(),
                'agemax': $('#agemax').val(),
                'pricemin': $('#pricemin').val(),
                'pricemax': $('#pricemax').val()
            },
            dataType: "json"
        });

        request.done(function (msg) {

            updateFilter();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    })


    $('#update-filter').click(function () {
        $('#editMode').modal('hide');
        var id = $(this).data('id');

        var request = $.ajax({
            url: "/filters/" + id,
            method: "POST",
            data: {
                _method: 'PUT',
                'filter_name': $('#filter_name_u').val(),
                'keyword': $('#keyword_u').val(),
                'damin': $('#damin_u').val(),
                'damax': $('#damax_u').val(),
                'pamin': $('#pamin_u').val(),
                'pamax': $('#pamax_u').val(),
                'tfmin': $('#tfmin_u').val(),
                'tfmax': $('#tfmax_u').val(),
                'cfmin': $('#cfmin_u').val(),
                'cfmax': $('#cfmax_u').val(),
                'rdmin': $('#rdmin_u').val(),
                'rdmax': $('#rdmax_u').val(),
                'blmin': $('#blmin_u').val(),
                'blmax': $('#blmax_u').val(),
                'agemin': $('#agemin_u').val(),
                'agemax': $('#agemax_u').val(),
                'pricemin': $('#pricemin_u').val(),
                'pricemax': $('#pricemax_u').val()
            },
            dataType: "json"
        });

        request.done(function (msg) {
            updateFilter();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    })

    function addEventFilter() {
        $('#filter-add').off('click');
        $('#filter-add').click(function () {
            if ($('#addModel').hasClass('show')) {
                $('#addModel').modal('hidden');
            } else {
                $('#addModel').modal('show');
            }
        })

        $('.accept-item').off('click');
        $('.accept-item').click(function () {
            window.location.href = '/?filter=' + $(this).data('id');
        })
        $('.update-item').off('click');
        $('.update-item').click(function () {
            $('#filter_name_u').val($(this).data('filter_name'));
            $('#keyword_u').val($(this).data('keyword'));
            $('#damin_u').val($(this).data('damin'));
            $('#damax_u').val($(this).data('damax'));
            $('#pamin_u').val($(this).data('pamin'));
            $('#pamax_u').val($(this).data('pamax'));
            $('#tfmin_u').val($(this).data('tfmin'));
            $('#tfmax_u').val($(this).data('tfmax'));
            $('#cfmin_u').val($(this).data('cfmin'));
            $('#cfmax_u').val($(this).data('cfmax'));
            $('#rdmin_u').val($(this).data('rdmin'));
            $('#rdmax_u').val($(this).data('rdmax'));
            $('#blmin_u').val($(this).data('blmin'));
            $('#blmax_u').val($(this).data('blmax'));
            $('#agemin_u').val($(this).data('agemin'));
            $('#agemax_u').val($(this).data('agemax'));
            $('#pricemin_u').val($(this).data('pricemin'));
            $('#pricemax_u').val($(this).data('pricemax'));
            $('#update-filter').data('id', $(this).data('id'));
            if ($('#editMode').hasClass('show')) {
                $('#editMode').modal('hidden');
            } else {
                $('#editMode').modal('show');
            }
        })
        $('.delete-item').off('click');
        $('.delete-item').click(function () {
            var id = $(this).data('id');
            $(this).parent().hide();

            var request = $.ajax({
                url: "/filters/" + id,
                method: "POST",
                data: {
                    _method: 'DELETE'
                },
                dataType: "json"
            });

            request.done(function (msg) {
                updateFilter();
            });

            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });
        })
    }

    function updateFilter() {
        $('.ajax_waiting').addClass('loading');
        var request = $.ajax({
            url: "/filters",
            method: "GET",
            dataType: "json"
        });

        request.done(function (msg) {
            $('.ajax_waiting').removeClass('loading');
            $('.filter-model ul').html('');
            var html = '';
            $(msg.filters).each(function (index) {
                html += '<li class="filter-item" value="' + this.id + '"><a href="#" class="accept-item" data-id="' + this.id + '">' + this.filter_name + '</a><a href="#" class="delete-item" data-id="' + this.id + '">delete</a><a href="#" class="update-item" data-id="' + this.id + '" data-filter_name="' + this.filter_name + '" data-keyword="' + this.keyword + '" data-damin="' + this.damin + '" data-damax="' + this.damax + '" data-pamin="' + this.pamin + '" data-pamax="' + this.pamax + '" data-rdmin="' + this.rdmin + '" data-rdmax="' + this.rdmax + '" data-blmin="' + this.blmin + '" data-blmax="' + this.blmax + '" data-tfmin="' + this.tfmin + '" data-tfmax="' + this.tfmax + '" data-cfmin="' + this.cfmin + '" data-cfmax="' + this.cfmax + '" data-pricemin="' + this.pricemin + '" data-pricemax="' + this.pricemax + '" data-agemin="' + this.agemin + '" data-agemax="' + this.agemax + '">edit</a></li>';
            });
            html += '<li id="filter-add"><a href="#">Add Filter</a></li>';
            $('.filter-model ul').html(html);
            addEventFilter();
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);
        });
    }

    addEventFilter();
})
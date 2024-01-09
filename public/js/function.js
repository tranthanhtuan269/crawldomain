$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#check-now-btn').click(function(){
        var search = $( "#inputPatientName" ).val();
        var request = $.ajax({
            url: "/search",
            method: "POST",
            data: { search : search },
            dataType: "html"
        });
        
        request.done(function( msg ) {
            $( "#table-domain-info tbody" ).append( msg );
        });
        
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    })
})



$( ".remove-domain" ).click(function() {

    $('#removeDomainModal').modal('show');


    var thisData = this;

    var domain = $(thisData).attr("data-domain");
    var id = $(thisData).attr("data-id");

    $("#remove-domain-name").text(domain);

    $("#remove-domain").val(domain);
    $("#remove-id").val(id);

});

$( ".dns-modal" ).click(function() {

    $('#transferDns').modal('show');

    var thisData = this;
    //
    var dataId = $(thisData).attr("data-dnsmodal");
    var dataDomain = $(thisData).attr("data-domain");

    var text = $("#dnslist-"+dataId).html()
    $("#dns-list-info").html(text);
    $("#transfer-domain-name").text(dataDomain);
    $("#transfer-zone-id").val(dataId);

});


$( ".remove-dns" ).click(function() {

    $('#removeAllDns').modal('show');
    //
    var thisData = this;
    // //
    var dnsId = $(thisData).attr("data-id");
    $("#dns-id").val(dnsId);
});


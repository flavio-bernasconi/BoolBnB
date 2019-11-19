function init() {
    $('#bottone').click(function(e) {
        let latitude;
        let longitude;
        e.preventDefault();
        getlatlon(); //perform some operations
    });
}
function getlatlon() {
    var road = $("#road").val();
    var cap = $("#cap").val();
    var civ_num = $("#civ_num").val();
    var parametri;
    $.ajax({
        url: "https://api.tomtom.com/search/2/structuredGeocode.json",
        method: "GET",
        data: {
            countryCode: "ITA",
            limit: 1,
            streetNumber: civ_num,
            streetName: road,
            postalCode: cap,
            key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy"
        },
        success: function(data) {
            parametri = data["results"][0]["position"];
            latitude = parametri.lat;
            longitude = parametri.lon;
            $("input#latitudeflat").val(latitude);
            $("input#longitudeflat").val(longitude);
            if (data) {
                $("#form-flat").submit();
            }
        },
        error: function(err) {
            console.log("err");
        }
    })
}
$(document).ready(init);

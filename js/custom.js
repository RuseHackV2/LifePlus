/* Created by spont4e on 07/11/2015 */
$(document).ready(function () {
    /* Add event to search button */
    $("#search-btn").on("click", function (event) {
        event.preventDefault();
        var queryString = $("#query-string").val().trim();
        var city = $("#city-select").val().trim();
        loadData(city, queryString);
    });
});

/* [+] Functions [+] */

/* Function that creates HTTP requests (GET, POST, PUT, DELETE ...) */
function httpRequest(type, url, data, dataType) {
    return $.ajax({
        type: type,
        url: url,
        data: data,
        dataType: dataType
    });
}

/* Function that loading data to view */
function loadData(city, queryString) {
    if (city == undefined) {
        city = 'Bulgaria';
    }
    console.log(city);

    if (queryString == undefined){
        queryString = 'healthy';
    }
    console.log(queryString);

    var data = {
        'get': 'data',
        'city': city,
        'query': queryString
    };
    console.log(data);
    var tmpdata = httpRequest('GET', 'api/App.php', data, 'json');
    tmpdata.success(function (result) {
        // Append data in HTML
        var homeContent = '<p class="text-center">Препоръчано за вас</p>';
        console.log(result);

        $.each(result, function (i, item) {
            //console.log(result[i].photourl);
            if(result[i].photourl === null) {
                var photoSrc = 'images/no-image.png';
            } else {
                var photoSrc = result[i].photourl;
            }

            if(result[i].isOpen === true) {
                var openStatus = 'Отворено';
                var openClass = 'status-open';
            } else {
                var openStatus = 'Затворено';
                var openClass = 'status-close';
            }

            homeContent += '<article class="feed-entry gr-border">';
            homeContent += '<a class="article-img" href="'+ result[i].canonicalUrl +'"><img class="article-img" src="' + photoSrc + '"></a>';
            homeContent += '<div class="article-body">';
            homeContent += '<div class="title">';
            homeContent += '<small class="time-stamp ' + openClass + '">' + openStatus +'</small>';
            homeContent += '<h5>Посети "'+ result[i].name +'"</h5>';
            homeContent += '</div>';
            homeContent += '<p class="article-tips">' + result[i].address + '</p>';
            homeContent += '<p class="article-tips">' + result[i].text + '</p>';
            homeContent += '</div>';
            homeContent += '</article>';
            $("#body-feed").html(homeContent);
        });

    });
    tmpdata.error(function () {
        $("#body-feed").html('<br><br><br><h2 class="text-center">Нещо се обърка...<br>Моля опитайте по-късно.</h2>');
    });
}
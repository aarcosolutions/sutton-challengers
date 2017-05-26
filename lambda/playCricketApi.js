(function () {
    'use strict';

    var apiClient = function () {
        var request = require("request");
        function getMatches(season, callback) {
            var options = {
                method: 'GET',
                url: 'http://www.play-cricket.com/api/v2/matches.json',
                qs: {
                    '': '',
                    site_id: 'clubid',
                    season: season,
                    api_token: 'apikey'
                },
                headers: {
                    'cache-control': 'no-cache'
                }
            };

            request(options, function (error, response, body) {
                if (error) {
                    console.log(error);
                    callback(null,true);
                } else {
                    callback(body, false);
                }
            });

        }
        return {
            getMatches: getMatches
        };

    };

    module.exports = apiClient;
}());
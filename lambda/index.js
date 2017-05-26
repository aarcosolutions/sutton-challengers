var api = require('./playCricketApi');

exports.handler = function(event, context, callback) {
    if(event.season === undefined){
        callback("400 Invalid Input");
    }

    if(isNaN(event.season)){
        callback("400 Invalid Input");
    }
    
    var client = api();
    client.getMatches(event.season, function (data, isError) {
        console.log(data);
        if(isError===true){
            callback("500 Server Error");
        }else
        {
            callback(null, JSON.parse(data));
        }
    });
};
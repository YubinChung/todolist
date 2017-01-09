/**
 * Created by gabriel on 2016-12-18.
 */
var ajaxConfig = function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
};

module.exports.ajaxConfig = ajaxConfig;
$( document ).ready(function() {

    iniMenu();

    function iniMenu(){
        $obj =  $('a.nav-link.active');
        $obj.removeClass('active');

        path = getUrlPathname();

        if(path){
            $obj =  $('a.nav-link[href="/'+path+'"]');
        }else{
            $obj =  $('a.nav-link[href="/"]');
        }
        $obj.addClass('active');
    }

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    }

    function getUrlPathname() {
        var aPageURL = window.location.pathname.split('/');
        return aPageURL[aPageURL.length-1];
    }
});
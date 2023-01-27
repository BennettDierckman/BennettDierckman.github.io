document.onkeydown = function(evt) {
    function getLastTwoChars(url){
        return url.substring(url.length-2,url.length);
    }
    function checkFirst(str){
        if (str.substring(0,1) == "0" || str.substring(0,1) == "1" || str.substring(0,1) == "2" || str.substring(0,1) == "3" || str.substring(0,1) == "4" || str.substring(0,1) == "5" || str.substring(0,1) == "6" || str.substring(0,1) == "7" || str.substring(0,1) == "8" || str.substring(0,1) == "9"){
            return true;
        }
        return false;
    }
    function getSecond(url){
        return url.substring(url.length-1, url.length);
    }
    function getFirst(url){
        return url.substring(url.length-2, url.length-1);
    }
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        document.getElementsByClassName("perfundo__close perfundo__control")[0].click();
    }
    if (evt.keyCode == 39){
        var x = document.location.href;
        var newx = 0;
        //alert(getSecond(x));
        //alert(checkFirst(getLastTwoChars(x)));
        if (getSecond(x) == "9" && checkFirst(getLastTwoChars(x))){
            var toAdd = parseInt(getFirst(x)) + 1;
            //alert(toAdd);
            window.location.href = x.substring(0, x.length-2) + toAdd + "0";
        }
        else if (getSecond(x) == "9" && !checkFirst(getLastTwoChars(x))){
            window.location.href = x.substring(0,x.length-1) + "10";
        }
        else {
            window.location.href = x.substring(0, x.length-1) + (1 + parseInt(getSecond(x)));
        }    
    }
    if (evt.keyCode == 37){
        var x = document.location.href;
        var newx = 0;
        //alert(getLastTwoChars(x));
        if (getLastTwoChars(x) == "10"){
            //alert(1);
            window.location.href = x.substring(0, x.length-2) + "9";
        }
        else if (getSecond(x) == "0" && checkFirst(getLastTwoChars(x))){
            //alert(2);
            var toSubtract = parseInt(getFirst(x)) - 1;
            window.location.href = x.substring(0, x.length-2) + toSubtract + "9";
        }
        else {
            //alert(3);
            window.location.href = x.substring(0,x.length-1) + (parseInt(getSecond(x))-1);
        }
        //var newx = parseInt(x.substring(x.length-1,x.length));
        //newx = newx - 1;
        //if (newx == 9){
        //    document.location.href = x.substring(0,x.length-2)+newx;
        //}
        //else {
        //document.location.href = x.substring(0,x.length-1)+newx;
    }
};
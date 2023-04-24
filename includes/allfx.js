// for search function
function takeSearch() {
    var newsearch = $("#search").val();
    $.ajax({
        url: 'browse',
        type: 'POST',
        data: {value: newsearch },
        success: function (result) {
            $("#starthere").replaceWith(result);
        }
    });
}

// trying for search
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// from browse to collection
function formSubmit(gameid) {
    document.forms[0].gameid.value = gameid;
    document.forms[0].submit();
}

//change from toggle off to on
function toggleOn() {

    $.ajax({
        data: {toggle: "1"},
        type:'POST', 
        dataType:'JSON',
      });
}

//change from toggle on to off
function toggleOff() {
    $.ajax({
        data: {toggle: "0"},
        type:'POST', 
        dataType:'JSON',
      });
}
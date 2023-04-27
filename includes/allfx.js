// For ASSESSMENT HUB

var userName;
function takeQuiz(){
	var name = $("#username").val();
	$("#quizsection").replaceWith('<div style="text-align:center;" id="quizsection"></div>');
	if (name){
		$("#resultsection").hide();
		userName = name;
		$.ajax({
			url: 'quizRetrieve.php',
			type: 'POST',
			data: {value: 'take', name: userName },
			success: function (result) {
				$("#quizsection").replaceWith(result);
			}
		});
	}
	else {
		alert("Please enter your name");
        window.location.href='quizStart';
	}
	
}

function retreiveResults(){ // to display leaderboard
	$.ajax({
		url: 'quizResults.php',
		type: 'POST',
		data: {value: 'result'},
		success: function (result) {
			$("#resultsection").replaceWith(result);
		}
	});
}


//=============================================================================
// FOR TESTING HUB

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

// destroy session in js
function destroySession() {
    $.ajax({
        url: 'logout',
        data: {destroy: "1"},
        type: 'POST',
        dataType:'JSON',
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

$(document).ready(function(){
    $("#search").keyup(function(){
        var search = $(this).val();
        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: {query:search},
            success: function(response){
                $("#show-list").html(response);
            }
        });
    });
    $(document).on('click', 'a', function(){
        $("#search").val($(this).text());
        $("#show-list").html('');
    });
});
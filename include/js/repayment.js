
$(document).ready(function() {
    //will change ir latter
    $("#loanidsearchbutton").click(function(e) {
        e.preventDefault();

        var loanid = $("#search-loanid").val();
        // alert(loanid);
        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'loanid': loanid },
            success: function(data) {
                $("#loaninfo").html(data);
            }
        });
    });


    
});


$(document).ready(function() {
    //to fetch customer name from customerid input
    $("#customerid").keyup(function() {
        var customer_id = $(this).val();

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'customer_id': customer_id },
            success: function(data) {
                $("#customer-name").val(data);
            }
        });
    });

    //to calculate installment on basis of ROI & Principle amount
    $("#roi").keyup(function() {
        var roi = $(this).val();
        var principal = $("#principle-amount").val();

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'roi': roi ,'principal': principal },
            success: function(data) {
                $("#installment").val(data);
            }
        });
    });


    
});


  
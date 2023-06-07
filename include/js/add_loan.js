
$(document).ready(function() {
    //to fetch customer name from customerid input
    $(document).on("keyup", "#customerid", function() {
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
    $(document).on("keyup", "#roi", function() {
        var roi = $(this).val();
        var principal = $("#principle-amount").val();

        if(!$.isNumeric(roi) || principal == ""){
            $(this).css("border","2px solid red");
            $("#installment").css("border","2px solid red");
            $("#installment").val("");
            return false;
        }else{
            $(this).css("border","");
            $("#installment").css("border","");
        }

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'roi': roi ,'principal': principal },
            success: function(data) {
                $("#installment").val(data);
            }
            // error: function() {
            //     alert("error");
            //   }
        });
    });

    //to calculate installment on basis of Installment amount & Principle amount
    $(document).on("keyup", "#installment", function() {
        var installment = $(this).val();
        var principal = $("#principle-amount").val();

        if(!$.isNumeric(installment) || principal == ""){
            $(this).css("border","2px solid red");
            $("#roi").css("border","2px solid red");
            $("#roi").val("");
            return false;
        }else{
            $(this).css("border","");
            $("#roi").css("border","");
        }

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'installment': installment ,'principal': principal },
            success: function(data) {
                $("#roi").val(data);
            }
        });
    });

    //to calculate last date of repayment on the basis of number of days and date of registration
    $(document).on("keyup", "#days", function() {
        var dor = $("#dorloan").val();
        var days = $(this).val();
        var loancat = $("#loancategory").val();
        // alert(loancat);

        if(!$.isNumeric(days)){
            $(this).css("border","2px solid red");
            $("#ldorloan").css("border","2px solid red");
            return false;
        }else{
            $(this).css("border","");
            $("#ldorloan").css("border","");
        }

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'dor': dor ,'days': days, 'loancat': loancat },
            success: function(data) {
                $("#ldorloan").val(data);
            }
        });
    });

    //to calculate number of days on the basis of last date of repayment and date of registration
    $(document).on("change", "#ldorloan", function(){
        var dor = $("#dorloan").val();
        var ldorloan = $(this).val();
        var loancat = $("#loancategory").val();

        if(ldorloan < dor){
            $(this).css("border","2px solid red");
            $("#days").css("border","2px solid red");
            return false;
        }else{
            $(this).css("border","");
            $("#days").css("border","");
        }

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'dor': dor ,'ldorloan': ldorloan },
            success: function(data) {
                $("#days").val(data);
            }
        });
    });

    //on change of type of loan fields changes
    $(document).on("change", "#loancategory", function(){
        var tol = $(this).val();

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'tol': tol},
            success: function(data) {
                $("#lcdependent").html(data);
            }
        });
    });

});


  
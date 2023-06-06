
$(document).ready(function () {
    //will change ir latter
    $("#loanidsearchbutton").click(function (e) {
        e.preventDefault();

        var loanid = $("#search-loanid").val();
        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'loanid': loanid },
            success: function (data) {
                $("#loaninfo").html(data);
            }
        });
    });



    // Open the modal when the button is clicked
    $(document).on('click', '#openModalButton', function () {
        // Open the modal
        $("#myModal").removeClass("hidden");
    });

    // Close the modal when the close button or outside modal area is clicked
    $(document).on('click', '.close, .modal-overlay', function () {
        // Open the modal
        $("#myModal").addClass("hidden");
    });

    // Prevent modal from closing when the modal content is clicked
    $(document).on('click', '.modal-content', function (e) {
        // Open the modal
        e.stopPropagation();
    });

    // Prevent modal from closing on submit button click
    $(document).on('click', '#submitButton', function (e) {
        // Open the modal
        e.preventDefault();
    });




    //repayment installment entry 
    $(document).on('click', '#repaysubmitbtnn', function (e) {
        e.preventDefault();
        var dorepay = $("#dorepay").val();
        var loan_id = $("#loan_id").val();
        var installmentamt = $("#install-amount").val();

        $.ajax({
            url: '../include/ajaxphpfiles/fetch_custname.php',
            type: 'POST',
            data: { 'dorepay': dorepay, 'loan_id': loan_id, 'installmentamt': installmentamt},
            success: function (data) {
                $("#repaymentalert").html(data);
                window.setTimeout(function(){
                    $("#myModal").addClass("hidden");
                }, 1500);
            }
        });
    })

    //all jquery for installment info modal

    // Open the modal when the button is clicked
    $(document).on('click','#openpaidinstallmentinfo', function(){
      $('#paidinstallmentModal').removeClass('hidden');

    })

    // Close the modal when the close button/icon is clicked

    $(document).on('click','#closeInstallmentinfoModal', function(){
      $('#paidinstallmentModal').addClass('hidden');
      })
  


});



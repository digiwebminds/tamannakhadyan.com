
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
    


    // // Open the modal when the button is clicked
    // // $("#openModalButton").click(function() {
    // //   $("#myModal").removeClass("hidden");
    // // });

    // $(document).on('click', '#openModalButton', function() {
    //     // Open the modal
    //     $("#myModal").removeClass("hidden");
    //   });
  
    // // Close the modal when the close button or outside modal area is clicked
    // // $(".close, .modal-overlay").click(function() {
    // //   $("#myModal").addClass("hidden");
    // // });

    // $(document).on('click', '.close, .modal-overlay', function() {
    //     // Open the modal
    //     $("#myModal").addClass("hidden");
    //   });
  
    // // Prevent modal from closing when the modal content is clicked
    // // $(".modal-content").click(function(e) {
    // //   e.stopPropagation();
    // // });

    // $(document).on('click', '.modal-content', function(e) {
    //     // Open the modal
    //     e.stopPropagation();
    //   });
  
    // // Prevent modal from closing on submit button click
    // // $("#submitButton").click(function(e) {
    // //   e.preventDefault();
    // // });


    // $(document).on('click', '#submitButton', function(e) {
    //     // Open the modal
    //     e.preventDefault();
    //   });
});



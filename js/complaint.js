$(function() {

  $("#feedback_form input,#feedback_form textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      event.preventDefault(); // prevent default submit behaviour

      // get values from FORM
      var subject = $("input#feedback_subject").val();
      var date = $("input#feedback_date").val();
      var body = $("input#feedback_body").val();



      var firstName = name; // For Success/Failure Message
      // Check for white space in name for Success/Fail message
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }

      $this = $("#sendFeedbackButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "././mail/complaint.php",
        type: "POST",
        data: {
          feedback_subject: subject,
          feedback_date: date,
          feedback_body: body
        },
        cache: false,
        success: function() {
          // Success message
          $('#success_feedback').html("<div class='alert alert-success'>");
          $('#success_feedback > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success_feedback > .alert-success')
            .append("<strong>Your message has been sent. </strong>");
          $('#success_feedback > .alert-success')
            .append('</div>');
          //clear all fields
          $('#feedback_form').trigger("reset");
        },
        error: function() {
          // Fail message
          $('#success_feedback').html("<div class='alert alert-danger'>");
          $('#success_feedback > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success_feedback > .alert-danger').append($("<strong>").text("Sorry, it seems that my mail server is not responding. Please try again later!"));
          $('#success_feedback > .alert-danger').append('</div>');
          //clear all fields
          $('#feedback_form').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});

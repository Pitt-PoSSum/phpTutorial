$( document ).ready(function() {

    $('.needs-validation').on('submit', function(e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
      }

      $(this).addClass('was-validated');
    });



});
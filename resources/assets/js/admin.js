$( document ).ready(function() {
    var dismissArrayValue = function() {
      $('.dismiss-array-value').on('click', function(event) {
        $(this).remove();
      });
    };

    dismissArrayValue();

    $('.add-array-value').on('click', function(event) {
      var value = $(this).parent().prev().val();
      $(this).parent().prev().val('');
      var box = $(this).parent().parent().next().next();
      var name = $(this).attr('name');
      box.append('<span class="dismiss-array-value"><input type="hidden" name="' + name + '" value="' + value + '"><span class="btn btn-default">' + value + '</span></span>');
      dismissArrayValue();
    });
});
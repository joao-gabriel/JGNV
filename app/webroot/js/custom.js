$(document).ready(function() {
  // Add bootstrap styling
  $('table').addClass('table table-striped table-responsive');
  $('.actions').addClass('col-sm-3 col-md-2 sidebar');
  $('.actions ul').addClass('nav nan-sidebar');
  $('label').addClass('show');
  $('.input').addClass('form-group  col-lg-9');
  $('input, select, textarea').addClass('form-control');
  $('input[type="submit"]').removeClass('form-control').addClass('btn btn-default');
  $('input[type="checkbox"]').removeClass('form-control');
  $('dd').addClass('mb20');
  $('.message').addClass('label label-danger center-block bottom30');
  var SPMaskBehavior = function(val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
          spOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
  };

  $('input[type=tel]').mask(SPMaskBehavior, spOptions);

  if ($('.datefield').length > 0) {
    $('.datefield').datetimepicker({
      todayBtn: true,
      todayHighlight: true
    });
  }

});



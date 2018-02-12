$("#setsList").on('click', 'li', loadPreset);

/**
 * Loads the pre-set
 */
function loadPreset() {
  // Get the set id.
  var setID = $(this).attr("data-setid");
  console.log(setID);
  // Add accessories to character
  if (setID == 0) {
    $('#head').html('');
    $('#head').prepend('<img src="assets/img/glasses.png" />');
    $('#upper').html('');
    $('#upper').prepend('<img src="assets/img/sweater.png" />');
    $('#leftHand').html('');
    $('#leftHand').prepend('<img src="assets/img/charger.png" />');
    $('#rightHand').html('');
    $('#rightHand').prepend('<img src="assets/img/coffee.png" />');
    $('#rightFoot').html('');
    $('#rightFoot').prepend('<img src="assets/img/runners.png" />');
    $('#leftFoot').html('');
    $('#leftFoot').prepend('<img src="assets/img/runners.png" />');
  } else {
    $('#head').html('');
    $('#head').prepend('<img src="assets/img/hat4.png" />');
    $('#upper').html('');
    $('#upper').prepend('<img src="assets/img/goose.png" />');
    $('#leftHand').html('');
    $('#leftHand').prepend('<img src="assets/img/coffee.png" />');
    $('#rightHand').html('');
    $('#rightHand').prepend('<img src="assets/img/watch.png" />');
    $('#rightFoot').html('');
    $('#rightFoot').prepend('<img src="assets/img/sandals.png" />');
    $('#leftFoot').html('');
    $('#leftFoot').prepend('<img src="assets/img/whiteshoes.png" />');
  }

};
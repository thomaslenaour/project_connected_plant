$(document).ready(function() {
    $('.log-error-message').delay(5000).fadeOut();
});

$(document).ready(function() {
    $('.log-success-message').delay(5000).fadeOut();
});

$('.btn-delete-plant').click(() => {
    if(!confirm('Etes-vous sûr de vouloir supprimer cette plante ?')) return false;
});
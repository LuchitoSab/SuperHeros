/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    var currentPage = 1;
    var itemsPerPage = 5;

    function displayPage(pageNumber) {
        var startIndex = (pageNumber - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        $('tbody tr').hide().slice(startIndex, endIndex).show();

        var totalPages = Math.ceil($('tbody tr').length / itemsPerPage);
        $('#totalPages').text('Página ' + pageNumber + ' de ' + totalPages);
    }

    displayPage(currentPage);

    $('#prevPage').click(function() {
        if (currentPage > 1) {
            currentPage--;
            displayPage(currentPage);
        }
    });

    $('#nextPage').click(function() {
        currentPage++;
        displayPage(currentPage);
    });
});



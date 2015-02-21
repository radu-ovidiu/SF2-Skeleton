/**
 * Bootstrap Table Romanian translation
 * Author: iradu@unix-world.org
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['ro-RO'] = {
        formatLoadingMessage: function () {
            return 'Se încarcă, așteptați ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rânduri pe pagină';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Afișare ' + pageFrom + ' la ' + pageTo + ' din ' + totalRows + ' rânduri';
        },
        formatSearch: function () {
            return 'Căutare';
        },
        formatNoMatches: function () {
            return 'Nu s-a găsit nici o înregistrare';
        },
        formatRefresh: function () {
            return 'Re-Încarcă';
        },
        formatToggle: function () {
            return 'Comutare';
        },
        formatColumns: function () {
            return 'Coloane';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ro-RO']);

})(jQuery);
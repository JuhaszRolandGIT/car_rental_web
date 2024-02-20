$(document).ready(function () {
    highlightActiveMenuItem(window.location.hash);

    $(window).scroll(function () {
      var currentSectionId = getCurrentSectionId();
      highlightActiveMenuItem(currentSectionId);
    });

    function highlightActiveMenuItem(sectionId) {
      $('.nav-item').removeClass('active');
      $('a[href="' + sectionId + '"]').closest('.nav-item').addClass('active');
    }

    function getCurrentSectionId() {
      var sectionId = '';
      $('section').each(function () {
        var position = $(this).position().top;
        var sectionHeight = $(this).height();
        if ($(window).scrollTop() >= position && $(window).scrollTop() < position + sectionHeight) {
          sectionId = '#' + $(this).attr('id');
        }
      });
      return sectionId;
    }
  });

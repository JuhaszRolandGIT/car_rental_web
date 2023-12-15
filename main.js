<script>
  $(document).ready(function () {
    // Amikor az oldal betöltődik, ellenőrizzük az URL-ben lévő horgonyjelzőt.
    highlightActiveMenuItem(window.location.hash);

    // Figyeljük az oldal görgetését, és frissítjük a kijelölt menüpontot.
    $(window).scroll(function () {
      var currentSectionId = getCurrentSectionId();
      highlightActiveMenuItem(currentSectionId);
    });

    // Függvény, amely kijelöli az aktív menüpontot az ID alapján.
    function highlightActiveMenuItem(sectionId) {
      $('.nav-item').removeClass('active');
      $('a[href="' + sectionId + '"]').closest('.nav-item').addClass('active');
    }

    // Függvény, amely visszaadja az aktuális szakasz ID-jét a lap görgetése alapján.
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
</script>

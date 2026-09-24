<script>
    {{-- scripts.js calls bodyScrollLock when opening the mobile menu, but the library is never loaded. --}}
    window.bodyScrollLock = window.bodyScrollLock || {
        disableBodyScroll: function() {},
        enableBodyScroll: function() {}
    };

    $(document).on('click', '.mobile-nav-close, #navigation-mobile a.main-manu[href]:not([href^="javascript"])', function() {
        $('.mobile-overlay').trigger('click');
    });
</script>

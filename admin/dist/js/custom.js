$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // ============================================================== 
    // Theme options
    // ==============================================================     
    // ============================================================== 
    // sidebar-hover
    // ==============================================================

    $(".left-sidebar").hover(
        function() {
            $(".navbar-header").addClass("expand-logo");
        },
        function() {
            $(".navbar-header").removeClass("expand-logo");
        }
    );
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".nav-lock").on('click', function() {
        $("body").toggleClass("lock-nav");
        $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
        $("body, .page-wrapper").trigger("resize");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Right sidebar options
    // ==============================================================
    $(function() {
        $(".service-panel-toggle").on('click', function() {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function() {
            $(".customizer").removeClass('show-service-panel');
        });
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        // ============================================================== 
        //Popover
        // ============================================================== 
    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
        wheelPropagation: !0
    });

    /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function() {
        $(this).toggleClass("task-done");
    });

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);
    //****************************
    /* This is for sidebartoggler*/
    //****************************
    $('.sidebartoggler').on("click", function() {
        $("#main-wrapper").toggleClass("mini-sidebar");
        if ($("#main-wrapper").hasClass("mini-sidebar")) {
            $(".sidebartoggler").prop("checked", !0);
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $(".sidebartoggler").prop("checked", !1);
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    });

    //****************************
    /* This is for thumbnails load*/
    //****************************

    var showSliderThumbnails = function(input, output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(output).attr('src', e.target.result);
                $(output).attr('height', '175px');
            }
            reader.readAsDataURL(input.files[0]);
        }
    };

    var showThumbnails = function(input, output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(output).attr('src', e.target.result);
                $(output).attr('height', '75px');
            }
            reader.readAsDataURL(input.files[0]);
        }
    };

    $("#thumbnail").change(function() {
        showThumbnails(this, '#thumbnail-image');
    });
    $("#thumbnail2").change(function() {
        showThumbnails(this, '#thumbnail-image2');
    });
    $("#thumbnail3").change(function() {
        showThumbnails(this, '#thumbnail-image3');
    });
    $("#thumbnail4").change(function() {
        showThumbnails(this, '#thumbnail-image4');
    });

    //****************************
    /* This is for sliders image insert*/
    //****************************

    $("#slider-thumbnail").change(function() {
        showSliderThumbnails(this, '#slider-image');
    });

    //****************************
    /* This is for multiple image preview*/
    //****************************
    var previewImgs = function(event) {
        var totalFiles = event.files.length;
        var imgPreview = $('#img_preview');
        imgPreview.empty();
        if (totalFiles) {
            imgPreview.removeClass('quote-imgs-thumbs--hidden');
            var previewTitleText = `<p class="font-weight-bold">Total ${totalFiles} Images Selected</p>`;
            imgPreview.append(previewTitleText);
            for (var i = 0; i < totalFiles; i++) {
                var imgurl = URL.createObjectURL(event.files[i]);
                var imgsingle = `<img class="img-preview-thumb" src="${imgurl}" />`;
                imgPreview.append(imgsingle);
            }
        }


    };
    $('#upload_imgs').change(function() {
        previewImgs(this);
    });
    $('#open-image-gallery-modal').click(function() {
        $('#img_preview').empty();
        $('#img_preview').addClass('quote-imgs-thumbs--hidden');
        $('#upload_imgs').val(null);
    });

    $('.edit-category').click(function() {
        var my_id_value = $(this).data('semester-id');
        $('#get-semester-id').val(my_id_value);
    });
});
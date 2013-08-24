
$(document).ready(function() {

    var oTable1;
    var oTable2;
    var oTable3;
    var oTable4;
    var oTable5;
    var oTable6;

    oTable1 = $('.data-table1').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    oTable2 = $('.data-table2').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    oTable3 = $('.data-table3').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    oTable4 = $('.data-table4').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    oTable5 = $('.data-table5').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    oTable6 = $('.data-table6').dataTable({
        "bJQueryUI": true,
        "bScrollCollapse": true,
        "sScrollY": "auto",
        "bAutoWidth": false,
        "bPaginate": true,
        "sPaginationType": "full_numbers", //full_numbers,two_button
        "bStateSave": true,
        "bInfo": true,
        "bFilter": true,
        "iDisplayLength": 25,
        "bLengthChange": true,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    var link = document.location.hash;

    if (link) {
        $('html, body').animate({scrollTop: 0});

        $(".tabs_links ul li").removeClass("active"); //Remove any "active" class
//        alert($('.tabs_links ul li:contains(' + link + ')'));
//        $('.tabs_links ul li a').find(link).parent('li').addClass("active");
        $('a[href="' + link + '"]').parent('li').addClass("active");
        $(".tab_content").hide(); //Hide all tab content
        $(link).fadeIn(); //Fade in the active content

        oTable1.fnAdjustColumnSizing();
        oTable2.fnAdjustColumnSizing();
        oTable3.fnAdjustColumnSizing();
        oTable4.fnAdjustColumnSizing();
        oTable5.fnAdjustColumnSizing();
        oTable6.fnAdjustColumnSizing();

    } else {
        $(".tab_content").hide(); //Hide all content
        $(".tabs_links ul li:first").addClass("active").show(); //Activate first tab
        $(".tab_content:first").show(); //Show first tab content
        oTable1.fnAdjustColumnSizing();
    }


    //On Click Event
    $(".tabs_links ul li").click(function() {
        $(".tabs_links ul li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content

        $(activeTab).fadeIn(); //Fade in the active content

        oTable1.fnAdjustColumnSizing();
        oTable2.fnAdjustColumnSizing();
        oTable3.fnAdjustColumnSizing();
        oTable4.fnAdjustColumnSizing();
        oTable5.fnAdjustColumnSizing();
        oTable6.fnAdjustColumnSizing();
        return false;
    });


    $(".rtab_content").hide(); //Hide all content
    $(".tab_navigation ul li:first").addClass("active").show(); //Activate first tab
    $(".rtab_content:first").show(); //Show first tab content
    //On Click Event
    $(".tab_navigation ul li").click(function() {
        $(".tab_navigation ul li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".rtab_content").hide(); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });

    $('.message, .error').hide().slideDown('normal').click(function() {
        $(this).slideUp('normal');
    });

    $('a.edit-news').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);

    });

    $('a.edit-events').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);
    });

    $('a.edit-courses').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);
    });

    $('a.edit-staff').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);
    });

    $('a.edit-download').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);
    });

    $('a.edit-photo').click(function(event) {
        event.preventDefault();
        getPopForm(this.href);
    });

    $('.news').click(function(event) {
        event.preventDefault();
        getPopForm('post_news.php');
    });

    $('.events').click(function(event) {
        event.preventDefault();
        getPopForm('post_events.php');
    });

    $('.courses').click(function(event) {
        event.preventDefault();
        getPopForm('post_courses.php');
    });

    $('.upload').click(function(event) {
        event.preventDefault();
        getPopForm('upload_downloads.php');
    });

    $('.staff').click(function(event) {
        event.preventDefault();
        getPopForm('post_staff.php');
    });

    $('.photo').click(function(event) {
        event.preventDefault();
        getPopForm('upload_photo.php');
    });

    $('.close').live('click', function() {
        $('#pop-up').children().remove();
        $('body').css('overflow', 'visible');
    });

});

$(function() {
    $(".slider1").jCarouselLite({
        btnNext: ".leftarrow",
        btnPrev: ".rightarrow"
    });
    $("a.galleryimg").fancybox({
        'titlePosition': 'inside',
        'overlayColor': '#000',
        'overlayOpacity': 0.9

    });
});

function getPopForm(filename, filter) {

    $.ajax({
        url: filename,
        data: filter,
        type: 'GET',
        dataType: 'html',
        beforeSend: function() {
            $('#pop-up').html('<div class="message">Loading...</div>');
        },
        success: function(data, textStatus, xhr) {
            $('body').css('overflow', 'hidden');
            $('#pop-up').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#pop-up').html('<div class="error">Connection lost! Try again</div>');
        }
    });
}

function check(input) {

    if (input.value != document.getElementById('new_pass').value) {
        input.setCustomValidity('The two new passwords must match.');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
}

// cufon script
//Cufon.replace('h1,h2,h3,h4,h5, h6, .txtcufon');

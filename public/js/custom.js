$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    //get packages on click of div.category_box

    $("div").on("click", "div.category_box", function () {
        
        var category_id = $(this).attr('data-category-id');
        $('.type_title').removeClass('active');
        $(this).find('.type_title').addClass('active');

        var URL_CONCAT = $('meta[name="index"]').attr('content');

        $.ajax({
            type: 'POST',
            url: URL_CONCAT + '/get_packages',
            data: {
                parent: category_id
            },
            beforeSend: function () {
                $('#packages_loader').removeClass('d-none');
                $('#packages_holder').html('&nbsp;');
                $('html,body').animate({
                    scrollTop: $('#packages_loader').offset().top
                }, 'slow');
            },
            success: function (response) {
                $('#packages_holder').fadeIn().html(response);
                $(".owl-carousel").owlCarousel({
                    margin: 20,
                    dots: false,
                    nav: true,
                    navText: [
                        '<img src="' + URL_CONCAT + '/images/left.png">',
                        '<img src="' + URL_CONCAT + '/images/right.png">'
                    ],
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        769: {
                            items: 3
                        }
                    }
                });
            },
            complete: function () {
                var packageHolder = $('#packages_loader');
                packageHolder.addClass('d-none');
                
                $('html,body').animate({
                    scrollTop: $('#packages_holder').offset().top
                }, 'slow');
            }
        });
    });

    //handle form submission of step 1
    $('#booking_step_1').submit(function (e) {

        var check = true;
        var package_id = $('input[name=package_id]').val();

        // alert(package_id);
        if (package_id === undefined) {
            
            $('#package_error').removeClass('d-none');
            $("html, body").animate({
                scrollTop: $(document).height() - $(window).height()
            });
            return false;
        }
        this.submit();
    });

    //remove address field error
    $('#autocomplete').keyup(function () {
        $(this).removeClass('is-invalid').addClass('is-valid');
        $('#address_error_holder').addClass('d-none');
    });

    //remove date error
    $('#event_date').click(function () {
        $(this).removeClass('is-invalid').addClass('is-valid');
        $('#date_error_holder').addClass('d-none');
    });

    //populate timing slots

    $('input[id="event_date"]').change(function () {
        //populate timing slots
        var selected_date;
        selected_date = $(this).val();

        var URL_CONCAT = $('meta[name="index"]').attr('content');

        //prepare to send ajax request
        $.ajax({
            type: 'POST',
            url: URL_CONCAT + '/get_timing_slots',
            data: {
                event_date: selected_date
            },
            beforeSend: function () {
                $('#slots_loader').removeClass('d-none');
            },
            success: function (response) {
                $('#slots_holder').html(response);

            },
            complete: function () {
                $('#slots_loader').addClass('d-none');
            }
        });
    });

    //append selected slot to booking_step_2 form

    $('#slots_holder').on('click', 'a.btn-slot', function () {
        var slot_time = $(this).attr('data-slot-time');
        $('#slots_holder').find('.btn-slot').removeClass('slot-picked');
        $('#booking_slot').remove();
        $('#booking_step_2').append('<input type="hidden" name="booking_slot" id="booking_slot" value="' + slot_time + '">');
        $(this).addClass('slot-picked');
    });

    //handle form submission of step 2

    $('#booking_step_2').submit(function (e) {

        var check = true;
        var address;
        address = $('input[name=address]').val();
        var event_date;
        event_date = $('input[name=event_date]').val();
        var booking_slot;
        booking_slot = $('input[name=booking_slot]').val();


        if (event_date === "") {
            $('#event_date').addClass('is-invalid');
            $('#date_error_holder').removeClass('d-none');
            $("html, body").animate({
                scrollTop: 2000
            }, "slow");
            check = false;
        }

        if (check === false) {
            return false;
        } else if (check === true) {
            if (booking_slot === undefined) {
                $('#slot_error').removeClass('d-none');
                $("html, body").animate({
                    scrollTop: $(document).height() - $(window).height()
                });
                return false;
            } else {
                e.submit();
            }
        }
    });


    //initialize addons carousel

    var URL_CONCAT = $('meta[name="index"]').attr('content');

    $("#addons_carousel").owlCarousel({
        margin: 20,
        dots: false,
        nav: true,
        navText: [
            '<img src="' + URL_CONCAT + '/images/left.png">',
            '<img src="' + URL_CONCAT + '/images/right.png">'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            769: {
                items: 3
            }
        }
    });

    $('.addon_buttons').on('click', 'a.btn-addon', function () {
        var addon_id = $(this).attr('data-addon-id');
        var method = $(this).attr('data-method');

        if (method === "add") {
            $.ajax({
                type: 'POST',
                url: URL_CONCAT + '/session_addons',
                data: {
                    addon_id: addon_id,
                    session_email: $('input[name=session_email]').val()
                },
                success: function () {
                    $('#' + addon_id).attr('data-method', 'remove');
                }
            });
        } else if (method === "remove") {
            $.ajax({
                type: 'POST',
                url: URL_CONCAT + '/remove_session_addon',
                data: {
                    addon_id: addon_id,
                    session_email: $('input[name=session_email]').val()
                },
                success: function () {
                    $('#' + addon_id).attr('data-method', 'add');
                }
            });
        }
    });

});
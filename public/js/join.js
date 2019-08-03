$(document).ready(function () {
    $("#btnItem").click(function () {
        $("#addI").append("<div class=\"form-group\">\n" +
            "                            <label for=\"item_name\">{{ trans('admin.item_name') }}</label>\n" +
            "                            <input type=\"text\" class=\"form-control\" id=\"item_name\" placeholder=\"item name\">\n" +
            "                           \n" +
            "                        </div>");
    });


    $("#btnPH").click(function () {
        $("#addI").append(" <div class=\"form-group\">\n" +
            "                            <label for=\"phone_number\"> {{ trans('admin.phone_number') }}</label>\n" +
            "                            <input type=\"text\" class=\"form-control\" id=\"phone_number\" placeholder=\" phone number\">\n" +
            "                        </div>");
    });


    $("#btnMB").click(function () {
        $("#addm").append(" <div class=\"form-group\">\n" +
            "                            <label for=\"mobile_number\">{{ trans('admin.mobile_number') }}</label>\n" +
            "                            <input type=\"text\" class=\"form-control\" id=\"mobile_number\" placeholder=\" mobile number\">\n" +
            "                        </div>");
    });

    $("#btnmenu").click(function () {
        $("#addI").append("  <div class=\"form-group\">\n" +
            "                            <label for=\"menu_name\">{{ trans('admin.menu_name') }} </label>\n" +
            "                            <input type=\"text\" class=\"form-control\" id=\"menu_name\" placeholder=\"menu name \">\n" +
            "                        </div>");
    });


    $("#btnsubItem").click(function () {
        $("#addI").append("<div class=\"form-group\">\n" +
            "                            <label for=\"item_name\">{{ trans('admin.sub_item_name') }}</label>\n" +
            "                            <input type=\"text\" class=\"form-control\" id=\"item_name\" placeholder=\"item name\">\n" +
            "\n" +
            "                        </div>");
    });


    $("#btnd").click(function () {
        $(".form-group").remove();
    });

    $(".qwe").hide();
    $("#btnms").click(function () {
        $(".qwe").slideToggle();
    });
    $("button").click(function () {
        Swal.fire("Good job!", "You clicked the button!", "success")
    });

});


////////////////////////////////////////////////////////////////////////////
//KHALID JS
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%

            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});


// Show and hide contents for bridging
$("input[value='checkBridging']").click(function () {
    if ($(this).is(":checked")) {
        $("#content").show();
    } else
        $("#content").hide();

});


///for image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile-img").change(function () {
    readURL(this);
});

///////////////////////////////////////////////////////////////
///JS for select inputs

$("#Directorate").change(function () {
    var type = $(this).val();
    // console.log(type);
    getSchools(type);


    // Get items from API
    function getSchools(type) {
        $.ajax({
            url: 'http://localhost:8000/student/join/schools/' + type
        }).done(function (schools) {
            let output = '';
            $.each(schools, function (key, school) {
                output += `
                        <option value="${school.name}" >${school.name} </option>
            `;
            });
            $('#schools').empty().append(output);
        });
    }
})
////////////////////////////////////////

/////get the cities for the edit student page and join page

$("#City").change(function () {
    var type = $(this).val();
    var url = window.location.href;
    url=url.replace('/edit', '');
    url=url.replace('/create', '');
    ;
    // console.log(window.location.href);
    getRegions(url, type);


    // Get items from API
    function getRegions(url, type) {
        $.ajax({
            url: url + '/regions/' + type
        }).done(function (regions) {
            let output = '';
            $.each(regions, function (key, region) {
                output += `
                        <option value="${region.id}" >${region.name_ar} </option>
            `;
            });
            $('#regions').empty().append(output);
        });
    }
})

////////////////////////////////////////


/////////////////////////////////////
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(250)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
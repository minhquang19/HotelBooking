document.addEventListener("DOMContentLoaded",function(){
	//Select
    var item = document.getElementsByClassName('nice-select');
    	for (var i = 0; i < item.length; i++) {
    		item[i].onclick = function(){
    			this.classList.toggle('open');
    		}
    	}

    	//Carousel
    	$(document).ready(function () {
        //Price Bar
            $('#slider-range').slider({
            range: true,
            min: 0,
            max: 200,
            values: [0, 200],
            slide: function(event, ui) {
                $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1]);
                $('#min').val(ui.values[0]);
                $('#max').val(ui.values[1]);
            }
        });
            $('#amount').val(
                '$' +
                    $('#slider-range').slider('values', 0) +
                    ' - $' +
                    $('#slider-range').slider('values', 1)
            );
        //End Price Slide
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });
        ResCarouselSize();
        $(window).resize(function () {
            ResCarouselSize();
        });
        // Search Icon
        $('.search-icon').on('click', function(e) {
        $('.search-wrap').toggleClass('search-active');
        e.preventDefault();
        });
    //Sticky Menu
        $(window).on('scroll', function(event) {
            var scroll = $(window).scrollTop();
            if (scroll < 250) {
                $('.header-menu-area').removeClass('sticky');
                $('.header-two').removeClass('sticky');
            } else {
                $('.header-menu-area').addClass('sticky');
                $('.header-two').addClass('sticky');
            }
        });
    // Mobile Menu
        $('header .main-menu').meanmenu({
            meanMenuContainer: '.mobilemenu',
            meanScreenWidth: '991',
            meanRevealPosition: 'none',
            meanMenuOpen: '<i class="fas fa-bars"/>',
            meanMenuClose: '<i class="fas fa-times"/>',
            meanMenuCloseSize: '25px'
        });
        //Date time picker
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#arrive-date').datepicker({

                beforeShowDay: function(date) {
                    return date.valueOf() >= now.valueOf();
                },
                autoclose: true

            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

                    var newDate = new Date(ev.date);
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.datepicker("update", newDate);

                }
                $('#depart-date')[0].focus();
            });

            var checkout = $('#depart-date').datepicker({
                beforeShowDay: function(date) {
                    if (!checkin.datepicker("getDate").valueOf()) {
                        return date.valueOf() >= new Date().valueOf();
                    } else {
                        return date.valueOf() > checkin.datepicker("getDate").valueOf();
                    }
                },
                autoclose: true

            }).on('changeDate', function(ev) {});


            //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }

    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }
});
})

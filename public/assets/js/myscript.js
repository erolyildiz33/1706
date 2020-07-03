function MyClass() {

    var me = this;
    me.il = $('#il');
    me.ilce = $('#ilce');
    me.saha = $('#saha');
    izle=document.getElementById("izle");
    me.mycontainer = $('.portfolio-container');
    me.test = $('.venobox').venobox();

    me.mydatepicker=$('#datepicker');
    me.get_date;
    me.get_time;
    me.tummaclar;
    me.secilenmaclar=[];
    me.video= document.getElementById('myvideo');
    me.videoContainer = document.getElementById('video-container');
    me.ReadySystem = function () {










            if (document.addEventListener)
            {
                document.addEventListener('fullscreenchange', me.exitHandler, false);
                document.addEventListener('mozfullscreenchange', me.exitHandler, false);
                document.addEventListener('MSFullscreenChange', me.exitHandler, false);
                document.addEventListener('webkitfullscreenchange', me.exitHandler, false);
            }


            if (me.video && izle) {
                izle.addEventListener("click", function (evt) {
                    if (me.video.requestFullscreen) {
                        me.video.requestFullscreen();
                    }
                    else if (me.video.msRequestFullscreen) {
                        me.video.msRequestFullscreen();
                    }
                    else if (me.video.mozRequestFullScreen) {
                        me.video.mozRequestFullScreen();
                    }
                    else if (me.video.webkitRequestFullScreen) {
                        me.video.webkitRequestFullScreen();
                    }
                }, false);
            }









        jQuery.datetimepicker.setLocale('tr');
        me.mydatepicker.datetimepicker({
            timepicker:false,
            onGenerate:function( ct ){
                clsDate=jQuery(this).find('.xdsoft_date');
                if(!clsDate.hasClass('xdsoft_disabled')){
                    clsDate.addClass('xdsoft_disabled');
                }
                },
            onChangeDateTime:me.getTimes,
            format:'d-m-Y',
        });

        me.saha.select2({
            language:'tr',
            placeholder: "Saha Seçiniz",
        }).on('select2:select', function (e) {
            me.ajaxme('/ajaxme',{'cont':'macgetir','id':$(this).val(),'il':me.il.val(),'ilce':me.ilce.val()});

        });
        me.ilce.select2({
            language:'tr',
            placeholder: "İlçe Seçiniz",
        }).on('select2:select', function (e) {
            me.ajaxme('/ajaxme',{'cont':'sahagetir','id':$(this).val(),'il':me.il.val()});
        });
        me.il.select2({
            language:'tr',
            placeholder: "İl Seçiniz",
        }).on('select2:select', function (e) {
            me.ajaxme('/ajaxme',{'cont':'ilcegetir','id':$(this).val()});
        });

    };
    me.exitHandler=function()
    {

        if (!(document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement))
        {
            me.video.pause();
            me.video.removeAttribute('autoplay');
            me.video.setAttribute('poster','assets/img/portfolio/portfolio-2.jpg');
            me.video.load();

        }
        else
        {
            me.video.setAttribute('autoplay','true');
            me.video.load();

        }
    }
    me.myallowsDate=function(data){
        var mydates=[];
        $.each( data,function(index, element) {
            mydates.push(element.date);
        });
        return $.unique(mydates.sort());
    };

    me.get_match=function(datex){
        var seldate=datex.toLocaleDateString().split(".").join("-");
        while (me.secilenmaclar.length > 0) {
            me.secilenmaclar.pop();
        }
        $.each(me.tummaclar,function (index,element) {
            if(seldate==element.date){
                item=$('<div class="col-lg-4 col-md-6 portfolio-item filter-kamera'+ element.kamerano+'">\n' +
                    '<div class="portfolio-img">' +
                    '<video id="myvideo"  width="320" poster="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">'+
                    '<source src="'+element.sahaid+'_'+element.kamerano+'_'+element.date.split("-").join("")+element.time.split(":").join("")+'.mp4'+'"  type="video/mp4">'+
                    '</video></div>\n' +
                    '<div class="portfolio-info">\n' +
                    '<h4>'+element.saha+'</h4>\n' +
                    '<p>Kamera '+element.kamerano+'</p>\n' +
                    '<a  data-gall="portfolioGallery" class=" preview-link" title="Web 3"><i class="bx bx-plus"></i></a>\n' +
                    '<a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>\n' +
                    '</div></div>');
                me.mycontainer.isotope({
                    itemSelector: '.portfolio-item',

                }).append(item.add( ))
                    .isotope( 'appended', item);
            }


        });


    }
    me.ajaxme=function(url,datalar){
        var result;
        $.ajax({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            type: "post",
            url: url,
            async:false,
            dataType : "json",
            data: {veri:datalar},
            success: function(data){
                    if (data){
                    result=data;
                    if(datalar.cont=='ilcegetir'){
                        me.ilce. find('option')
                            .remove()
                            .end().append(new Option('', ''));
                        me.saha.find('option')
                            .remove()
                            .end().append(new Option('', ''));

                        $.each( data,function(index, element) {
                            me.ilce.append(new Option(element, element));
                        });
                        me.mydatepicker.datetimepicker({
                            onGenerate:function( ct ){

                                clsDate=jQuery(this).find('.xdsoft_date');
                                if(!clsDate.hasClass('xdsoft_disabled')){
                                    clsDate.addClass('xdsoft_disabled');
                                }

                            },

                        })
                    }
                    if(datalar.cont=='sahagetir'){

                        me.saha.find('option')
                            .remove()
                            .end().append(new Option('', ''));

                        $.each( data,function(index, element) {
                            me.saha.append(new Option(element, element));
                        });
                        me.mydatepicker.datetimepicker({
                            onGenerate:function( ct ){
                                clsDate=jQuery(this).find('.xdsoft_date');
                                if(!clsDate.hasClass('xdsoft_disabled')){
                                    clsDate.addClass('xdsoft_disabled');
                                }

                            },

                        })
                    }

                    if(datalar.cont=='macgetir'){
                        me.tummaclar=data;
                        if(data[0]=='disable'){
                            me.mydatepicker.datetimepicker({
                                onGenerate:function( ct ){
                                    clsDate=jQuery(this).find('.xdsoft_date');
                                    if(!clsDate.hasClass('xdsoft_disabled')){
                                        clsDate.addClass('xdsoft_disabled');
                                    }

                                },

                            })
                        }
                        else {
                            /////////////////////    maçları bul getir  /////////////////////
                            me.mydatepicker.datetimepicker({
                                allowDates:me.myallowsDate(data),
                                formatDate:'d-m-Y',
                                onSelectDate:me.get_match,
                            })
                        }
                    }
                }
                return result;
            }
        });
    };
}


var My_do = null;

$(function () {
    Mydo = new MyClass();
    Mydo.ReadySystem();
});

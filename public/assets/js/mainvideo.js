		var vid,seekslider,startat,ended,seekbar,slider,starttime,endtime,cutvideo,prev;

        prev 	    =document.getElementById("prev");

		function intializePlayer(){
            vid 		= document.getElementById("my_video");
			starttime	=document.getElementById("starttime");
			endtime		=document.getElementById("endtime");
			slider 		=$("#slider").slider();
			seekbar 	=document.getElementById("custom-seekbar");
			cutvideo 	=document.getElementById("cutvideo");



		const videoDuration = Math.round(vid.duration);
			const time = formatTime(videoDuration);
			endtime.innerText = `${time.minutes}:${time.seconds}`;
			endtime.setAttribute('datetime', `${time.minutes} : ${time.seconds}`)
			$("#starttime").text(showtime(vid.currentTime));


			slider.slider({
				values: [0, 100],
				range: true,
				min: 0,
				max: 100,
				step: 1,
				slide:vidSeek,
			});
			//$("#endtime").text(showtime(vid.duration));
			vid.addEventListener("timeupdate",seektimeupdate,false);
			cutvideo.addEventListener("click",cutThis,false);
		}
		window.onload = intializePlayer;
		function formatTime(timeInSeconds) {
			const result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);

			return {
				minutes: result.substr(3, 2),
				seconds: result.substr(6, 2),
			};
		};
		function seektimeupdate(){
			var percentage = Math.floor((vid.currentTime / vid.duration ) * 100);
			var durto=slider.slider("values",1);
			if(percentage==durto){vid.pause();}
			$("#custom-seekbar span").css("width", percentage+"%");
		}
		function vidSeek(event,index){

			var indexto,seekto,durto;
			indexto = $(index.handle).index();
			if(indexto==0)
			{
				seekto = vid.duration * ((slider.slider("values",0) / 100));
				vid.currentTime = seekto;
				$("#starttime").text(showtime(seekto));
			}
			else if (indexto==2){
				durto=(vid.duration/100 * (slider.slider("values",1)));
				$("#endtime").text(showtime(durto));
			}
		}
		function playPause(){
			if(vid.paused){
				vid.play();
				playbtn.innerHTML = "Pause";
			} else {
				vid.pause();
				playbtn.innerHTML = "Play";
			}
		}
		function showtime(vide){
			var curmins = Math.floor(vide / 60);
			var cursecs = Math.floor(vide - curmins * 60);
			if(cursecs < 10){ cursecs = "0"+cursecs; }
			if(curmins < 10){ curmins = "0"+curmins; }
			return  (curmins+":"+cursecs);
		}
		function cutThis(){
			$.ajax('/cutthis', {
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				type: 'POST',
				data:
				{
					video_file:$("#my_video").find('Source:first').attr('src'),
					starttime: $("#starttime").text(),
					length: durationvideo($("#starttime").text(),$("#endtime").text()),

				},
				success: function (data, status, xhr) {

					prev.removeAttribute('style');
                    $('#izlevideo').attr("src","/output/"+data);
                        //'status: ' + status + ', data: ' + data);
				},
				error: function (jqXhr, textStatus, errorMessage) {
                    prev.attr('style',"display:none");
				}
			});

		}
		function durationvideo(s,e){
			a=s.split(":");
			b=e.split(":");
			c=(a[0]*60)+a[1];
			d=(b[0]*60)+b[1];
			e=d-c;
			return e;

		}

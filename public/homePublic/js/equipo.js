

// var sliderEquipo = tns({
//     container: '.team',
//     items: 2.5,
//     slideBy: 1,
//     controls:false,
//     center:false,
//     swipeAngle: false,
//     startIndex: 1,
//     nav:false,
//     speed:500,
//     autoplay: true,
//     autoplayTimeout: 3500,
//     mouseDrag: true,
//     edgePadding:50,
//     gutter:170,


//   responsive: {
//     "200": {
//       "items": 1.5,
//       gutter:80,
//       edgePadding:50,
//     },
//     "580": {
//       "items": 2.5,

//       edgePadding:50,
//     },
//     "769": {
//       "items": 3.5,

//       edgePadding:50,
//     },
//     "991": {
//       "items": 4.5,
//       gutter:70,
//     },
//     "1200": {
//       "items": 5.5,
//       gutter:100,
//     }
//   },
//   });
//   document.addEventListener('click', function (event) {


//      if (event.srcElement.id=='play-preview'){
//         sliderEquipo.goTo('prev');
//       }
//       if (event.srcElement.id=='play-equipo'){
//           sliderEquipo.play(); 
//           document.getElementById("play-equipo").style.display = "none";
//           document.getElementById("pause-equipo").style.display = "block";
        
//       }
//       if (event.srcElement.id=='pause-equipo'){
//                 document.getElementById("play-equipo").style.display = "block";
//                 document.getElementById("pause-equipo").style.display = "none";
//                 sliderEquipo.pause();        
//       }
//       if (event.srcElement.id=='play-next'){
//          sliderEquipo.goTo('next');

//       }
//     }, false);
 

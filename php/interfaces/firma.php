<?php

$id_equipo = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Firma</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<!--[if lt IE 7 ]> <body class="ie6 "> <![endif]-->
<!--[if IE 7 ]>    <body class="ie7 "> <![endif]-->
<!--[if IE 8 ]>    <body class="ie8 "> <![endif]-->
<!--[if !IE]>--> <body class=""> <!--<![endif]-->
<!-- wondering wtf that ^^^ is? 
     check: http://paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/
-->

<div id="content">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style media="screen">canvas{border:1px solid #ccc}</style>
<canvas id="example" height=450 width=300></canvas>
<form method="post" action="../request/actualizar_firma.php" onsubmit="prepareImg();">
    <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
    <input id="inp_img" name="img" type="hidden" value="">
    <input id="bt_upload" type="submit" value="Guardar">
  </form>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>
<script>
 //<![CDATA[
var CanvasDrawr = function(options) {
    var canvas = document.getElementById(options.id), ctxt = canvas.getContext("2d");
    canvas.style.width = '100%'
    canvas.width = canvas.offsetWidth;
    canvas.style.width = '';
    ctxt.lineWidth = options.size || Math.ceil(Math.random() * 35);
    ctxt.lineCap = options.lineCap || "round";
    ctxt.pX = undefined;
    ctxt.pY = undefined;
    var lines = [, , ];
    var offset = $(canvas).offset();
    var self = {init: function() {
            canvas.addEventListener('touchstart', self.preDraw, false);
            canvas.addEventListener('touchmove', self.draw, false);
        },preDraw: function(event) {
            $.each(event.touches, function(i, touch) {
                var id = touch.identifier, colors = ["black"], mycolor = colors[Math.floor(Math.random() * colors.length)];
                lines[id] = {x: this.pageX - offset.left,y: this.pageY - offset.top,color: mycolor};
            });
            event.preventDefault();
        },draw: function(event) {
            var e = event, hmm = {};
            $.each(event.touches, function(i, touch) {
                var id = touch.identifier, moveX = this.pageX - offset.left - lines[id].x, moveY = this.pageY - offset.top - lines[id].y;
                var ret = self.move(id, moveX, moveY);
                lines[id].x = ret.x;
                lines[id].y = ret.y;
            });
            event.preventDefault();
        },move: function(i, changeX, changeY) {
            ctxt.strokeStyle = lines[i].color;
            ctxt.beginPath();
            ctxt.moveTo(lines[i].x, lines[i].y);
            ctxt.lineTo(lines[i].x + changeX, lines[i].y + changeY);
            ctxt.stroke();
            ctxt.closePath();
            return {x: lines[i].x + changeX,y: lines[i].y + changeY};
        }};
    return self.init();
};
$(function() {
    var super_awesome_multitouch_drawing_canvas_thingy = new CanvasDrawr({id: "example",size: 3});
});
    function prepareImg() {
   var canvas = document.getElementById('example');
   document.getElementById('inp_img').value = canvas.toDataURL();
}

//]]></script>
</div>


</body>



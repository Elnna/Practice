var tangram = [
    {p:[{x:0,y:0},{x:800,y:0},{x:400,y:400}],color:"#caffb7"},
    {p:[{x:0,y:0},{x:400,y:400},{x:0,y:800}],color:"#67becf"},
    {p:[{x:800,y:0},{x:800,y:400},{x:600,y:600},{x:600,y:200}],color:"#ef3d61"},
    {p:[{x:600,y:200},{x:600,y:600},{x:400,y:400}],color:"#f9f51a"},
    {p:[{x:400,y:400},{x:600,y:600},{x:400,y:800},{x:200,y:600}],color:"#a594c0"},
    {p:[{x:200,y:600},{x:400,y:800},{x:0,y:800}],color:"#fa8ecc"},
    {p:[{x:800,y:400},{x:800,y:800},{x:400,y:800}],color:"#f6ca29"},
];
$(document).ready(function(){

    var canvas = document.getElementById("canvas");
    var context = canvas.getContext("2d");
    /*
    canvas基于状态绘制图形
    context.moveTo(100,100); //绘制状态
    context.lineTo(400,400);//绘制状态
    context.lineTo(100,400);//绘制状态
    context.lineTo(100,100);//绘制状态
    
    context.fillStyle = "rgb(2,100,30)"; //设置填充颜色
    context.fill();//填充
    
    context.lineWidth = 5;
    context.strokeStyle = "#005588";//设置笔画颜色
    context.stroke()*/

    canvas.width = 800;
    canvas.height = 800;
    for(var i=0 ; i<tangram.length; i++){
        draw(tangram[i],context);
    }
});
/**
@param:piece 
@param: cxt context
*/
function draw(piece,cxt){
    cxt.beginPath();
    cxt.moveTo(piece.p[0].x,piece.p[0].y);  //移到起点
    for(var i=1;i< piece.p.length;i++){
        cxt.lineTo(piece.p[i].x,piece.p[i].y);
    }
    cxt.stroke();
    cxt.closePath();
    
    cxt.fillStyle = piece.color;
    cxt.fill();
   /* cxt.strokeStyle = "black";
    cxt.lineWidth = 3;
    cxt.stroke();*/
}

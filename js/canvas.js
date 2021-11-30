var canvas = document.querySelector('canvas');

canvas.width=window.innerWidth;                 // setting width as the width of screen
canvas.height=window.innerHeight;               // setting height as the height of screen

var c = canvas.getContext('2d');                // setting canvas for 2d shapes


var mouse = {                   //mouse variable declaration
    x:undefined,
    y:undefined
}

var maxRadius = 40;             //maximum radius of circle achieved

var colorArray = [              //declaration of colorArray
'#590212',
'#8C0327',
'#BF8494',
'#BF471B',
'#D99B84'
];

window.addEventListener('mousemove', function(event){         //event listener so that the circle enlarges when mouse movement happens 
    mouse.x = event.x;
    mouse.y = event.y; 

});

window.addEventListener('resize', function(){
canvas.height=window.innerHeight;               
canvas.width=window.innerWidth;


init();
});



function Circle(x,y,dx,dy,radius,minRadius){                                  //Circle function using OOPS concept on JS
    this.x = x;
    this.y = y;
    this.dx = dx;
    this.dy = dy;
    this.radius = radius;
    this.minRadius = radius;
    this.color = colorArray[Math.floor(Math.random() * colorArray.length)];

    this.draw = function(){                                  //function to draw circle
    c.beginPath();
    c.arc(this.x,this.y,this.radius,0,360, false); 
    c.fillStyle = this.color;
    c.fill();
    }
    this.update = function(){                                  //function for moving circle and enlarging them
    if (this.x+this.radius>canvas.width||this.x-this.radius<0)
    {
      this.dx = -this.dx;
    }
    if (this.y+this.radius>canvas.height || this.y-this.radius<0)
    {
      this.dy = -this.dy;
    }
    this.x+=this.dx;
    this.y+=this.dy;

    if(mouse.x-this.x<50 && mouse.x-this.x>-50 && mouse.y-this.y<50   //interactivity     
        && mouse.y-this.y>-50)
    {
        if(this.radius<maxRadius){
           this.radius +=1;
        }
    }
    else if(this.radius>this.minRadius)
    {
        this.radius -=1;
    }

    this.draw();}
   
}



var circleArray = [];                                        //declaration of cicleArray for storing the circles

function init(){                                             //function init() to define the properties of circle
    
    circleArray = [];

    for (var i = 0; i<600; i++)
    {
      radius = Math.random() * 3 + 4;
      var x = Math.random()*(canvas.width-(radius*2)) + radius*2; 
      var y = Math.random()*(canvas.height-(radius*2)) + radius*2;
      var dx = (Math.random() - 0.5)*2;
      var dy = (Math.random() - 0.5)*2;
      circleArray.push(new Circle(x,y,dx,dy,radius));
    }

}


function animate(){                                         //function controlling the animation
    requestAnimationFrame(animate);
    c.clearRect(0,0,canvas.width,canvas.height);
    for (var i = 0; i < circleArray.length; i++) {
    	circleArray[i].update();
    }
    
}

animate();
init();
